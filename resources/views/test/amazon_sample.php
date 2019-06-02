<?php

// Amazon API Sample
// h26.1.20

// ログイン情報
$access_key_id		= 'AKIAIF4URGNAXFOPUF2Q';
$AssociateTag		= 'kijima05-22';		//AssociateTagというのはアソシエイトIDのこと
$secret_access_key	= 'kMWBkMzfJq6seFZFPUOGO3kvZO/ZBN29+XlKY/iF';

// 各パラメータ設定
$params=array();
$params['Service']			= 'AWSECommerceService';
$params['AWSAccessKeyId']	= $access_key_id;
$params['Version']			= '2011-08-02';
$params['AssociateTag']		= $AssociateTag;			// 自分のアソシエイトIDを追加
$params['Timestamp']		= gmdate('Y-m-d\TH:i:s\Z');	// Timeは毎回Checkされる【ISO8601,UTC(GMT)】
// ◆取得情報がLargeで検索時◆
$params['ResponseGroup']	= 'Large';
// ◆取得情報がItemAttributesで検索時◆
// $params['ResponseGroup']	= 'ItemAttributes';
// ■キーワードで検索時■
$params['Operation']		= 'ItemSearch';				//商品名や著者名でキーワード検索
$params['SearchIndex']		= 'All';					// カテゴリを指定
$params['Keywords']			= 'GUNDAM';					// 文字コードはUTF-8
$params['ItemPage']			= 1;
// ■ASIN番号で検索時■
// $params['Operation']		= 'ItemLookup';				// 商品名や著者名でキーワード検索
// $params['ItemId']		= 'B00CPDCZWG';				// ASINをパラメータに入れる

// パラメータの順序を昇順に並び替えます
ksort($params);

// Site URL
$baseurl	=	'http://ecs.amazonaws.jp/onca/xml';

// URLの追加部分を作成します
$option_string = '';
foreach ($params as $k => $v) {
    // URLの追加部分をURLエンコードして&でつなげる。
    $option_string .= '&'.urlencode_rfc3986($k).'='.urlencode_rfc3986($v);
}
// 最初の"&"のみ削除
$option_string = substr($option_string, 1);

// URL作成
$parsed_url		= parse_url($baseurl);
$string_to_sign	= "GET\n{$parsed_url['host']}\n{$parsed_url['path']}\n{$option_string}";
// - HMAC-SHA256 を計算し、BASE64 エンコード
$signature		= base64_encode(hash_hmac('sha256', $string_to_sign, $secret_access_key, true));
// - リクエストの末尾に署名を追加
$url			= $baseurl.'?'.$option_string.'&Signature='.urlencode_rfc3986($signature);

// HTMLアクセスを行う
$get_contents	= file_get_contents($url);

// XMLパラメータをオブジェクトとして読み込む
$amazon_xml		= simplexml_load_string($get_contents);

foreach ($amazon_xml->Items->Item as $item) {
    $getdata = array();
    // 取得したxMLデータをgetdataへ値を代入
    $getdata['titlename']	= $item->ItemAttributes->Title;
    $getdata['maker']		= $item->ItemAttributes->Manufacturer;
    $getdata['asin']		= $item->ASIN;
    $getdata['listprice']	= $item->ItemAttributes->ListPrice->Amount;
    $getdata['newprice']	= $item->OfferSummary->LowestNewPrice->Amount;
    $getdata['usedprice']	= $item->OfferSummary->LowestUsedPrice->Amount;
    $getdata['p_category']	= $item->BrowseNodes->BrowseNode->Name;
    $getdata['newstock']	= $item->OfferSummary->TotalNew;
    $getdata['usedstock']	= $item->OfferSummary->TotalUsed;
    $getdata['dim_hight']	= $item->ItemAttributes->PackageDimensions->Height;
    $getdata['dim_length']	= $item->ItemAttributes->PackageDimensions->Length;
    $getdata['dim_width']	= $item->ItemAttributes->PackageDimensions->Width;
    $getdata['weight']		= $item->ItemAttributes->PackageDimensions->Weight;
    $getdata['ean']			= $item->ItemAttributes->EAN;
    $getdata['isbn']		= $item->ItemAttributes->ISBN;
    $getdata['upc']			= $item->ItemAttributes->UPC;
    $getdata['p_release']	= $item->ItemAttributes->PublicationDate;
    $getdata['producturl']	= $item->DetailPageURL;

    // 取得した商品情報の表示用(今回は取得した情報のタイトルと価格のみを表示)
    $curDate = sprintf("%04d%02d%02d", date("Y"), date("n"), date("j"))
            . "_" . sprintf("%02d%02d%02d", date("G"), date("i"), date("s"));
    $temWord = mb_convert_encoding($getdata['titlename'], "SJIS", "UTF-8");
    printf(
        "Time=[%s], ASIN=[%s], Title=[%s], Price=[%s]\n",
        $curDate,
        $getdata['asin'],
        $temWord,
        $getdata['newprice']
    );
}

// RFC3986 形式で URL エンコードする関数
function urlencode_rfc3986($str)
{
    return str_replace('%7E', '~', rawurlencode($str));
}

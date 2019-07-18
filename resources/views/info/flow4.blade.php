@extends('layouts.tosoapp')

@section('title','入金')

@section('content')

<p>
    <a href="/info/flow3">←（前）査定を確認する</a>
</p>

了承確認され次第、申し込み時に入力した方法で入金を開始します。<br>
入金額は<a href="/entry">買取履歴</a>から確認できます。

<h3>銀行振込の場合</h3>

<p>
    振込手数料は当店が負担します。<br>
    「とそブックス」名義で振り込みます。
</p>

<h3>Amazonギフト券の場合</h3>

<p>
    Amazon.co.jpがリンクを記載したギフト券メールを送信します。<br>
    メール内のリンクをクリックし、アカウントにチャージします。
</p>

<p>
    ※リンクにアクセスしないと入金が完了しません。<br>
    ※コンビニなどのプリペイドカード式とは異なり、1円単位で入金されます。
</p>

<div style="max-width: 540px;">
    <img src="../img/flow4-prepare1.png" class="img-fluid center-block py-4" style="max-width:100%;height:auto;">
</div>

@endsection
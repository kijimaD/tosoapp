@extends('layouts.tosoapp')

@section('title','買取申請')

@section('content')

<?php
$week = [
  '日',
  '月',
  '火',
  '水',
  '木',
  '金',
  '土',
];
$date1 = date('w',strtotime("+1 day"));
$date2 = date('w',strtotime("+2 day"));
$date3 = date('w',strtotime("+3 day"));
$date4 = date('w',strtotime("+4 day"));
$date5 = date('w',strtotime("+5 day"));
$date6 = date('w',strtotime("+6 day"));
$date7 = date('w',strtotime("+7 day"));

$day1 = date('Y/m/d',strtotime("+1 day"));
$day2 = date('Y/m/d',strtotime("+2 day"));
$day3 = date('Y/m/d',strtotime("+3 day"));
$day4 = date('Y/m/d',strtotime("+4 day"));
$day5 = date('Y/m/d',strtotime("+5 day"));
$day6 = date('Y/m/d',strtotime("+6 day"));
$day7 = date('Y/m/d',strtotime("+7 day"));
?>

<style type="text/css">
    #payment_firstbox {
        display: none;
    }

    #payment_secondbox {
        display: none;
    }

    #shipping_firstbox {
        display: none;
    }

    #shipping_secondbox {
        display: none;
    }

    #shipping_thirdbox {
        display: none;
    }
</style>

<script>

    function payment(){
  	radio = document.getElementsByName('paymentway_id')
    document.getElementById('payment_firstbox').style.display = "none";
  	document.getElementById('payment_secondbox').style.display = "none";
  	if(radio[0].checked) {
  		//A.1つ目が選択されたら下記を実行
  		document.getElementById('payment_firstbox').style.display = "inline";
  		document.getElementById('payment_secondbox').style.display = "none";
  	}else if(radio[1].checked) {
  		//B.2つ目が選択されたら下記を実行
  		document.getElementById('payment_firstbox').style.display = "none";
  		document.getElementById('payment_secondbox').style.display = "inline";
  	}
  }

    function shipping(){
  	radio = document.getElementsByName('shippingway_id')
    document.getElementById('shipping_firstbox').style.display = "none";
  	document.getElementById('shipping_secondbox').style.display = "none";
  	document.getElementById('shipping_thirdbox').style.display = "none";
  	if(radio[0].checked) {
  		//A.1つ目が選択されたら下記を実行
  		document.getElementById('shipping_firstbox').style.display = "inline";
  		document.getElementById('shipping_secondbox').style.display = "none";
  		document.getElementById('shipping_thirdbox').style.display = "none";
  	}else if(radio[1].checked) {
  		//B.2つ目が選択されたら下記を実行
  		document.getElementById('shipping_firstbox').style.display = "none";
  		document.getElementById('shipping_secondbox').style.display = "inline";
  		document.getElementById('shipping_thirdbox').style.display = "none";
  	}else if(radio[2].checked) {
      document.getElementById('shipping_firstbox').style.display = "none";
  		document.getElementById('shipping_secondbox').style.display = "none";
  		document.getElementById('shipping_thirdbox').style.display = "inline";
    }
  }

// 注意:バリデーション後のold用に、読み込み時に表示させる。
window.onload = function(){
  payment();
  shipping();
};

</script>

<form action="/entry/add" method="post">
    {{csrf_field()}}
    {{session()->put(['user_id'=>$user->id])}}

    <div class="form-group">
        <label for="payment_way" class="col-form-label text-md-left">
            <h5>入金方法</h5>
        </label>
        <div>
            <div class="form-check">
                <input type="radio" name="paymentway_id" value="1" onclick="payment();" @if(old('paymentway_id') == '1') checked
                @endif />
                <label class="form-check-label" for="paymentway_id">銀行口座</label>
            </div>

            <div class="form-check">
                <input type="radio" name="paymentway_id" value="2" onclick="payment();" @if(old('paymentway_id') == '2') checked
                @endif />
                <label class="form-check-label" for="paymentway_id">アマゾンギフト券
            </div>

            @if($errors->has('paymentway_id'))
                <div class="text-danger">{{$errors->first('paymentway_id')}}</div>
                @endif

                @if($errors->has('paymentbank_id'))
                    <div class="text-danger">{{$errors->first('paymentbank_id')}}</div>
                    @endif

                    {{-- 分岐、口座部分 --}}
                    <div id="payment_firstbox" class="">
                        <div class="row">
                            <?php $j=0; ?> {{-- old用に発行した番号 --}}
                            @foreach($banks as $bank)
                            <div class="card col-sm-3 mr-3 mb-3" style="width: 18rem;">
                                <div class="card-header bg-white">
                                    <input type="radio" name="paymentbank_id" value="{{Crypt::encrypt('paymentbank_id' . $bank->id)}}" id="bank_radio" @if(old('paymentbank_id'))
                                    @if(Crypt::decrypt(old('paymentbank_id')) == 'paymentbank_id'.$bank->id)
                                    checked
                                    @endif
                                    @endif />
                                    {{-- 注意:oldで暗号化した選択肢を保持するために、ややこしいことになっている --}}
                                </div>
                                <div class="card-body">
                                    <p>
                                        {{$bank->bank_name}}
                                        {{$bank->bank_branch}}
                                        {{$bank->bank_type}}
                                        {{$bank->bank_num}}
                                    </p>
                                </div>
                                <div class="card-footer bg-white">

                                </div>
                            </div>
                            <?php ++$j; ?> {{-- old用に発行した番号 --}}
                            @endforeach

                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <p><a href="/bank/add">新規追加する</a></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- 分岐、ギフト券部分 --}}
                    <div id="payment_secondbox">
                        <p>登録したeメールアドレスにamazonギフト券を送信します。</p>

                    </div>
        </div>
    </div>

    <div class="form-group">
        <label for="shipping_way" class="col-form-label text-md-left">
            <h5>輸送方法</h5>
        </label>
        <div>
            <div class="form-check">
                <input type="radio" name="shippingway_id" value="1" onclick="shipping()" @if(old('shippingway_id') == '1') checked onload="shipping()"
                @endif />
                <label class="form-check-label" for="shippingway_id">集荷</label>
            </div>

            <div class="form-check">
                <input type="radio" name="shippingway_id" value="3" onclick="shipping()" @if(old('shippingway_id') == '3') checked
                onload="shipping()"
                @endif />
                <label class="form-check-label" for="shippingway_id">自分で送る</label>
            </div>
            {{-- <input type="radio" name="shippingway_id" value="2" onclick="shipping()" />専用ロッカー<br> --}}

            @if($errors->has('shippingway_id'))
                <div class="text-danger">{{$errors->first('shippingway_id')}}</div>
                @endif

                @if($errors->has('addressBook_id'))
                    <div class="text-danger">{{$errors->first('addressBook_id')}}</div>
                    @endif

                    <div id="shipping_firstbox" class="">
                        <div class="row">
                            @foreach($addresses as $address)
                            <div class="card col-sm-3 mr-3 mb-3" style="width: 18rem;">
                                <div class="card-header bg-white">
                                    <input type="radio" name="addressBook_id" value="{{Crypt::encrypt('addressBook_id' . $address->id)}}" @if(old('addressBook_id'))
                                    @if(Crypt::decrypt(old('addressBook_id')) == 'addressBook_id'.$address->id)
                                    checked
                                    @endif
                                    @endif />
                                    {{-- 注意:oldで暗号化した選択肢を保持するために、ややこしいことになっている --}}
                                </div>
                                <div class="card-body">
                                    <p>
                                        〒{{$address->zip }}<br>
                                        {{$address->prefecture->prefecture_name}}<br>
                                        {{$address->city}}<br>
                                        {{$address->address}}<br>
                                    </p>
                                </div>
                                <div class="card-footer bg-white">
                                </div>
                            </div>
                            @endforeach
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <p><a href="/address/add">新規追加する</a></p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="collection_date" class="control-label col-xs-2">集荷日</label>
                            <div class="">
                                <select class="form-control" id="number" name="collection_day">
                                    <option value="{{$day1}}">{{$day1}}({{$week[$date1]}})</option>
                                    <option value="{{$day2}}">{{$day2}}({{$week[$date2]}})</option>
                                    <option value="{{$day3}}">{{$day3}}({{$week[$date3]}})</option>
                                    <option value="{{$day4}}">{{$day4}}({{$week[$date4]}})</option>
                                    <option value="{{$day5}}">{{$day5}}({{$week[$date5]}})</option>
                                    <option value="{{$day6}}">{{$day6}}({{$week[$date6]}})</option>
                                    <option value="{{$day7}}">{{$day7}}({{$week[$date7]}})</option>
                                </select>
                            </div>
                            @if($errors->has('collection_day'))
                                <div class="text-danger">{{$errors->first('collection_day')}}</div>
                                @endif
                        </div>

                        <div class="form-group">
                            <label for="time_zone" class="control-label col-xs-2">集荷時間帯</label>
                            <div class="">
                                <select class="form-control" name="collection_time">
                                    <option value="指定なし">指定なし</option>
                                    <option value="午前中">午前中</option>
                                    <option value="~13時">13時まで</option>
                                    <option value="14時~16時">14時から16時まで</option>
                                    <option value="16時~18時">16時から18時まで</option>
                                    <option value="17時~18時30分">17時から18時30分まで</option>
                                </select>
                            </div>
                            @if($errors->has('time_zone'))
                                <div class="text-danger">{{$errors->first('time_zone')}}</div>
                                @endif
                        </div>

                        <div class="form-group">
                            <label for="box_num" class="col-form-label text-md-left">箱数</label>
                            <div>
                                <input type="number" name="box_num" value="{{old('box_num')}}" />
                            </div>

                            @if($errors->has('box_num'))
                                <div class="text-danger">{{$errors->first('box_num')}}</div>
                                @endif
                        </div>
                    </div>

                    <div id="shipping_secondbox">
                        <p>当店住所に、着払いにてお送りください</p>
                    </div>

                    <div id="shipping_thirdbox">
                        <p>uuu</p>
                    </div>
        </div>
    </div>

    {{-- <div class="form-group">
        <label for="bank_num" class="col-form-label text-md-left">ああああ</label>
        <div>
            <input type="text" name="bank_num" value="" />
        </div>
    </div> --}}

    <div class="form-group">
        <button class="btn btn-primary" type="submit">送信 </button>
    </div>
</form>

@endsection
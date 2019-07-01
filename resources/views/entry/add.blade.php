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

</script>

<form action="/entry/add" method="post">
    {{csrf_field()}}
    {{session()->put(['user_id'=>$user->id])}}

    <div class="form-group">
        <label for="payment_way" class="col-form-label text-md-left">入金方法</label>
        <div>
            <input type="radio" name="paymentway_id" value="1" onclick="payment();" />銀行口座<br>
            <input type="radio" name="paymentway_id" value="2" onclick="payment();" />アマゾンギフト券
            <div id="payment_firstbox" class="">
                <div class="row">
                    @foreach($banks as $bank)
                    <div class="card col-sm-3 mr-3 mb-3" style="width: 18rem;">
                        <div class="card-header bg-white">
                            <input type="radio" name="paymentbank_id" value="{{$bank->id}}" id="bank_radio" />
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
                            Footer
                        </div>
                    </div>
                    @endforeach
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <p><a href="/bank/add">新規追加する</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="payment_secondbox">
                <p>これはamazonギフト券です</p>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="shipping_way" class="col-form-label text-md-left">輸送方法</label>
        <div>
            <input type="radio" name="shippingway_id" value="1" onclick="shipping()" />集荷<br>
            <input type="radio" name="shippingway_id" value="2" onclick="shipping()" />専用ロッカー<br>
            <input type="radio" name="shippingway_id" value="3" onclick="shipping()" />自分で送る

            <div id="shipping_firstbox" class="">
                <div class="row">
                    @foreach($addresses as $address)
                    <div class="card col-sm-3 mr-3 mb-3" style="width: 18rem;">
                        <div class="card-header bg-white">
                            <input type="radio" name="addressBook_id" value="{{$address->id}}" />
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
                            Footer
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
                </div>

                <div class="form-group">
                    <label for="box_num" class="col-form-label text-md-left">箱数</label>
                    <div>
                        <input type="num" name="box_num" value="1" />
                    </div>
                </div>
            </div>

            <div id="shipping_secondbox">
                iii
            </div>

            <div id="shipping_thirdbox">
                uuu
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
        <button class="btn btn-primary" type="submit">確認</button>
    </div>
</form>

@endsection
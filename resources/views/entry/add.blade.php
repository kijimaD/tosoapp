@extends('layouts.tosoapp')

@section('title','口座登録')

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

<script>
    $(function(){
$("#picker").bootstrapMaterialDatePicker({
weekStart:0,
format:"YYYY-MM-DD",
lang:"ja",
time:'false',
});
});
</script>

<script>
    function payment(){
  	radio = document.getElementsByName('payment_way')
  	if(radio[0].checked) {
  		//A.1つ目が選択されたら下記を実行
  		document.getElementById('payment_firstbox').style.display = "";
  		document.getElementById('payment_secondbox').style.display = "none";
  	}else if(radio[1].checked) {
  		//B.2つ目が選択されたら下記を実行
  		document.getElementById('payment_firstbox').style.display = "none";
  		document.getElementById('payment_secondbox').style.display = "";
  	}
  }
  window.onload = payment;// ロード時に実行！

    function shipping(){
  	radio = document.getElementsByName('shipping_way')
  	if(radio[0].checked) {
  		//A.1つ目が選択されたら下記を実行
  		document.getElementById('shipping_firstbox').style.display = "";
  		document.getElementById('shipping_secondbox').style.display = "none";
  		document.getElementById('shipping_thirdbox').style.display = "none";
  	}else if(radio[1].checked) {
  		//B.2つ目が選択されたら下記を実行
  		document.getElementById('shipping_firstbox').style.display = "none";
  		document.getElementById('shipping_secondbox').style.display = "";
  		document.getElementById('shipping_thirdbox').style.display = "none";
  	}else if(radio[2].checked) {
      document.getElementById('shipping_firstbox').style.display = "none";
  		document.getElementById('shipping_secondbox').style.display = "none";
  		document.getElementById('shipping_thirdbox').style.display = "";
    }

  }
  window.onload = shipping;// ロード時に実行！

$('#date_sample').datepicker();
</script>

<form action="/entry/add" method="post">
    {{csrf_field()}}
    <input type="hidden" name="user_id" value="{{$user->id}}">

    <div class="form-group">
        <label for="payment_way" class="col-form-label text-md-left">入金方法</label>
        <div>
            <input type="radio" name="payment_way" value="1" onclick="payment();" checked="checked" />銀行口座<br>
            <input type="radio" name="payment_way" value="2" onclick="payment();" />アマゾンギフト券
            <div id="payment_firstbox" class="row">
                @foreach($banks as $bank)
                <div class="card" style="width: 20rem;">
                    <div class="card-header">
                        <input type="radio" name="paymentBank" value="{{$bank->id}}" />
                    </div>
                    <div class="card-body">
                        <p>
                            {{$bank->bank_name}}
                            {{$bank->bank_branch}}
                            {{$bank->bank_type}}
                            {{$bank->bank_num}}
                        </p>
                    </div>
                    <div class="card-footer">
                        Footer
                    </div>
                    {{-- <div class="card-footer">
                        Footer
                    </div> --}}
                </div>
                @endforeach
            </div>

            <p id="payment_secondbox">これはamazonギフト券です</p>
        </div>
    </div>
    <hr>

    <div class="form-group">
        <label for="shipping_way" class="col-form-label text-md-left">輸送方法</label>
        <div>
            <input type="radio" name="shipping_way" value="" onclick="shipping()" checked="checked" />集荷<br>
            <input type="radio" name="shipping_way" value="" onclick="shipping()" />専用ロッカー<br>
            <input type="radio" name="shipping_way" value="" onclick="shipping()" />自分で送る
            <p>住所を選択</p>
            <div id="shipping_firstbox" class="row">
                @foreach($addresses as $address)
                <div class="card" style="width: 20rem;">
                    <div class="card-header">
                        <input type="radio" name="address" value="" />
                    </div>
                    <div class="card-body">
                        <p>
                            {{$address->zip }}
                            {{$address->prefecture->prefecture_name}}
                            {{$address->city}}
                            {{$address->address}}
                        </p>
                    </div>
                    <div class="card-footer">
                        Footer
                    </div>
                </div>
                @endforeach

                <div class="form-group">
                    <label for="number" class="control-label col-xs-2">集荷日</label>
                    <div class="">
                        <select class="form-control" id="number" name="number">
                            <option value="">{{$day1}}({{$week[$date1]}})</option>
                            <option value="">{{$day2}}({{$week[$date2]}})</option>
                            <option value="">{{$day3}}({{$week[$date3]}})</option>
                            <option value="">{{$day4}}({{$week[$date4]}})</option>
                            <option value="">{{$day5}}({{$week[$date5]}})</option>
                            <option value="">{{$day6}}({{$week[$date6]}})</option>
                            <option value="">{{$day7}}({{$week[$date7]}})</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="number" class="control-label col-xs-2">集荷時間帯</label>
                    <div class="">
                        <select class="form-control" id="number" name="number">
                            <option value="1">指定なし</option>
                            <option value="2">午前中</option>
                            <option value="3">13時まで</option>
                            <option value="4">14時から16時まで</option>
                            <option value="5">16時から18時まで</option>
                            <option value="6">17時から18時30分まで</option>
                        </select>
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

    <div class="form-group">
        <label for="bank_type" class="col-form-label text-md-left">口座種別</label>
        <div>
            <input type="text" name="bank_type" value="" />
        </div>
    </div>

    <div class="form-group">
        <label for="bank_num" class="col-form-label text-md-left">口座番号</label>
        <div>
            <input type="text" name="bank_num" value="" />
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-primary" type="submit">送信</button>
    </div>
</form>

@endsection
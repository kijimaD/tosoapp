@extends('layouts.tosoapp')

@section('title','口座登録')

@section('content')
<script>
    function entryChange(){
  	radio = document.getElementsByName('entry')
  	if(radio[0].checked) {
  		//A.1つ目が選択されたら下記を実行
  		document.getElementById('firstbox').style.display = "";
  		document.getElementById('secondbox').style.display = "none";
  	}else if(radio[1].checked) {
  		//B.2つ目が選択されたら下記を実行
  		document.getElementById('firstbox').style.display = "none";
  		document.getElementById('secondbox').style.display = "";
  	}
  }
  window.onload = entryChange;
</script>

<div>
    <input type="radio" name="entry" onclick="entryChange();" checked="checked" /> 登録済みの情報を選択する
    <input type="radio" name="entry" onclick="entryChange();" /> 新たに情報を入力する
</div>

<div>
    <table>
        <tr id="firstbox">
            <th>名前：</th>
            <td>山田 太郎</td>
        </tr>

        <tr id="secondbox">
            <th>名前：</th>
            <td><input type="text" name="" placeholder="(例：山田 太郎)" class="w94" /></td>
        </tr>
    </table>
</div>
{{-- =================================== --}}

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
  window.onload = entryChange;
</script>

<div>


</div>


<div id="message">こんにちは</div>>
<form>
    <input type="button" value="表示" onclick="hyoji()">
    <input type="button" value="非表示" onclick="hihyoji()">
</form>

<form action="/entry/add" method="post">
    {{csrf_field()}}
    <input type="hidden" name="user_id" value="{{$user->id}}">

    <div class="form-group">
        <label for="payment_way" class="col-form-label text-md-left">入金方法</label>
        <div>
            <input type="radio" name="payment_way" value="" onclick="payment();" checked="checked" />銀行口座
            <p id="payment_firstbox">これは銀行口座です</p>
            <input type="radio" name="payment_way" value="" onclick="payment();" />アマゾンギフト券
            <p id="payment_secondbox">これはamazonギフト券です</p>
        </div>
    </div>

    <div class="form-group">
        <label for="shipping_way" class="col-form-label text-md-left">輸送方法</label>
        <div>
            <input type="radio" name="shipping_way" value="" />集荷
            <input type="radio" name="shipping_way" value="" />専用ロッカー
            <input type="radio" name="shipping_way" value="" />自分で送る
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
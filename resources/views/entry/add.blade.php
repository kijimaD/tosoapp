@extends('layouts.tosoapp')

@section('title','口座登録')

@section('content')

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
</script>

<form action="/entry/add" method="post">
    {{csrf_field()}}
    <input type="hidden" name="user_id" value="{{$user->id}}">

    <div class="form-group">
        <label for="payment_way" class="col-form-label text-md-left">入金方法</label>
        <div>
            <input type="radio" name="payment_way" value="1" onclick="payment();" checked="checked" />銀行口座
            <div id="payment_firstbox">
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
                </div>
                @endforeach
            </div>

            <input type="radio" name="payment_way" value="2" onclick="payment();" />アマゾンギフト券
            <p id="payment_secondbox">これはamazonギフト券です</p>
        </div>
    </div>

    <div class="form-group">
        <label for="shipping_way" class="col-form-label text-md-left">輸送方法</label>
        <div>
            <input type="radio" name="shipping_way" value="" onclick="shipping()" checked="checked" />集荷
            <div id="shipping_firstbox">
                aaa
            </div>
            <input type="radio" name="shipping_way" value="" onclick="shipping()" />専用ロッカー
            <div id="shipping_secondbox">
                iii
            </div>
            <input type="radio" name="shipping_way" value="" onclick="shipping()" />自分で送る
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
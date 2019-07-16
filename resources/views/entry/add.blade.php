@extends('layouts.tosoapp')

@section('title','買取申請')

@section('content')

<?php

// 曜日取得用、wは曜日番号で、曜日の配列を呼び出して日本語で表示する。引数はまず日付関数に渡されるので、1から始まる。
function calc_day ($day_num)
{
  $week = [
  '日',
  '月',
  '火',
  '水',
  '木',
  '金',
  '土',
];
  $day = date('w',strtotime("+$day_num day"));
  $japanize_day = $week[$day];
  return $japanize_day;
}

// 日付計算
function calc_date($num){
  $date = date('Y/m/d',strtotime("+$num day"));
  return $date;
}

// 希望時間帯。引数で配列に直接アクセスするため、0始まりになる。
function collect_timezone($num){
  $zone = [
    '指定なし',
    '午前中',
    '~13時',
    '14~16時',
    '16~18時',
    '17~18時30分',
  ];
  $goal = $zone[$num];
  return $goal;
}
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
                                    @elseif($user->defaultbank->bank->id)
                                        @if($bank->id == $user->defaultbank->bank->id)
                                            checked
                                            @endif
                                            @endif
                                            />
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
                                    @if($bank->id == $user->defaultbank->bank->id)
                                        <p class="text-success">既定の口座</p>
                                        @endif
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
                                    @elseif($user->useraddress->id)
                                        @if($address->id == $user->useraddress->addressbook->id)
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
                                    @if($address->id == $user->useraddress->addressbook->id)
                                        <p class="text-success">既定の住所</p>
                                        @endif
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
                                    @for ($i=1; $i
                                    <=7; $i++) <option @if(old('collection_day') == calc_date($i)) selected
                                    @endif value='{{calc_date($i)}}'>{{calc_date($i)}}({{calc_day($i)}})</option>
                                    @endfor
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
                                    @for ($i=0; $i
                                    <=5; $i++) <option @if(old('collection_time') == collect_timezone($i)) selected
                                    @endif value='{{collect_timezone($i)}}'>{{collect_timezone($i)}}</option>
                                    @endfor
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
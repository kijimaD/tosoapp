<style>
    div#top.jumbotron {
        background: url("../img/jumbotron2.png") no-repeat center center;
    }

    div#second.jumbotron {
        background: url("../img/jumbotron3.jpg") no-repeat center center;
    }

    div#third.jumbotron {
        background: url("../img/jumbotron4.jpg") no-repeat center center;
    }

    h2 {
        display: none;
    }
</style>

@extends('layouts.tosoapp')

@section('title','')

@section('content')

<div class="jumbotron jumbotron-fluid" id="top">
    <div class="container mt-5">
        <h1 class="display-3">あたらしい買取</h1>
        <p class="">
            とそブックスは、革新的な買取サービスを提供します。<br>安全、簡単、公正、スピーディで買取をより身近なものにし、環境に配慮した新たなライフスタイルを支援します。
        </p>
        <a href="/register" class="btn btn-success btn-large mt-5">とそブックスに登録する</a>
    </div>
</div>

<div class="jumbotron jumbotron-fluid" id="second">
    <div class="container">
        <h1 class="display-5">公正な取引</h1>
        <p class="">
            査定結果をネットで確認。個別にチェックし査定価格に満足しなければ、無料で返送します。
        </p>
    </div>
</div>

<div class="jumbotron jumbotron-fluid" id="third">
    <div class="container">
        <h1 class="display-5">輸送効率化</h1>
        <p class="">
            ネットワークと連動したロッカーで、買取をより身近にします。
        </p>
    </div>
</div>
@endsection
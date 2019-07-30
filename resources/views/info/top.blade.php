<style>
    div#top.jumbotron {
        background: url("../img/jumbotron1.png") no-repeat center center;
    }

    div#second.jumbotron {
        background: url("../img/jumbotron2.jpg") no-repeat center center;
    }

    div#third.jumbotron {
        background: url("../img/jumbotron3.jpg") no-repeat center center;
    }

    div#fourth.jumbotron {
        /* background: url("../img/jumbotron3.jpg") no-repeat center center; */
        background-color: 017BFF;
    }

    h2 {
        display: none;
    }
</style>

@extends('layouts.tosoapp')

@section('title','とそブックス')

@section('content')

<div class="jumbotron jumbotron-fluid" id="top">
    <div class="container mt-5">
        <h1 class="display-5">あたらしい買取</h1>
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
            査定結果をネットで確認。<br>
            査定価格に満足しなければ、無料で個別返送します。
        </p>
        {{-- <a href="/info/flow" class="btn btn-success btn-large mt-5">買取の流れを見る</a> --}}
    </div>
</div>

<div class="jumbotron jumbotron-fluid" id="third">
    <div class="container">
        <h1 class="display-5">輸送効率化</h1>
        <p class="">
            ネットワークと連動したロッカー（実装中）で、買取をより身近にします。
        </p>
    </div>
</div>

<div class="jumbotron jumbotron-fluid" id="fourth">
    <div class="container">
        <h1 class="display-5 text-white">買取の流れ</h1>
        <p class="text-white">
            4ステップで、簡単に買取が可能。
        </p>
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters p-3">
                <div class="col-md-4 my-auto">
                    <img class="card-img" src="../img/flow1.svg" style="width: 80%;">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">1．段ボールにつめる</h5>
                        <p>売りたい商品を段ボールにつめて、身分証明書のコピーを同封します。</p>
                        <a class="btn btn-primary" href="/info/flow1">詳しく</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-3" style="max-width: 540px">
            <div class="row no-gutters p-3">
                <div class="col-md-4 my-auto">
                    <img class="card-img" src="../img/flow2.svg" style="width: 80%;">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">2．申し込む</h5>
                        <p>買取を申し込みます。会員登録すると便利な機能を使えますが、登録しなくても利用できます。</p>
                        <a class="btn btn-primary" href="/info/flow2">詳しく</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-3" style="max-width: 540px">
            <div class="row no-gutters p-3">
                <div class="col-md-4 my-auto">
                    <img class="card-img" src="../img/flow3.svg" style="width:80%;">
                </div>
                <div class=" col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">3.査定を確認する</h5>
                        <p>査定完了メールに記載したリンクをクリックし査定内容を確認し、了承します。</p>
                        <a class="btn btn-primary" href="/info/flow3">詳しく</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-3" style="max-width: 540px">
            <div class="row no-gutters p-3">
                <div class="col-md-4 my-auto">
                    <img class="card-img" src="../img/flow4.svg" style="width:80%;">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">4．入金</h5>
                        <p>指定した方法で入金します。</p>
                        <a class="btn btn-primary" href="/info/flow4">詳しく</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
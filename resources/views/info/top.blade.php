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
@section('top-container',''){{-- topのみ、containerなしに設定 --}}
@section('content')

{{-- メインビジュアル --}}
<div class="">
    {{-- <div class="jumbotron jumbotron-fluid" id="top">
        <div class="container mt-5">
            <h1 class="display-5">あたらしい買取</h1>
            <p class="">
                とそブックスは、革新的な買取サービスを提供します。<br>安全、簡単、公正、スピーディで買取をより身近なものにし、環境に配慮した新たなライフスタイルを支援します。
            </p>
            <a href="/register" class="btn btn-success btn-large mt-5">とそブックスに登録する</a>
        </div>
    </div> --}}
    <div class="py-4 bg-dark">
        <div class="container mt-5">
            <h1 class="display-4 text-white" style="font-weight:900">あたらしい買取</h1>
            <p class="text-white">
                とそブックスは、新しいネット買取サービスを提供しています。
                <br>安全、簡単、公正、スピーディで買取をより身近なものにし、環境に配慮した新たなライフスタイルを支援します。
            </p>
            <a href="/register" class="btn btn-success btn-large mt-5">とそブックスに登録する</a>
            <a href="/register" class="ml-3 btn btn-success btn-sm mt-5">会員登録せず売る</a>
        </div>
    </div>
</div>
{{-- /メインビジュアル --}}

<!-- コンテンツ01（店概要） -->
<div class="py-4 bg-light">
    <section id="about">
        <div class="container">
            <!-- 上段 -->
            <div class="row mb-4">
                <div class="col-md-8 mb-3">
                    <h3 class="mb-3">とそブックスについて</h3>
                    <p>とそブックスは、書籍等のネット買取を行っています。<br>
                        段ボールにつめ、PC・スマートフォンの簡単な入力だけで買取が利用できます。
                    </p>
                    <a href="#menu" class="btn btn-secondary">メニューを見る</a>
                    <a href="#shop" class="btn btn-secondary">店舗情報を見る</a>
                </div>
                <div class="col-md-4">
                    <img class="" src="../img/book.svg" style="width:18rem;">
                </div>
            </div>
    </section>
</div>
<!-- /コンテンツ01 -->

<!-- コンテンツ02（方法） -->
<div class="py-4">
    <section id="about">
        <div class="container">
            <!-- 上段 -->
            <div class="row mb-4">
                <div class="col-md-8 mb-3">
                    <h3 class="mb-3">買取方法</h3>
                    <p>X COFFEEは、店主が焙煎したこだわりのコーヒーを最高の空間とおもてなしで提供する自家焙煎のカフェです。店主が世界中のコーヒー豆を焙煎し、コーヒー豆の種類にあわせ、心を込めて焙煎、抽出しております。また、女性に丁度良いボリュームのワンプレートランチ、季節のスイーツなどもご好評いただいております。</p>
                    <p>最高においしい一杯のコーヒーを、最高に心地よい空間で。美味しいコーヒーを飲みながら、ゆったりとした素敵な空間を過ごしに、ぜひX COFFEEにお越しください。</p>
                    <a href="#menu" class="btn btn-secondary">メニューを見る</a>
                    <a href="#shop" class="btn btn-secondary">店舗情報を見る</a>
                </div>
            </div>
    </section>
</div>
<!-- /コンテンツ02 -->

<!-- コンテンツ03（店舗情報） -->
<div class="py-4 bg-light">
    <section id="about">
        <div class="container">
            <!-- 上段 -->
            <div class="row mb-4">
                <div class="col-md-8 mb-3">
                    <h3 class="mb-3">店舗情報</h3>
                    <p>X COFFEEは、店主が焙煎したこだわりのコーヒーを最高の空間とおもてなしで提供する自家焙煎のカフェです。店主が世界中のコーヒー豆を焙煎し、コーヒー豆の種類にあわせ、心を込めて焙煎、抽出しております。また、女性に丁度良いボリュームのワンプレートランチ、季節のスイーツなどもご好評いただいております。</p>
                    <p>最高においしい一杯のコーヒーを、最高に心地よい空間で。美味しいコーヒーを飲みながら、ゆったりとした素敵な空間を過ごしに、ぜひX COFFEEにお越しください。</p>
                </div>
            </div>
    </section>
</div>
<!-- /コンテンツ03 -->

<!-- コンテンツ04（店長） -->
<div class="py-4">
    <section id="about">
        <div class="container">
            <!-- 上段 -->
            <div class="row mb-4">
                <div class="col-md-8 mb-3">
                    <h3 class="mb-3">店長</h3>
                    <p>X COFFEEは、店主が焙煎したこだわりのコーヒーを最高の空間とおもてなしで提供する自家焙煎のカフェです。店主が世界中のコーヒー豆を焙煎し、コーヒー豆の種類にあわせ、心を込めて焙煎、抽出しております。また、女性に丁度良いボリュームのワンプレートランチ、季節のスイーツなどもご好評いただいております。</p>
                </div>
            </div>
    </section>
</div>
<!-- /コンテンツ04 -->

@endsection
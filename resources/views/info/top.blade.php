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
            {{-- <a href="/register" class="ml-3 btn btn-success btn-sm mt-5">会員登録せず売る</a> --}}
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
                        段ボールにつめ、PC・スマートフォンの簡単な入力をするだけで買取が利用できます。
                    </p>
                    {{-- <a href="#menu" class="btn btn-secondary">メニューを見る</a> --}}
                </div>
                <div class="col-md-4 d-none d-lg-block">
                    <img class="" src="{{asset('img/book.svg')}}" style="width:14rem;">
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
                <div class="col-12 mb-3">
                    <h3 class="mb-3">買取方法</h3>

                    <div class="card mb-3 shadow p-3 mb-5 bg-white rounded border-0" style="max-width: 540px; background: url('{{asset('img/flow1.svg')}}') no-repeat right center; background-size:30%">
                        <div class="card-body">
                            <h5 class="card-title">1．段ボールにつめる</h5>
                            <p>売りたい商品を段ボールにつめて、身分証明書のコピーを同封します。</p>
                            <a class="btn btn-secondary" href="/info/flow1">詳しく</a>
                        </div>
                    </div>

                    <div class="card mb-3 shadow p-3 mb-5 bg-white rounded border-0" style="max-width: 540px; background: url('{{asset('img/flow2.svg')}}') no-repeat right center; background-size:30%;">
                        <div class="card-body">
                            <h5 class="card-title">2．申し込む</h5>
                            <p>PCやスマホから入力します。会員登録すると便利な機能を使えますが、登録しなくても利用できます。</p>
                            <a class="btn btn-secondary" href="/info/flow2">詳しく</a>
                        </div>
                    </div>

                    <div class="card mb-3 shadow p-3 mb-5 bg-white rounded border-0" style="max-width: 540px; background: url('{{asset('img/flow3.svg')}}') no-repeat right center; background-size:30%">
                        <div class="card-body">
                            <h5 class="card-title">3．査定を確認する</h5>
                            <p>査定完了メールに記載したリンクをクリックし査定内容を確認し、了承します。</p>
                            <a class="btn btn-secondary" href="/info/flow3">詳しく</a>
                        </div>
                    </div>

                    <div class="card mb-3 shadow p-3 mb-5 bg-white rounded border-0" style="max-width: 540px; background: url('{{asset('img/flow4.svg')}}') no-repeat right center; background-size:30%;">
                        <div class="card-body">
                            <h5 class="card-title">4．入金</h5>
                            <p>指定した方法で入金されます。</p>
                            <a class="btn btn-secondary" href="/info/flow4">詳しく</a>
                        </div>
                    </div>
                </div>
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
                <div class="col-md-6 mb-3">
                    <h3 class="mb-3">店舗情報</h3>
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>店名</th>
                                <td>とそブックス</td>
                            </tr>
                            <tr>
                                <th>住所</th>
                                <td>〒890-0081　鹿児島県鹿児島市唐湊4-14-26塩満アパート102</td>
                            </tr>
                            <tr>
                                <th>営業形態</th>
                                <td>ネット買取のみ</td>
                            </tr>
                            <tr>
                                <th>定休日</th>
                                <td>土日祝</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <section id="access">
                        <h3 class="mb-3">所在地</h3>
                        <!-- アクセスマップ -->
                        {{-- <div class="embed-responsive embed-responsive-4by3">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25315.025656145044!2d130.53724594725026!3d31.56117234560029!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x353e6724f0717987%3A0x2ff2a3555304625e!2z44CSODkwLTAwODEg6bm_5YWQ5bO255yM6bm_5YWQ5bO25biC5ZSQ5rmK77yU5LiB55uu77yR77yU4oiS77yS77yWIOWhqea6gOOCouODkeODvOODiA!5e0!3m2!1sja!2sjp!4v1570765489950!5m2!1sja!2sjp"
                              width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                        </div> --}}
                        <img src="{{asset('img/top-map.png')}}" class="img-responsive" defer>
                        <!-- /アクセスマップ -->
                    </section>
                </div>
            </div>
    </section>
</div>
<!-- /コンテンツ03 -->

<!-- コンテンツ04（店長） -->
<div class="py-4">
    <section id="about">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h3 class="mb-3">担当者</h3>
                    <div class="card mb-3 border-0">
                        <img src="{{asset('img/face.jpg')}}" class="img-thumbnail rounded-circle border-white bg-light" alt="" style="width: 6rem; height:6rem;">
                        <div class="card-body">
                            <p class="card-text">店長の貴島です。私が本の査定や、発送をしています。普段から本は好きで丁寧に扱っていますが、皆様からお預かりした本はさらに細心の注意を払って取り扱っています。お気づきの点などございましたらご連絡ください。</p>
                            <p class="card-text"><small class="text-muted"></small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /コンテンツ04 -->

@endsection
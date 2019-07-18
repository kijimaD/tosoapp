<style>
    div#top.jumbotron {
        background: url("../img/flow1-prepare1.jpg") no-repeat center center;
    }
</style>

@extends('layouts.tosoapp')

@section('title','段ボールにつめる')

@section('content')

<p>梱包方法を説明します。</p>
<h3>用意するもの</h3>
<li>・商品（20冊以上で送料無料）</li>
<li>・段ボール</li>
<li>・梱包用テープ</li>
<li>・身分証明書のコピー</li>

<h3>商品をつめる</h3>

隙間がないようにつめます。

<div style="max-width: 540px;">
    <img src="../img/flow1-prepare1.jpg" class="img-responsive center-block p-4" width="600" height="">
</div>

<h3>同封する</h3>

身分証明書のコピーを同封します。
古物営業法に定められた身分確認で使用します。

<div style="max-width: 540px;">
    <img src="../img/flow1-prepare2.jpg" class="img-responsive center-block p-4" width="600" height="">
</div>

<div style="max-width: 540px;">
    <img src="../img/flow1-prepare3.jpg" class="img-responsive center-block p-4" width="600" height="">
</div>

以上で荷物の準備完了です。

@endsection
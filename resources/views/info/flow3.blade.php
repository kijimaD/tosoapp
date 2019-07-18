@extends('layouts.tosoapp')

@section('title','査定を確認する')

@section('content')

<p>
    <a href="/info/flow2">←（前）申し込む</a>
</p>

<p>
    査定完了後にメールを送信します。メールのリンク、もしくは査定履歴から査定画面にアクセスできます。<br>
    「了承」「返送」を選択して、送信してください。<br>
</p>

<div style="max-width: 540px;">
    <img src="../img/flow3-prepare1.png" class="img-fluid center-block py-4" style="max-width:100%;height:auto;">
</div>

<p>
    ※画像は開発中のものです。じっさいの画面とは異なる場合があります。
</p>
<p>
    <a href="/info/flow4">（次）入金→</a>
</p>

@endsection
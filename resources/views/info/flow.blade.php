@extends('layouts.tosoapp')

@section('title','買取の流れ')

@section('content')

<div class="card mb-4">
    <div class="card-body">
        <h3 class="card-title">1．段ボールにつめる</h3>
        {{-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> --}}
        <p class="card-text">売りたいものを段ボールに詰めます。</p>
        {{-- <a href="#" class="card-link">Card link</a>
        <a href="#" class="card-link">Another link</a> --}}
    </div>
</div>

<div class="card mb-4">
    <div class="card-body">
        <h3 class="card-title">2．買取申し込みする</h3>
        <p class="card-text">買取申し込みします。 会員登録すると便利な機能を使用できますが、登録しなくても利用できます。</p>
    </div>
</div>

<div class="card mb-4">
    <div class="card-body">
        <h3 class="card-title">3．査定を確認する</h3>
        <p class="card-text">査定完了メールに記載したリンクをクリックし査定内容を確認し了承します。</p>
    </div>
</div>

<div class="card mb-4">
    <div class="card-body">
        <h3 class="card-title">4．入金！</h3>
        <p class="card-text">指定方法にて入金します。</p>
    </div>
</div>

@endsection
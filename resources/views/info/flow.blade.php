@extends('layouts.tosoapp')

@section('title','買取の流れ')

@section('content')

<div class="card mb-3" style="max-width: 540px;">
    <div class="row no-gutters p-3">
        <div class="col-md-4 my-auto">
            <img class="card-img" src="../img/flow1.svg" style="width: 80%; height:80%">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">1．段ボールにつめる</h5>
                <p>売りたいものを段ボールにつめて、身分証明書のコピーを同封します。</p>
                <a class="btn btn-primary" href="/info/flow1">詳しく</a>
            </div>
        </div>
    </div>
</div>

<div class="card mb-3" style="max-width: 540px">
    <div class="row no-gutters p-3">
        <div class="col-md-4 my-auto">
            <img class="card-img" src="../img/flow2.svg" style="width: 80%; height:80%;">
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
            <img class="card-img" src="../img/flow3.svg" style="width: 80%;height:80%;">
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
            <img class="card-img" src="../img/flow4.svg" style="width:80%;height:80%;">
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

@endsection
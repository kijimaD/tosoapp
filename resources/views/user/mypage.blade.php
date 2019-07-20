@extends('layouts.tosoapp')

@section('title','マイページ')

@section('content')

<style>
    h5 span {
        border: solid 1px black;
        padding: 3px;
    }

    ul {
        padding-left: 1em;
    }
</style>

<h5><span>登録情報</span></h5>
<ul>
    <li><a href="/bank">入金口座</a></li>
    <li><a href="/address">アドレス帳</a></li>
    <li><a href="/entry">買取履歴</a></li>
</ul>
<h5><span>買取を申し込む</span></h5>
<ul>
    <li><a href="/entry/add" role="button">買取申込</a></li>

</ul>
@endsection
@extends('layouts.tosoapp')

@section('title','マイページ')

@section('content')
<h5>お客様情報</h5>
<ul>
    <li><a href="/bank">口座情報</a></li>
    <li><a href="/address">住所情報</a></li>
    <li><a href="/entry">買取履歴</a></li>
</ul>
<h5>買取を申し込む</h5>
<ul>
    <li><a href="/entry/add" role="button">買取申込</a></li>

</ul>
@endsection
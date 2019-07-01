@extends('layouts.tosoapp')

@section('title','マイページ')

@section('content')
<ul>
    <li><a href="/address">住所管理</a></li>
    <li><a href="/bank">入金口座</a></li>
    <li><a href="/entry/add">買取申込</a></li>
    <li><a href="/entry">買取履歴</a></li>
    <li><a href="">進行状況確認</a></li>
    <li><a href="">査定承認</a></li>
</ul>
@endsection
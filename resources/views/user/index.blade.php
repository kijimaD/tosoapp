@extends('layouts.tosoapp')

@section('title','客一覧')

@section('content')
<div class="table-responsive">
    <table class="table table-striped table-bordered table-sm">
        <thead>
            <tr>
                <th><a href="/hello?sort=age">ユーザID</a></th>
                <th><a href="/hello?sort=age">姓</a></th>
                <th><a href="/hello?sort=age">名</a></th>
                <th><a href="/hello?sort=age">eメール</a></th>
                <th><a href="/hello?sort=age">eメール認証</a></th>
                <th><a href="/hello?sort=age">登録日</a></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->family_name}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->email_verified_at}}</td>
                <td>{{$item->created_at}}</td>
                <td><a href="/customer/edit?CustomerID={{$item->CustomerID}}">修正</a></td>
                <td><a href="/customer/del?CustomerID={{$item->CustomerID}}">消去</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
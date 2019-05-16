@extends('layouts.tenjiapp')

@section('title','客一覧')

@section('content')
<div class="table-responsive">
    <table class="table table-striped table-bordered table-sm">
        <thead>
            <tr>
                <th><a href="/hello?sort=name">客ID</a></th>
                <th><a href="/hello?sort=mail">性別</a></th>
                <th><a href="/hello?sort=age">年齢</a></th>
                <th><a href="/hello?sort=age">職業</a></th>
                <th><a href="/hello?sort=age">どこで知った</a></th>
                <th><a href="/hello?sort=age">メモ</a></th>
                <th><a href="/hello?sort=age">作成日</a></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            <tr>
                <td>{{$item->CustomerID}}</td>
                <td>{{$item->sex}}</td>
                <td>{{$item->age}}</td>
                <td>{{$item->employment}}</td>
                <td>{{$item->info_route}}</td>
                <td>{{$item->memo}}</td>
                <td>{{$item->created_at}}</td>
                <td><a href="/customer/edit?CustomerID={{$item->CustomerID}}">修正</a></td>
                <td><a href="/customer/del?CustomerID={{$item->CustomerID}}">消去</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
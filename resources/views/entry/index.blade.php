@extends('layouts.tosoapp')

@section('title','入金口座一覧')

@section('content')
<div class="table-responsive">
    <table class="table table-striped table-bordered table-sm">
        <thead>
            <tr>
                <th><a href="">案件ID</a></th>
                <th><a href="">顧客ID</a></th>
                <th><a href="">入金方法ID</a></th>
                <th><a href="">登録日</a></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->user_id}}</td>
                <td>{{$item->payment_id}}</td>
                <td>{{$item->created_at}}</td>
                <td><a href="/entry/edit?id={{$item->id}}">修正</a></td>
                <td><a href="/entry/del?id={{$item->id}}">消去</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
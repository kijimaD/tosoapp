@extends('layouts.tosoapp')

@section('title',' 履歴一覧')

@section('content')
<a href="/entry/add">新規追加</a>
<div class="table-responsive">
    <table class="table table-striped table-bordered table-sm">
        <thead>
            <tr>
                <th><a href="">案件ID</a></th>
                <th><a href="">入金方法ID</a></th>
                <th><a href="">発送方法ID</a></th>
                <th><a href="">申請時刻</a></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->paymentway->payment_way}}</td>
                <td>{{$item->shippingway->shipping_way}}</td>
                <td>{{$item->created_at}}</td>
                {{-- <td><a href="/entry/edit?id={{$item->id}}">修正</a></td>
                <td><a href="/entry/del?id={{$item->id}}">消去</a></td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
@extends('layouts.tosoapp_admin')

@section('title',' 履歴一覧')

@section('content')
<a href="/entry/add">新規追加</a>
<div class="table-responsive">
    <table class="table table-striped table-bordered table-sm">
        <thead>
            <tr>
                <th><a href="">案件ID</a></th>
                <th><a href="">ユーザID</a></th>
                <th><a href="">入金方法</a></th>
                <th><a href="">振込先</a></th>
                <th><a href="">発送方法</a></th>
                <th><a href="">発送先</a></th>
                <th><a href="">申請時刻</a></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->user_id}}</td>
                <td>{{$item->paymentway->payment_way}}</td>
                <td>{{$item->paymentbank->bank->bank_name}}
                    {{$item->paymentbank->bank->bank_branch}}
                    {{$item->paymentbank->bank->bank_type}}
                    {{$item->paymentbank->bank->bank_num}}</td>
                <td>{{$item->shippingway->shipping_way}}</td>
                <td>{{$item->applygoods->collection->addressbook->zip}}</td>
                <td>{{$item->created_at}}</td>
                {{-- <td><a href="/entry/edit?id={{$item->id}}">修正</a></td>
                <td><a href="/entry/del?id={{$item->id}}">消去</a></td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
@extends('layouts.tosoapp')

@section('title',' 履歴一覧')

@section('content')
<a href="/entry/add">新規追加</a>
{{-- <div class="table-responsive">
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
<td><a href="/entry/edit?id={{$item->id}}">修正</a></td>
<td><a href="/entry/del?id={{$item->id}}">消去</a></td>
</tr>
@endforeach
</tbody>
</table>
</div> --}}
{{-- ---------------------------------- --}}
<div class="container">
    <div class="row">
        @foreach ($items as $item)
        <div class="card col-sm-12 mr-3 mb-3" style="width: 18rem;">
            <div class="card-header bg-white">
                {{-- <h5 class="card-title">{{$item->user->family_name}}{{$item->user->name}}</h5> --}}
                <div>
                    {{-- <a class="btn btn-outline-dark btn-sm" href="/address/edit?id={{$item->id}}">修正</a>
                    <a class="btn btn-outline-dark btn-sm" href="/address/del?id={{$item->id}}">削除</a> --}}
                    送信日時:{{$item->created_at}}<br>
                </div>
            </div>
            <div class="card-body">
                <p class="card-text">
                    入金方法:{{$item->paymentway->payment_way}}<br>
                    受け渡し方法:{{$item->shippingway->shipping_way}}<br>
                    買取数<br>
                    入金額合計:　円<br>
                </p>
            </div>
            <div class="card-footer bg-white">
                @if (isset($item->useraddress->id))
                <p class="text-success">既定の住所</p>
                @else
                <form action="/address/default/add" method="post">
                    {{ csrf_field() }}
                    {{-- <input type="hidden" name="addressBook_id" value="{{$item->id}}" />
                    <input type="hidden" name="user_id" value="{{$user->id}}" />
                    <input type="submit" value="既定にする" class="btn btn-outline-dark" /> --}}
                </form>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
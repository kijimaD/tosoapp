@extends('layouts.tosoapp_admin')

@section('title','査定一覧')

@section('content')
<p><a href="/assessment/add">追加</a></p>
<div class="table-responsive">
    <table class="table table-striped table-bordered table-sm">
        <thead>
            <tr>
                <th>査定ID</th>
                <th>案件ID</th>
                <th>送料種別</th>
                <th>送料コスト</th>
                <th>適用送料</th>
                <th>クーポン名</th>
                <th>価格上昇割合</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->entry->id}}</td>
                <td>{{$item->shippingcost->shippingcost_type}}</td>
                <td>{{$item->shippingcost->cost}}</td>
                <td>{{$item->shippingcost->apply_cost}}</td>
                <td>{{$item->coupen->coupen_name}}</td>
                <td>{{$item->coupen->coupen_value}}</td>
                {{-- <td><a href="/address/edit?id={{$item->id}}">修正</a></td>
                <td><a href="/address/del?id={{$item->id}}">消去</a></td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
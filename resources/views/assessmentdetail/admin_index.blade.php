@extends('layouts.tosoapp_admin')

@section('title','査定一覧')

@section('content')




<div class="table-responsive">
    <table class="table table-striped table-bordered table-sm">
        <thead>
            <tr>
                <th>査定ID</th>
                <th>査定明細ID</th>
                <th>ISBN</th>
                <th>タイトル</th>
                <th>コンディション</th>
                <th>市場価格</th>
                <th>買取価格</th>
                <th>売価</th>
                <th>結果<th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            <tr>
                <td>{{$item->assessment->id}}</td>
                <td>{{$item->id}}</td>
                <td>{{$item->goods->title->isbn}}</td>
                <td>{{$item->goods->title->title_name}}</td>
                <td>{{$item->goods->condition_id}}</td>
                <td>{{$item->goods->market_price}}</td>
                <td>{{$item->goods->get_price}}</td>
                <td>{{$item->goods->sell_price}}</td>
                <td>
                    @if(isset($item->approvegoods->id))
                        <span class="text-success">了承</span>
                        @endif
                        @if(isset($item->resendgoods->id))
                            <span class="text-danger">返送</span>
                            @endif
                </td>
                <td><a href="/assessment/edit?id={{$item->id}}">修正</a></td>
                <td><a href="/assessment/del?id={{$item->id}}">消去</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
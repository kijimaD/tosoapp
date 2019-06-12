@extends('layouts.tosoapp_admin')

@section('title','返送商品一覧')

@section('content')
<div class="table-responsive">
    <table class="table table-striped table-bordered table-sm">
        <thead>
            <tr>
                <th>返送商品ID</th>
                <th>案件ID</th>
                <th>配送方法</th>
                <th>送料コスト</th>
                <th>タイトル</th>
                <th>ISBN</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->assessmentdetail->assessment->entry->id}}</td>
                <td>{{$item->assessmentdetail->assessment->entry->shippingway->shipping_way}}</td>
                <td>{{$item->assessmentdetail->assessment->entry->applygoods->id}}</td>
                <td>{{$item->assessmentdetail->goods->title->title_name}}</td>
                <td>{{$item->assessmentdetail->goods->title->isbn}}</td>
                @if(isset($item->assessmentdetail->resendgoods->resenddonegoods->id))
                    <td>返送完了</td>
                    @else
                    <form action="/resend/add" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="resendgoods_id" value="{{$item->id}}" />
                        <td><input type="submit" value="返送完了"></td>
                        @endif

                        <td><a href="/assessmentdetail/edit?id={{$item->id}}">明細</a></td>
                        <td><a href="/assessment/edit?id={{$item->id}}">修正</a></td>
                        <td><a href="/assessment/del?id={{$item->id}}">消去</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
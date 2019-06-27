@extends('layouts.tosoapp_admin')

@section('title','査定一覧')

@section('content')

@if(session('done_message'))
<div class="done_message bg-success text-center">
    {{ session('done_message')}}
</div>
@endif

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
                <th>数量</th>
                <th>査定小計</th>
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
                <td>{{$item->assessmentdetails->count()}}</td>
                <td>{{$item->sumPrice()}}</td>
                @if(isset($item->entry->assessmentdone->id))
                    <td class="text-success">査定完了</td>
                    @else
                    <form action="/assessment/assessmentdone_add" method="post">
                        {{csrf_field()}}
                        {{session()->put(['entry_id'=>$item->id])}}
                        <td><input type="submit" value="査定完了した"></td>
                        @endif
                        <td><a href="/assessmentdetail/edit?id={{Crypt::encrypt('assessment_id' . $item->id)}}">明細</a></td>
                        <td><a href="/assessment/edit?id={{Crypt::encrypt('assessment_id' . $item->id)}}">修正</a></td>
                        <td><a href="/assessment/del?id={{Crypt::encrypt('assessment_id' . $item->id)}}">消去</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
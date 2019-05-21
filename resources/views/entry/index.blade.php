@extends('layouts.tosoapp')

@section('title','入金口座一覧')

@section('content')
<p><a href="/bank/add">新規追加</a></p>
<div class="table-responsive">
    <table class="table table-striped table-bordered table-sm">
        <thead>
            <tr>
                <th><a href="/hello?sort=age">銀行名</a></th>
                <th><a href="/hello?sort=age">支店名</a></th>
                <th><a href="/hello?sort=age">口座種別</a></th>
                <th><a href="/hello?sort=age">口座番号</a></th>
                <th><a href="/hello?sort=age">登録日</a></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            <tr>
                <td>{{$item->bank_name}}</td>
                <td>{{$item->bank_branch}}</td>
                <td>{{$item->bank_type}}</td>
                <td>{{$item->bank_num}}</td>
                <td>{{$item->created_at}}</td>
                @if (isset($item->defaultbank->id))
                <td>既定の口座</td>
                @else
                <form action="/bank/default/add" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="bank_id" value="{{$item->id}}" />
                    <input type="hidden" name="user_id" value="{{$user->id}}" />
                    <td><input type="submit" value="既定にする" /></td>
                </form>
                @endif
                <td><a href="/bank/edit?id={{$item->id}}">修正</a></td>
                <td><a href="/bank/del?id={{$item->id}}">消去</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
@extends('layouts.tosoapp')

@section('title','アドレス帳')

@section('content')
<p><a href="/address/add">新規追加</a></p>
<div class="table-responsive">
    <table class="table table-striped table-bordered table-sm">
        <thead>
            <tr>
                <th><a href="/hello?sort=age">郵便番号</a></th>
                <th><a href="/hello?sort=age">都道府県ID</a></th>
                <th><a href="/hello?sort=age">市区町村</a></th>
                <th><a href="/hello?sort=age">以降の住所</a></th>
                <th><a href="/hello?sort=age">顧客</a></th>
                <th><a href="/hello?sort=age">登録日</a></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            <tr>
                <td>{{$item->zip}}</td>
                <td>{{$item->prefecture->prefecture_name}}</td>
                <td>{{$item->city}}</td>
                <td>{{$item->address}}</td>
                <td>{{$item->user->family_name}}{{$item->user->name}}</td>
                <td>{{$item->created_at}}</td>
                @if (isset($item->useraddress->id))
                <td>既定の住所</td>
                @else
                <form action="/address/default/add" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="addressBook_id" value="{{$item->id}}" />
                    <input type="hidden" name="user_id" value="{{$user->id}}" />
                    <td><input type="submit" value="既定にする" /></td>
                </form>
                @endif

                <td><a href="/address/edit?id={{$item->id}}">修正</a></td>
                <td><a href="/address/del?id={{$item->id}}">消去</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
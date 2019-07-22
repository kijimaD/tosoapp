@extends('layouts.tosoapp_admin')

@section('title','集荷情報ビュー')

@section('content')
<div class="table-responsive">
    <table class="table table-striped table-bordered table-sm">
        <thead>
            <tr>
                <th>案件ID</th>
                <th>顧客</th>
                <th>郵便番号</th>
                <th>都道府県</th>
                <th>市区町村</th>
                <th>以降の住所</th>
                <th>集荷日</th>
                <th>集荷時刻帯</th>
                <th>箱数</th>
                <th>完了</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->user->name}}</td>
                <td>{{$item->applygoods->collection->addressbook->zip}}</td>
                <td>{{$item->applygoods->collection->addressbook->prefecture->prefecture_name}}</td>
                <td>{{$item->applygoods->collection->addressbook->city}}</td>
                <td>{{$item->applygoods->collection->addressbook->address}}</td>
                <td>{{$item->applygoods->collection->collection_day}}</td>
                <td>{{$item->applygoods->collection->collection_time}}</td>
                <td>{{$item->applygoods->collection->box_num}}</td>

                @if (isset($item->applydone->id))
                <td>委託完了({{$item->applydone->created_at}})</td>
                @else
                <form action="/collection/applydone_add" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{Crypt::encrypt('entry_id' . $item->id)}}">
                    <td><input type="submit" value="委託完了" /></td>
                </form>
                @endif

                {{-- <td><a href="/address/edit?id={{$item->id}}">修正</a></td>
                <td><a href="/address/del?id={{$item->id}}">消去</a></td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
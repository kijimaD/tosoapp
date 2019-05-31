@extends('layouts.tosoapp_admin')

@section('title','明細入力')

@section('content')
<form action="/assessment/edit" method="post">
    {{csrf_field()}}

    {{-- <input type="hidden" name="id" value="{{$items->id}}" /> --}}

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-sm">
            <thead>
                <tr>
                    <th>査定ID</th>
                    <th>査定明細ID</th>
                    <th>ISBN</th>
                    <th>タイトル</th>
                    <th>状態説明文</th>
                    <th>コンディションID</th>
                    <th>市場価格</th>
                    <th>買取価格</th>
                    <th>売価</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                <tr>
                    <td>{{$item->assessment->id}}</td>
                    <td>{{$item->id}}</td>
                    <td><input type="text" name="isbn" value="{{$item->goods->title->isbn}}" /></td>
                    <td><input type="text" name="title_name" value="{{$item->goods->title->title_name}}" /></td>
                    <td><input type="text" name="description" value="{{$item->goods->description}}" /></td>
                    <td><input type="text" name="condition_id" value="{{$item->goods->condition_id}}" /></td>
                    <td><input type="text" name="market_price" value="{{$item->goods->market_price}}" /></td>
                    <td><input type="text" name="get_price" value="{{$item->goods->get_price}}" /></td>
                    <td><input type="text" name="sell_price" value="{{$item->goods->sell_price}}" /></td>
                    <td><a href="/assessment/del?id={{$item->id}}">消去</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="form-group">
        <button class="btn btn-primary" type="submit">送信</button>
    </div>
</form>

@endsection
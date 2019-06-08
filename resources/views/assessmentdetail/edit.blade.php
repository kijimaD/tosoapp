@extends('layouts.tosoapp_admin')

@section('title','明細入力')

@section('content')
<form action="/assessmentdetail/edit" method="post">
    {{csrf_field()}}

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
                <input type="hidden" name="goods_id[]" value="{{$item->goods->id}}" />
                <input type="hidden" name="title_id[]" value="{{$item->goods->title->id}}" />
                <tr>
                    <td>{{$item->assessment->id}}</td>
                    <td>{{$item->id}}</td>
                    <td><input type="text" name="isbn[]" value="{{$item->goods->title->isbn}}" /></td>
                    <td><input type="text" name="title_name[]" value="{{$item->goods->title->title_name}}" /></td>
                    <td><input type="text" name="description[]" value="{{$item->goods->description}}" /></td>
                    <td><input type="text" name="condition_id[]" value="{{$item->goods->condition_id}}" /></td>
                    <td><input type="text" name="market_price[]" value="{{$item->goods->market_price}}" /></td>
                    <td><input type="text" name="get_price[]" value="{{$item->goods->get_price}}" /></td>
                    <td><input type="text" name="sell_price[]" value="{{$item->goods->sell_price}}" /></td>
                    <td><a href="/assessmentdetail/del?id={{$item->id}}">消去</a></td>
                </tr>
                @endforeach
                <tr>
                    <td><b>合計</b></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{$sum_market_price}}</td>
                    <td>{{$sum_get_price}}</td>
                    <td>{{$sum_sell_price}}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="form-group">
        <button class="btn btn-primary" type="submit">送信</button>
    </div>
</form>

@endsection
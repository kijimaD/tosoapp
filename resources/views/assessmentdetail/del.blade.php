@extends('layouts.tosoapp_admin')

@section('title','消去確認')

@section('content')

<p>以下を削除します。</p>
<form action="/assessmentdetail/del" method="post">
    {{csrf_field()}}
    <input type="hidden" name="id" value="{{$item->id}}" />

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
                <tr>
                    <td>{{$item->assessment->id}}</td>
                    <td>{{$item->id}}</td>
                    <td>{{$item->goods->title->isbn}}</td>
                    <td>{{$item->goods->title->title_name}}</td>
                    <td>{{$item->goods->description}}</td>
                    <td>{{$item->goods->condition_id}}</td>
                    <td>{{$item->goods->market_price}}</td>
                    <td>{{$item->goods->get_price}}</td>
                    <td>{{$item->goods->sell_price}}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="form-group">
        <button class="btn btn-primary" type="submit">削除確認</button>
    </div>
</form>

@endsection
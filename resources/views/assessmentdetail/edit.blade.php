@extends('layouts.tosoapp_admin')

@section('title','明細入力')

@section('content')
<form action="/assessmentdetail/edit" method="post">
    {{csrf_field()}}
    {{session()->forget('goods_id')}}
    {{session()->forget('title_id')}}

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-sm">
            <thead>
                <tr>
                    <th>査定ID</th>
                    <th>査定明細ID</th>
                    <th>ISBN</th>
                    <th>タイトル</th>
                    <th>コンディションID</th>
                    <th>状態説明文</th>
                    <th>市場価格</th>
                    <th>買取価格</th>
                    <th>売価</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                {{session()->push('goods_id',$item->goods->id)}}
                {{session()->push('title_id',$item->goods->title->id)}}
                {{-- {{session()->put(['assessment_id'=>$form->id])}} --}}
                <tr>
                    <td>{{$item->assessment->id}}</td>
                    <td>{{$item->id}}</td>
                    <td><input type="text" name="isbn[]" value="{{$item->goods->title->isbn}}" /></td>
                    <td><input type="text" name="title_name[]" value="{{$item->goods->title->title_name}}" /></td>
                    <td>
                        <select name="condition_id[]">
                            @if(empty($item->goods->condition_id))
                                <option value="" selected>
                                    未選択
                                </option>
                                @endif
                                @foreach ($conditions as $condition)
                                <option value='{{$condition->id}}' @if($item->goods->condition_id == $condition->id) selected
                                    @endif>
                                        {{$condition->condition_code}}(x{{$condition->condition_percent}})
                                </option>
                                @endforeach
                    </td>
                    <td><input type="text" name="description[]" value="{{$item->goods->description}}" /></td>
                    <td><input type="text" name="market_price[]" value="{{$item->goods->market_price}}" /></td>
                    <td><input type="text" name="get_price[]" value="{{$item->goods->get_price}}" /></td>
                    <td><input type="text" name="sell_price[]" value="{{$item->goods->sell_price}}" /></td>
                    <td><a href="/assessmentdetail/del?id={{\Crypt::encrypt($item->id)}}">消去</a></td>
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
        <input class="form-check-input" type="checkbox" name="flag_get_price" />
        <label class="form-check-label" for="flag_get_price">買取価格自動計算（コンディションIDを入れたあと）</label>
    </div>

    <div class="form-group">
        <input class="form-check-input" type="checkbox" name="flag_get_title" />
        <label class="form-check-label" for="flag_get_price">タイトル自動取得（ISBNを入れたあと）詳細内のタイトルをすべて更新するので、多用しない。</label>
    </div>

    <div class="form-group">
        <button class="btn btn-primary" type="submit">送信</button>
    </div>
</form>

@endsection
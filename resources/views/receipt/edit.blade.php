@extends('layouts.tosoapp_admin')

@section('title','入庫画面')

@section('content')
<form action="/receipt/edit" method="post">
    {{csrf_field()}}
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-sm">
            <thead>
                <tr>
                    <th>査定明細ID</th>
                    <th>タイトル</th>
                    <th>ISBN</th>
                    <th>倉庫番号</th>
                    <th>棚番号</th>
                    <th>板番号</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                <input type="hidden" name="approvegoods_id[]" value="{{$item->approvegoods->id}}">
                <input type="hidden" name="goods_id[]" value="{{$item->goods->id}}">
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->goods->title->title_name}}</td>
                    <td>{{$item->goods->title->isbn}}</td>
                    <td><input type="text" name="warehouse_id[]" value="" /></td>
                    <td><input type="text" name="rack_id[]" value="" /></td>
                    <td><input type="text" name="stage_id[]" value="" /></td>
                </tr>
                @endforeach
                <tr>
                    <td>{{$items->count()}}点</td>


                </tr>
            </tbody>
        </table>
    </div>

    <div class="form-group">
        <button class="btn btn-primary" type="submit">送信</button>
    </div>
</form>

@endsection
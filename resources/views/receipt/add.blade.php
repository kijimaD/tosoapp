@extends('layouts.tosoapp_admin')

@section('title','入庫画面')

@section('content')
<form action="/assessmentdetail/edit" method="post">
    {{csrf_field()}}

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-sm">
            <thead>
                <tr>
                    <th>案件ID</th>
                    <th>タイトル</th>
                    <th>ISBN</th>
                    <th>倉庫番号</th>
                    <th>棚番号</th>
                    <th>板番号</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                <tr>
                    <td>{{$item->assessmentdetail->assessment->entry->id}}</td>
                    <td>{{$item->assessmentdetail->goods->title->title_name}}</td>
                    <td></td>
                    <td><input type="text" name="isbn[]" value="" /></td>
                    <td><input type="text" name="title_name[]" value="" /></td>
                    <td>
                    </td>
                    <td><input type="text" name="description[]" value="" /></td>

                    <td><a href="/assessmentdetail/del?id={{$item->id}}">消去</a></td>
                </tr>
                @endforeach
                <tr>
                    <td>計:{{$items->count()}}</td>


                </tr>
            </tbody>
        </table>
    </div>

    <div class="form-group">
        <button class="btn btn-primary" type="submit">送信</button>
    </div>
</form>

@endsection
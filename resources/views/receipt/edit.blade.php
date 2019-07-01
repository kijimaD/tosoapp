@extends('layouts.tosoapp_admin')

@section('title','入庫修正画面')

@section('content')
<form action="/receipt/edit" method="post">
    {{csrf_field()}}
    {{session()->put(['storagestructure_id' => $form->storagestructure->id])}}
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-sm">
            <thead>
                <tr>
                    <th>入庫ID</th>
                    <th>タイトル</th>
                    <th>ISBN</th>
                    <th>倉庫番号</th>
                    <th>棚番号</th>
                    <th>板番号</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$form->id}}</td>
                    <td>{{$form->goods->title->title_name}}</td>
                    <td>{{$form->goods->title->isbn}}</td>
                    <td><input type="text" name="warehouse_id" value={{$form->storagestructure->warehouse->id}} /></td>
                    <td><input type="text" name="rack_id" value={{$form->storagestructure->rack->id}} /></td>
                    <td><input type="text" name="stage_id" value={{$form->storagestructure->stage->id}} /></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="form-group">
        <button class="btn btn-primary" type="submit">送信</button>
    </div>
</form>

@endsection
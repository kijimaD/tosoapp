@extends('layouts.tosoapp')

@section('title','アドレス削除')

@section('content')
<form action="/address/del" method="post">
    {{csrf_field()}}
    {{session()->put(['addressbook_id'=>$form->id])}}
    <div class="form-group">
        <label for="zip" class="col-form-label text-md-left">郵便番号</label>
        <div>
            <input type="text" name="zip" value="{{$form->zip}}" disabled="disabled" />
        </div>
    </div>

    <div class="form-group">
        <label for="prefecture_id" class="cl-form-label text-md-left">都道府県</label>
        <div>
            <select name="prefecture_id" disabled="disabled">
                @foreach ($prefectures as $prefecture)
                <option value="{{$prefecture->id}}" @if($form->prefecture_id == $prefecture->id) selected
                    @endif >
                    {{$prefecture->prefecture_name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="city" class="col-form-label text-md-left">市区町村</label>
        <div>
            <input type="text" name="city" value="{{$form->city}}" disabled="disabled" />
        </div>
    </div>

    <div class="form-group">
        <label for="address" class="col-form-label text-md-left">それ以降の住所</label>
        <div>
            <input type="text" name="address" value="{{$form->address}}" disabled="disabled" />
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-primary" type="submit">削除</button>
    </div>
</form>

@endsection
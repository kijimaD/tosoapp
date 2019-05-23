@extends('layouts.tosoapp')

@section('title','アドレス修正')

@section('content')
<form action="/address/edit" method="post">
    {{csrf_field()}}
    <input type="hidden" name="id" value="{{$form->id}}" />
    <div class="form-group">
        <label for="zip" class="col-form-label text-md-left">郵便番号</label>
        <div>
            <input type="text" name="zip" value="{{$form->zip}}" />
        </div>
    </div>

    <div class="form-group">
        <label for="prefecture_id" class="cl-form-label text-md-left">都道府県</label>
        <div>
            <select name="prefecture_id">
                @foreach ($items as $item)
                <option value="{{$item->id}}" @if(old('prefecture_id') == '{{$item->id}}') selected
                @endif >
                {{$item->prefecture_name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="city" class="col-form-label text-md-left">市区町村</label>
        <div>
            <input type="text" name="city" value="{{$form->city}}" />
        </div>
    </div>

    <div class="form-group">
        <label for="address" class="col-form-label text-md-left">それ以降の住所</label>
        <div>
            <input type="text" name="address" value="{{$form->address}}" />
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-primary" type="submit">送信</button>
    </div>
</form>

@endsection
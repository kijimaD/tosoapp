@extends('layouts.tosoapp')

@section('title','アドレス帳登録')

@section('content')
<form action="/address/add" method="post">
    {{csrf_field()}}
    {{session()->put(['user_id'=>$user->id])}}

    <div class="form-group">
        <label for="zip" class="col-form-label text-md-left">郵便番号</label>
        <div>
            <input type="text" name="zip" value="{{old('zip')}}" />
        </div>
    </div>

    <div class="form-group">
        <label for="prefecture_id" class="cl-form-label text-md-left">都道府県</label>
        <div>
            <select name="prefecture_id">
                <option value="" selected disabled></option>
                @foreach ($items as $item)
                <option value="{{$item->id}}" @if('prefecture_id') == '{{$item->id}}'
                @endif >
                {{$item->prefecture_name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="city" class="col-form-label text-md-left">市区町村</label>
        <div>
            <input type="text" name="city" value="{{old('city')}}" />
        </div>
    </div>

    <div class="form-group">
        <label for="address" class="col-form-label text-md-left">それ以降の住所</label>
        <div>
            <input type="text" name="address" value="{{old('address')}}" />
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-primary" type="submit">送信</button>
    </div>
</form>

@endsection
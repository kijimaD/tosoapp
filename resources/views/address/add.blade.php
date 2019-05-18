@extends('layouts.tosoapp')

@section('title','本登録')

@section('content')
<form action="/user/add" method="post">
    {{csrf_field()}}

    <div class="form-group">
        <label for="family_name" class="col-form-label text-md-left">姓</label>
        <div>
            <input type="text" name="family_name" value="{{old('family_name')}}" />
        </div>
    </div>

    <div class="form-group">
        <label for="name" class="col-form-label text-md-left">名</label>
        <div>
            <input type="text" name="name" value="{{old('name')}}" />
        </div>
    </div>

    <div class="form-group">
        <label for="email" class="col-form-label text-md-left">eメール</label>
        <div>
            <input type="text" name="email" value="{{old('email')}}" />
        </div>
    </div>

    <div class="form-group">
        <label for="password" class="col-form-label text-md-left">パスワード</label>
        <div>
            <input type="password" name="password" value="{{old('password')}}" />
        </div>
    </div>

    <div class="form-group">
        <label for="password_confirmation" class="col-form-label text-md-left">パスワード（確認）</label>
        <div>
            <input type="password" name="password_confirmation" />
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-primary" type="submit">送信</button>
    </div>
</form>

@endsection
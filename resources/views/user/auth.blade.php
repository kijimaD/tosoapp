@extends('layouts.tosoapp')

@section('title','本登録')

@section('content')
<form action="/user/auth" method="post">
    {{csrf_field()}}

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
        <button class="btn btn-primary" type="submit">送信</button>
    </div>
</form>

@endsection
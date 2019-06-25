@extends('layouts.tosoapp')

@section('title','ユーザー修正')

@section('content')
<form action="/user/edit" method="post">
    {{csrf_field()}}
    <input type="hidden" name="id" value="{{$form->id}}">

    <div class="form-group">
        <label for="name" class="col-form-label text-md-left">名前</label>
        <div>
            <input type="text" name="name" value="{{$form->name}}" />
        </div>
    </div>

    <div class="form-group">
        <label for="email" class="col-form-label text-md-left">eメール</label>
        <div>
            <input type="text" name="email" value="{{$form->email}}" />
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-primary" type="submit">送信</button>
    </div>
</form>

@endsection
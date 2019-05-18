@extends('layouts.tosoapp')

@section('title','コメント修正')

@section('content')
<form action="/user/edit" method="post">
    {{csrf_field()}}
    <input type="hidden" name="id" value="{{$form->id}}">
    <div class="form-group">
        <label for="family_name" class="col-form-label text-md-left">姓</label>
        <div>
            <input type="text" name="family_name" value="{{$form->family_name}}" />
        </div>
    </div>

    <div class="form-group">
        <label for="name" class="col-form-label text-md-left">名</label>
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
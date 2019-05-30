@extends('layouts.tosoapp_admin')

@section('title','明細入力')

@section('content')
<form action="/assessment/edit" method="post">
    {{csrf_field()}}

    <input type="hidden" name="id" value="{{$assessment->id}}" />
    {{$assessment->assessmentdetail->id}}
    @foreach($assessment->assessmentdetail as $obj)
        {{$obj->id}}
        <p>{{$obj->goods->title->isbn}}</p>
        {{-- <div class="form-group">
        <label for="isbn" class="col-form-label text-md-left">ISBN</label>
        <div>
            <input type="text" name="isbn" value="{{$assessmentdetail->id}}" />
        </div>
        </div> --}}

        {{-- <div class="form-group">
        <label for="title_name" class="col-form-label text-md-left">タイトル</label>
        <div>
            <input type="text" name="title_name" value="{{$assessmentdetail->goods->title->title_name}}" />
        </div>
        </div> --}}
        @endforeach

        <div class="form-group">
            <button class="btn btn-primary" type="submit">送信</button>
        </div>
</form>

@endsection
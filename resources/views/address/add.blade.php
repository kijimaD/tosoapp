@extends('layouts.tosoapp')

@section('title','アドレス帳登録')

@section('content')
<form action="/address/add" method="post">
    {{csrf_field()}}
    {{session()->put(['user_id'=>$user->id])}}

    <div class="form-group">
        <label for="zip" class="col-form-label text-md-left">郵便番号</label>
        <div>
            <input type="text" name="zip" class="@error('zip') is invalid @enderror" value="{{old('zip')}}" required autocomplete="zip" autofocus/>

            @error('bank_branch')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            @if($errors->has('zip'))
                {{-- デザインがよくない --}}
                <strong>{{$errors->first('zip')}}</strong>
                @endif
        </div>
    </div>

    <div class="form-group">
        <label for="prefecture_id" class="cl-form-label text-md-left">都道府県</label>
        <div>
            <select name="prefecture_id" class="@error('prefecture_id') is invalid @enderror" required autocomplete="prefecture_id" autofocus>
            <option value="" selected disabled></option>
            @foreach ($items as $item)
            <option value="{{$item->id}}" @if('prefecture_id') == '{{$item->id}}'

            @if(old('prefecture_id') == $item->id)
            selected
            @endif

            @endif >
            {{$item->prefecture_name}}</option>
            @endforeach
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="city" class="col-form-label text-md-left">市区町村</label>
        <div>
            <input type="text" name="city" class="@error('city') is invalid @enderror" value="{{old('city')}}" required autocomplete="city" autofocus />

            @error('city')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label for="address" class="col-form-label text-md-left">それ以降の住所</label>
        <div>
            <input type="text" name="address" class="@error('address') is invalid @enderror" value="{{old('address')}}" required autocomplete="address" autofocus />

            @error('address')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-primary" type="submit">送信</button>
    </div>
</form>

@endsection
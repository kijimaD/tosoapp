@extends('layouts.tosoapp')

@section('title','口座登録')

@section('content')
<form action="/bank/add" method="post">
    {{csrf_field()}}
    {{session()->put(['user_id'=>$user->id])}}

    <div class="form-group">
        <label for="bank_name" class="col-form-label text-md-left">銀行名</label>
        <div>
            <input type="text" name="bank_name" class="@error('bank_name') is invalid @enderror" value="{{old('bank_name')}}" required autocomplete="bank_name" autofocus />
        </div>

        @error('bank_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="bank_branch" class="col-form-label text-md-left">支店名</label>
        <div>
            <input type="text" name="bank_branch" class=" @error('bank_branch') is invalid @enderror" value="{{old('bank_branch')}}" required autocomplete="bank_branch" autofocus />

            @error('bank_branch')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label for="bank_type" class="col-form-label text-md-left">口座種別</label>
        <div>
            {{-- {{基本的にエラーが起きない部分なので、リクエストバリデーションはしているがbootstrap側でのバリデーションは行わない。エラー表示も行わない。}} --}}
            <input type="radio" name="bank_type" value="普通" @if(old('bank_type') == '普通') checked
            @endif checked/>普通
            <input type="radio" name="bank_type" value="当座" @if(old('bank_type') == '当座') checked
            @endif />当座
        </div>
    </div>

    <div class="form-group">
        <label for="bank_num" class="col-form-label text-md-left">口座番号</label>
        <div>
            <input type="text" name="bank_num" class="@error('bank_num') is invalid @enderror" value="{{old('bank_num')}}" required autocomplete="bank_num" autofocus />

            {{-- @error('bank_num')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror --}}

            {{-- 注意:bootstrapのバリデーションに数字がない？ので、リクエストバリデーションでフィードバックしている。 --}}

            @if($errors->has('bank_num'))
                {{-- デザインがよくない --}}
                <strong>{{$errors->first('bank_num')}}</strong>
                @endif
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-primary" type="submit">送信</button>
    </div>
</form>

@endsection
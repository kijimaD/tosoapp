@extends('layouts.tosoapp_admin')

@section('title','口座登録')

@section('content')
<form action="/bank/add" method="post">
    {{csrf_field()}}

    <div class="form-group">
        <label for="bank_name" class="col-form-label text-md-left">銀行名</label>
        <div>
            <input type="text" name="bank_name" value="{{old('bank_name')}}" />
        </div>
    </div>

    <div class="form-group">
        <label for="bank_branch" class="col-form-label text-md-left">支店名</label>
        <div>
            <input type="text" name="bank_branch" value="{{old('bank_branch')}}" />
        </div>
    </div>

    <div class="form-group">
        <label for="bank_type" class="col-form-label text-md-left">口座種別</label>
        <div>
            <input type="text" name="bank_type" value="{{old('bank_type')}}" />
        </div>
    </div>

    <div class="form-group">
        <label for="bank_num" class="col-form-label text-md-left">口座番号</label>
        <div>
            <input type="text" name="bank_num" value="{{old('bank_num')}}" />
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-primary" type="submit">送信</button>
    </div>
</form>

@endsection
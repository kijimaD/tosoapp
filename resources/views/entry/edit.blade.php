@extends('layouts.tosoapp_admin')

@section('title','案件修正')

@section('content')
<form action="/bank/edit" method="post">
    {{csrf_field()}}
    {{session()->put(['entry_id'=>$form->id])}}

    <div class="form-group">
        <label for="bank_name" class="col-form-label text-md-left">銀行名</label>
        <div>
            <input type="text" name="bank_name" value="{{$form->bank_name}}" />
        </div>
    </div>

    <div class="form-group">
        <label for="bank_branch" class="cl-form-label text-md-left">支店名</label>
        <div>
            <input type="text" name="bank_branch" value="{{$form->bank_branch}}" />
        </div>
    </div>

    <div class="form-group">
        <label for="bank_type" class="col-form-label text-md-left">口座種別</label>
        <div>
            <input type="text" name="bank_type" value="{{$form->bank_type}}" />
        </div>
    </div>

    <div class="form-group">
        <label for="bank_num" class="col-form-label text-md-left">口座種別</label>
        <div>
            <input type="text" name="bank_num" value="{{$form->bank_num}}" />
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-primary" type="submit">送信</button>
    </div>
</form>

@endsection
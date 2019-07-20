@extends('layouts.tosoapp')

@section('title','口座削除')

@section('content')
<form action="/bank/del" method="post">
    {{csrf_field()}}
    {{session()->put(['id'=>$form->id])}}

    <div class="form-group">
        <label for="bank_name" class="col-form-label text-md-left">銀行名</label>
        <div>
            <input type="text" name="bank_name" value="{{$form->bank_name}}" disabled="disabled" />
        </div>
    </div>

    <div class="form-group">
        <label for="bank_branch" class="cl-form-label text-md-left">支店名</label>
        <div>
            <input type="text" name="bank_branch" value="{{$form->bank_branch}}" disabled="disabled" />
        </div>
    </div>

    <div class="form-group">
        <label for="bank_type" class="col-form-label text-md-left">口座種別</label>
        <div>
            <input type="text" name="bank_type" value="{{$form->bank_type}}" disabled="disabled" />
        </div>
    </div>

    <div class="form-group">
        <label for="bank_num" class="col-form-label text-md-left">口座種別</label>
        <div>
            <input type="text" name="bank_num" value="{{$form->bank_num}}" disabled="disabled" />
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-primary" type="submit">消去</button>
    </div>
</form>

@endsection
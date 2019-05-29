@extends('layouts.tosoapp_admin')

@section('title','修正')

@section('content')
<form action="/assessment/edit" method="post">
    {{csrf_field()}}

    <input type="hidden" name="id" value="{{$form->id}}" />

    <div class="form-group">
        <label for="cost" class="col-form-label text-md-left">送料費用</label>
        <div>
            <input type="text" name="cost" value="{{$form->shippingcost->cost}}" />
        </div>
    </div>

    <div class="form-group">
        <label for="apply_cost" class="cl-form-label text-md-left">適用送料</label>
        <div>
            <input type="text" name="apply_cost" value="{{$form->shippingcost->apply_cost}}" />
        </div>
    </div>

    <div class="form-group">
        <label for="shippingcost_type" class="col-form-label text-md-left">送料区分</label>
        <div>
            <input type="text" name="shippingcost_type" value="{{$form->shippingcost->shippingcost_type}}" />
        </div>
    </div>

    <div class="form-group">
        <label for="coupen_id" class="col-form-label text-md-left">クーポン選択</label>
        <div>
            <input type="text" name="coupen_id" value="{{$form->coupen_id}}" />
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-primary" type="submit">送信</button>
    </div>
</form>

@endsection
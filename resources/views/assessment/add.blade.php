@extends('layouts.tosoapp_admin')

@section('title','口座登録')

@section('content')
<form action="/assessment/add" method="post">
    {{csrf_field()}}

    <input type="hidden" name="entry_id" value="{{$entry_id}}">

    <div class="form-group">
        <label for="cost" class="col-form-label text-md-left">送料費用</label>
        <div>
            <input type="num" name="cost" value="{{old('cost')}}" />
        </div>
    </div>

    <div class="form-group">
        <label for="apply_cost" class="col-form-label text-md-left">適用送料</label>
        <div>
            <input type="text" name="apply_cost" value="{{old('apply_cost')}}" />
        </div>
    </div>

    <div class="form-group">
        <label for="shippingcost_type" class="col-form-label text-md-left">送料区分</label>
        <div>
            <select class="form-control" name="shippingcost_type">
                <option value="20冊以上で無料">20冊以上で無料</option>
                <option value="適用なし">適用なし</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="coupen_id" class="col-form-label text-md-left">クーポン選択</label>
        <div>
            <select class="form-control" name="coupen_id">
                @foreach ($coupens as $coupen)
                <option value="{{$coupen->id}}">{{$coupen->coupen_name}}(x{{$coupen->coupen_value}})</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-primary" type="submit">送信</button>
    </div>
</form>

@endsection
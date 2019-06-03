@extends('layouts.tosoapp')

@section('title','アドレス帳')

@section('content')
<p><a href="/address/add">新規追加</a></p>

<div class="row">
    @foreach ($items as $item)
    <div class="card col-sm-3 mx-3" style="width: 18rem;">
        <div class="card-header bg-white">
            <h5 class="card-title">{{$item->user->family_name}}{{$item->user->name}}</h5>
            <a href="/address/edit?id={{$item->id}}">修正</a>
            <a href="/address/del?id={{$item->id}}">消去</a>
        </div>
        <div class="card-body">
            <p class="card-text">
                〒{{$item->zip}}<br>
                {{$item->prefecture->prefecture_name}}<br>
                {{$item->city}}<br>
                {{$item->address}}<br>
            </p>
        </div>
        <div class="card-footer bg-white">
            @if (isset($item->useraddress->id))
            既定の住所
            @else
            <form action="/address/default/add" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="addressBook_id" value="{{$item->id}}" />
                <input type="hidden" name="user_id" value="{{$user->id}}" />
                <input type="submit" value="既定にする" class="btn btn-outline-dark" />

            </form>
            @endif
        </div>
    </div>
    @endforeach
</div>

</div>


@endsection
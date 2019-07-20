@extends('layouts.tosoapp')

@section('title','入金口座')

@section('content')

<div class="container">
    <div class="row">
        <div class="card col-sm-3 mr-3 mb-3" style="width: 18rem;">
            <div class="card-header bg-white">
                <h5><a href="/bank/add">新規作成</a></h5>
            </div>
        </div>
        @foreach ($items as $item)
        <div class="card col-sm-3 mr-3 mb-3" style="width: 18rem;">
            <div class="card-header bg-white">
                {{-- <h5 class="card-title">{{$item->user->name}}</h5> --}}
                <div>
                    <a class="btn btn-outline-dark btn-sm" href="/bank/edit?id={{Crypt::encrypt('bank_id' . $item->id)}}">修正</a>
                    <a class="btn btn-outline-dark btn-sm" href="/bank/del?id={{Crypt::encrypt('bank_id' . $item->id)}}">削除</a>
                </div>
            </div>
            <div class="card-body">
                <p class="card-text">
                    {{$item->bank_name}}<br>
                    {{$item->bank_branch}}<br>
                    {{$item->bank_type}}<br>
                    {{$item->bank_num}}<br>
                </p>
            </div>
            <div class="card-footer bg-white">
                @if (isset($item->defaultbank->id))
                <p class="text-success">既定の口座</p>
                @else
                <form action="/bank/default/add" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{Crypt::encrypt('bank_id' . $item->id)}}">
                    <input type="submit" value="既定にする" class="btn btn-outline-dark" />
                </form>
                @endif
            </div>
        </div>
        @endforeach
    </div>
    <div>
        <a class="btn btn-secondary btn-block" href="/user/mypage" role="button">マイページに戻る</a>
    </div>
</div>




@endsection
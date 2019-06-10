@extends('layouts.tosoapp')

@section('title',' 履歴一覧')

@section('content')
<a href="/entry/add">新規追加</a>
<div class="container">
    <div class="row">
        @foreach ($items as $item)
        <div class="card col-sm-12 mr-3 mb-3" style="width: 18rem;">
            <div class="card-header bg-white">
                {{-- <h5 class="card-title">{{$item->user->family_name}}{{$item->user->name}}</h5> --}}
                <div>
                    送信日時:{{$item->created_at}}<br>
                    受け渡し方法:{{$item->shippingway->shipping_way}}/集荷先:
                </div>
            </div>
            <div class="card-body">
                <p class="card-text">
                    買取数:　点<br>
                    入金額合計:　円<br>
                    入金方法:{{$item->paymentway->payment_way}}<br>
                    @if(isset($item->assessmentdone->id) && empty($item->approvedone->id))
                        <a href="/approve/add?id={{$item->assessment->id}}">査定承認画面</a>
                        @endif
                </p>
            </div>
            <div class="card-footer bg-white">

            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
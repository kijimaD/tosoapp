@extends('layouts.tosoapp')

@section('title',' 履歴一覧')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($items as $item)
        <div class="card col-sm-12 mr-3 mb-3" style="width: 18rem;">
            <div class="card-header bg-white">
                {{-- <h5 class="card-title">{{$item->user->name}}</h5> --}}
                <div>
                    申込日時:{{$item->created_at}}<br>
                    渡し方法:{{$item->shippingway->shipping_way}}
                </div>
            </div>
            <div class="card-body">
                <p class="card-text">
                    @if(isset($item->approvedone->id))
                        買取数 {{$item->assessment->goods_count}}点<br>
                        入金額 ￥{{$item->assessment->sum_price}}<br>
                        入金方法 {{$item->paymentway->payment_way}}<br>
                        @endif
                        @if(isset($item->assessmentdone->id) && empty($item->approvedone->id))
                            <a href="/approve/add?id={{Crypt::encrypt('assessment_id' . $item->assessment->id)}}">査定承認画面</a>
                            @endif
                </p>
            </div>
            {{-- <div class="card-footer bg-white">

            </div> --}}
        </div>
        @endforeach
    </div>
</div>

@endsection
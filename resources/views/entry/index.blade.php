@extends('layouts.tosoapp')

@section('title',' 履歴一覧')

@section('content')

<div class="container">
    <div class="row">
        @foreach ($items as $item)
        <div class="card col-sm-12 mr-3 mb-3">
            <div class="card-header bg-white">
                {{-- <h5 class="card-title">{{$item->user->name}}</h5> --}}
                <div>
                    @if(empty($item->assessmentdone->id) && empty($item->approvedone->id) && empty($item->cancel->id) && isset($item->id))
                        <form action="/entry/cancel_create?id={{Crypt::encrypt('entry_id' . $item->id)}}" method="post">
                            {{csrf_field()}}
                            <input type="submit" value="キャンセル" class="btn btn-outline-danger float-right">
                        </form>
                        {{-- <a class="btn btn-outline-danger float-right" href="/entry/cancel_create?id={{Crypt::encrypt('entry_id' . $item->id)}}" role="button">キャンセル</a> --}}
                        @endif
                        申込日時:{{$item->created_at}}<br>
                        渡し方法:{{$item->shippingway->shipping_way}}
                </div>
            </div>
            <div class="card-body">
                <p class="card-text">

                    {{-- 3.了承確認が完了しているとき --}}
                    @if(isset($item->approvedone->id))
                        <p>
                            買取数 {{$item->assessment->goods_count}}点<br>
                            入金額 ￥{{$item->assessment->sum_price}}<br>
                            入金方法 {{$item->paymentway->payment_way}}<br>
                        </p>

                        {{-- 2.査定が完了しているとき --}}
                        @elseif(isset($item->assessmentdone->id) && empty($item->approvedone->id))
                            <p>
                                <a href="/approve/add?id={{Crypt::encrypt('assessment_id' . $item->assessment->id)}}">査定承認画面</a>
                            </p>

                            @elseif(isset($item->cancel->id))
                                <p class="text-danger">キャンセル済みです。</p>
                                {{-- 1.申し込みが完了しているとき（最初） --}}
                                @elseif(isset($item->id))
                                    <p>申込が完了しました。</p>
                                    @if($item->shippingway->id == 1)
                                        <p>
                                            <li>集荷予定日:{{$item->applygoods->collection->collection_day}}</li>
                                            <li>集荷時間帯:{{$item->applygoods->collection->collection_time}}</li>
                                            <li>箱数:{{$item->applygoods->collection->box_num}}</li>
                                        </p>
                                        @if(isset($item->applydone->id))
                                            <p class="text-success">運送会社への集荷委託が完了しました。</p>
                                            @else
                                            <p class="text-danger">※集荷内容は確定していません。少しお待ちください。</p>
                                            @endif {{-- applydoneがあるか --}}
                                            @endif {{-- shippingway_idが1 --}}
                                            @endif {{-- entryにidがあるか --}}
            </div>
            {{-- <div class="card-footer bg-white">

            </div> --}}
        </div>
        @endforeach
    </div>
    <div>
        <a class="btn btn-outline-secondary btn-block" href="/user/mypage" role="button">マイページに戻る</a>
    </div>
</div>

@endsection
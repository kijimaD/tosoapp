@extends('layouts.tosoapp_admin')

@section('title','入金ビュー')

@section('content')
<div class="table-responsive">
    <table class="table table-striped table-bordered table-sm">
        <thead>
            <tr>
                <th>案件ID</th>
                <th>入金額</th>
                <th>入金方法</th>
                <th>メールアドレス</th>
                <th>口座情報</th>
                <th>完了</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>￥{{$item->assessment->sum_price}}</td>
                <td>{{$item->paymentway->payment_way}}</td>
                @if($item->paymentway->id =='2')
                    <td>{{$item->user->email}}</td>
                    @else
                    <td></td>
                    @endif

                    @if($item->paymentway->id == '1')
                        <td>{{$item->paymentbank->bank->bank_name}}{{$item->paymentbank->bank->bank_branch}}{{$item->paymentbank->bank->bank_type}}{{$item->paymentbank->bank->bank_num}}</td>
                        @else
                        <td></td>
                        @endif

                        @if (isset($item->paymentdone->id))
                        <td class="text-success">入金完了({{$item->paymentdone->created_at}})</td>
                        @elseif(isset($item->assessmentdone->id))
                            <form action="/paymentdone/add" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{Crypt::encrypt('entry_id' . $item->id)}}">
                                <td><input type="submit" value="入金が完了した" /></td>
                            </form>
                            @else
                            <td>未査定</td>
                            @endif

                            {{-- <td><a href="/address/edit?id={{$item->id}}">修正</a></td>
                            <td><a href="/address/del?id={{$item->id}}">消去</a></td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
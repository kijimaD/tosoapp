@extends('layouts.tosoapp_admin')

@section('title',' 統合ステータスビュー')

@section('content')
<div class="table-responsive">
    <table class="table table-striped table-bordered table-sm">
        <thead>
            <tr>
                <th><a href="">案件ID</a></th>
                <th><a href="">ユーザID</a></th>
                <th><a href="">集荷委託</a></th>
                <th><a href="">査定送信</a></th>
                <th><a href="">了承</a></th>
                <th><a href="">入金</a></th>
                <th><a href="">キャンセル</a></th>
                <th><a href="">申請時刻</a></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->user_id}}</td>

                @if (isset($item->applydone->id))
                <td class="text-success">完了</td>
                @elseif($item->shippingway->id != '1')
                    <td class="text-success">自動完了</td>
                    @else
                    <td class="text-danger">未</td>
                    @endif

                    @if (isset($item->assessmentdone->id))
                    <td class="text-success">完了</td>
                    @else
                    <td class="text-danger">未</td>
                    @endif

                    @if (isset($item->approvedone->id))
                    <td class="text-success">完了</td>
                    @else
                    <td class="text-danger">未</td>
                    @endif

                    @if (isset($item->paymentdone->id))
                    <td class="text-success">完了</td>
                    @else
                    <td class="text-danger">未</td>
                    @endif

                    @if (isset($item->cancel->id))
                    <td class="text-danger">キャンセル</td>
                    @else
                    <td class="text-success">アクティブ</td>
                    @endif

                    <td>{{$item->created_at}}</td>

                    {{-- <td><a href="/entry/edit?id={{$item->id}}">修正</a></td>
                    <td><a href="/entry/del?id={{$item->id}}">消去</a></td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
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
                <th><a href="">査定</a></th>
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
                <td>完了</td>
                @else
                <td>未</td>
                @endif

                @if (isset($item->assessment->id))
                <td>査定着手</td>
                @else
                <td><a href="/assessment/add?entry_id={{$item->id}}">査定</a></td>
                @endif

                @if (isset($item->assessmentdone->id))
                <td>査定送信完了</td>
                @else
                <td class="text-danger">査定未送信</td>
                @endif

                @if (isset($item->approvedone->id))
                <td>完了</td>
                @else
                <td>未</td>
                @endif

                @if (isset($item->paymentdone->id))
                <td>完了</td>
                @else
                <td>未</td>
                @endif

                @if (isset($item->cancel->id))
                <td>キャンセル</td>
                @else
                <td>アクティブ</td>
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
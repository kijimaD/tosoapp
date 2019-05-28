@extends('layouts.tosoapp_admin')

@section('title','査定一覧')

@section('content')
<p><a href="/assessment/add">追加</a></p>
<div class="table-responsive">
    <table class="table table-striped table-bordered table-sm">
        <thead>
            <tr>
                <th>査定ID</th>
                <th>案件ID</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->entry->id}}</td>
                {{-- <td><a href="/address/edit?id={{$item->id}}">修正</a></td>
                <td><a href="/address/del?id={{$item->id}}">消去</a></td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
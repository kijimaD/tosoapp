@extends('layouts.tosoapp_admin')

@section('title','入庫商品一覧')

@section('content')

<div class="table-responsive">
    <table class="table table-striped table-bordered table-sm">
        <thead>
            <tr>
                <th>ISBN</th>
                <th>タイトル</th>
                <th>状態</th>
                <th>倉庫名</th>
                <th>棚番号</th>
                <th>板番号</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            <tr>
                <td>{{$item->goods->title->isbn}}</td>
                <td>{{$item->goods->title->title_name}}</td>
                <td>{{$item->goods->description}}</td>
                <td>{{$item->storagestructure->warehouse->name}}</td>
                <td>{{$item->storagestructure->rack->name}}</td>
                <td>{{$item->storagestructure->stage->name}}</td>
                <td>
                    {{-- @if(isset($item->approvegoods->id))
                        <span class="text-success">了承</span>
                        @endif
                        @if(isset($item->resendgoods->id))
                            <span class="text-danger">返送</span>
                            @endif --}}
                </td>
                {{-- <td><a href="/assessment/edit?id={{$item->id}}">修正</a></td>
                <td><a href="/assessment/del?id={{$item->id}}">消去</a></td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
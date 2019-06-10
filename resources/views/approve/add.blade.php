@extends('layouts.tosoapp')

@section('title','承認画面')

@section('content')
<form action="/approve/add" method="post">
    {{csrf_field()}}

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-sm">
            <thead>
                <tr>
                    <th>番号</th>
                    <th>ISBN</th>
                    <th>タイトル</th>
                    <th>コンディションID</th>
                    <th>買取価格</th>
                    <th>了承</th>
                    <th>返送</th>
                </tr>
            </thead>
            <tbody>
                <?php $i='0' ?>
                @foreach ($items as $item)
                <input type="hidden" name="assessmentdetail_id[]" value="{{$item->id}}" />
                <tr>
                    <td>{{$i + '1'}}</td>
                    <td>{{$item->goods->title->isbn}}</td>
                    <td>{{$item->goods->title->title_name}}</td>
                    <td>{{$item->goods->condition->condition_code}}</td>
                    <td>￥{{$item->goods->get_price}}</td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="approve[{{$i}}]" id="approve_yes{{$i}}" value="yes" checked />
                            <label class="form-check-label" for="approve_yes{{$i}}"></label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="approve[{{$i}}]" id="approve_no{{$i}}" value="no" />
                            <label class="form-check-label" for="approve_no{{$i}}"></label>
                        </div>
                    </td>
                </tr>
                <?php $i++ ?>
                @endforeach
                <tr>
                    <td><b>合計</b></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><b>￥{{$sum_get_price}}</b></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="form-group">
        <button class="btn btn-primary" type="submit">送信</button>
    </div>
</form>

@endsection
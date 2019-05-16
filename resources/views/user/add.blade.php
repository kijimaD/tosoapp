@extends('layouts.tenjiapp')

@section('title','コメント追加')

@section('content')
<table>
    <form action="/customer/add" method="post">
        {{csrf_field()}}
        <!-- <tr><th>性別</th><td><input type="text" name="sex"/></td></tr> -->
        <tr>
            <th>性別</th>
            <td>
                <select name="sex">
                    <option value="男">男</option>
                    <option value="女">女</option>
                </select></td>
        </tr>
        <!-- <tr><th>年齢</th><td><input type="text" name="age"/></td></tr> -->
        <tr>
            <th>年齢</th>
            <td>
                <select name="age">
                    <option value="10代">10代</option>
                    <option value="20代">20代</option>
                    <option value="30代">30代</option>
                    <option value="40代">40代</option>
                    <option value="50代">50代</option>
                    <option value="60代">60代</option>
                    <option value="70以上">70代以上</option>
                </select></td>
        </tr>
        <tr>
            <th>職業</th>
            <td><input type="text" name="employment" /></td>
        </tr>
        <tr>
            <th>どこで知った</th>
            <td>
                <select name="info_route">
                    <option value="ポスター">ポスター</option>
                    <option value="通りがかり">通りがかり</option>
                    <option value="部員">部員</option>
                    <option value="看板">看板</option>
                </select></td>
        </tr>
        <tr>
            <th>メモ</th>
            <td><input type="text" name="memo" /></td>
        </tr>
        <tr>
            <th>全体コメント</th>
            <td><textarea name="whole_comment" raws="3" cols="20">{{old('whole_comment')}}</textarea></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" value="send" /></td>
        </tr>
    </form>
</table>
@endsection
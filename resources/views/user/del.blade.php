@extends('layouts.tenjiapp')

@section('title','コメント削除')

@section('content')
  <table>
    <form action="/customer/del" method="post">
      {{ csrf_field() }}
      <input type="hidden" name="CustomerID" value = "{{$form->CustomerID}}" />
      <tr><th>性別</th><td><input type="text" name="sex" value="{{$form->sex}}"/></td></tr>
      <tr><th>年齢</th><td><input type="text" name="age" value="{{$form->age}}"/></td></tr>
      <tr><th>職業</th><td><input type="text" name="employment" value="{{$form->employment}}"/></td></tr>
      <tr><th>どこで知った</th><td><input type="text" name="info_route" value="{{$form->info_route}}"/></td></tr>
      <tr><th></th><td><input type="submit" value="削除"/></td></tr>
    </form>
  </table>
@endsection

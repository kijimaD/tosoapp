@extends('layouts.tosoapp_admin')

@section('title','口座登録')

@section('content')

<script>
    function addList(obj) {
  // tbody要素に指定したIDを取得し、変数「tbody」に代入
  var tbody = document.getElementById('sub_table');
  // objの親の親のノードを取得し（つまりtr要素）、変数「tr」に代入
  var tr = obj.parentNode.parentNode;
  // tbodyタグ直下のノード（行）を複製し、変数「list」に代入
  var list = tbody.childNodes[0].cloneNode(true);
  // 複製した行の2番目のセルを指定し、変数「td」に代入
  var td = list.childNodes[1];
  // 複製した行の2番目のセルの内容を「A」に置き換え

  //　複製したノード「list」を直後の兄弟ノードの上に挿入
  // （「tr」の下に挿入）
  tbody.insertBefore(list, tr.nextSibling);
}
function removeList(obj) {
  // tbody要素に指定したIDを取得し、変数「tbody」に代入
  var tbody = document.getElementById('sub_table');
  // objの親の親のノードを取得し（つまりtr要素）、変数「tr」に代入
  var tr = obj.parentNode.parentNode;
  // 「tbody」の子ノード「tr」を削除
  tbody.removeChild(tr);
}
function addarea(){
  $('#addarea').append('<div class="form-group form-inline"><div class=""><input type="text" name="isbn[]" /></div><div class=""><input type="text" name="title[]" /></div><div class=""><button type="button" class="btn btn-outline-primary" onclick="addarea();">＋</button></div><div class=""><button type="button" class="btn btn-outline-primary" onclick="removearea(this);">－</button></div></div>')
}

// function addarea(){
//   $('#addarea').append('
//   <div class="form-group form-inline"><div class="">
//   <select name="ProductID[]">
//   @foreach ($items as $item)
//   <option value="{{$item->ProductID}}">{{$item->ProductID}}:{{$item->product_name}}</option>
//   @endforeach</select></div>
//   <div class=""><input type="text" name="comment[]" /></div>
//   <div class=""><input type="text" name="comment[]" /></div>
//   <div class=""><input type="text" name="comment[]" /></div>
//   <div class=""><input type="text" name="comment[]" /></div>
//   <div class=""><input type="text" name="comment[]" /></div>
//   <div class=""><button type="button" class="btn btn-outline-primary" onclick="addarea();">＋</button></div>
//   <div class=""><button type="button" class="btn btn-outline-primary" onclick="removearea(this);">－</button></div></div>
//   ')
// }

function removearea(obj){
  var tbody = document.getElementById('addarea');
  var grand = obj.parentNode.parentNode;
  tbody.removeChild(grand);
}
</script>

<form action="/assessment/add" method="post">
    {{csrf_field()}}
    {{session()->put(['entry_id'=>$entry_id])}}

    <div class="form-group">
        <label for="cost" class="col-form-label text-md-left">送料費用</label>
        <div>
            <input type="num" name="cost" value="{{old('cost')}}" />
        </div>
    </div>

    <div class="form-group">
        <label for="apply_cost" class="col-form-label text-md-left">適用送料</label>
        <div>
            <input type="text" name="apply_cost" value="{{old('apply_cost')}}" />
        </div>
    </div>

    <div class="form-group">
        <label for="shippingcost_type" class="col-form-label text-md-left">送料区分</label>
        <div>
            <select class="form-control" name="shippingcost_type">
                <option value="20冊以上で無料">20冊以上で無料</option>
                <option value="適用なし">適用なし</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="coupen_id" class="col-form-label text-md-left">クーポン選択</label>
        <div>
            <select class="form-control" name="coupen_id">
                @foreach ($coupens as $coupen)
                <option value="{{$coupen->id}}">{{$coupen->coupen_name}}(x{{$coupen->coupen_value}})</option>
                @endforeach
            </select>
        </div>
    </div>

    <hr>

    <!--▼サブテーブル▼-->
    <div id="addarea" class="">
        <div class="form-group form-inline">

            <div class="">
                <label for="isbn[]" class="col-form-label text-md-left">ISBN</label>
                <input type="text" name="isbn[]" />
            </div>

            <div class="">
                <label for="title_name[]" class="col-form-label text-md-left">タイトル</label>
                <input type="text" name="title[]" />
            </div>

            <div class="">
                <label class="col-form-label text-md-left">追加</label>
                <button type="button" class="btn btn-outline-primary" onclick="addarea();">＋</button>
            </div>
            <div class="">
                <label class="col-form-label text-md-left">削除</label>
                <button type="button" class="btn btn-outline-primary" onclick="removearea(this);">－</button>
            </div>
        </div>
    </div>
    <!--▲サブテーブル▲-->

    <div class="form-group">
        <button class="btn btn-primary" type="submit">送信</button>
    </div>
</form>

@endsection
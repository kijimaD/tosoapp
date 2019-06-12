@extends('layouts.tosoapp')

@section('title','承認画面')

@section('content')
<script>
    function total(){
      var prices = [];
      var total;
      <?php $j=0;?>
      @foreach($items as $item)
       if(document.forms.approve.approve_yes{{$j}}.checked){
        prices.push({{$item->goods->get_price}});
      }else{
        prices.push(0);
      }
      <?php $j++;?>
      @endforeach

      total = prices.reduce((a,x) => a+=x,0);
      $(".total").text(total);

      coupen_total = parseInt(total * {{$info->coupen->coupen_value}});
      $(".coupen_total").text(coupen_total);

      final_total = coupen_total + {{$info->shippingcost->apply_cost}};
      $(".final_total").text(final_total);
      $('.sum_price').val(final_total);
}

window.onload = function(){
total();
}
</script>

<form action="/approve/add" method="post" id="approve">
    {{csrf_field()}}
    <input type="hidden" name="assessment_id" value="{{$assessment_id}}">
    <input type="hidden" name="sum_price" class="sum_price">

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-sm">
            <thead>
                <tr>
                    <th>番号</th>
                    <th>ISBN</th>
                    <th>タイトル</th>
                    <th>ランク</th>
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
                            <input class="form-check-input" type="radio" name="approve[{{$i}}]" id="approve_yes{{$i}}" value="yes" onChange="total()" checked />
                            <label class="form-check-label" for="approve_yes{{$i}}"></label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="approve[{{$i}}]" id="approve_no{{$i}}" value="no" onChange="total()" />
                            <label class="form-check-label" for="approve_no{{$i}}"></label>
                        </div>
                    </td>
                </tr>
                <?php $i++ ?>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><b>小計</b></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>￥<b class="total"></b></td>
                </tr>
                <tr>
                    <td>クーポン適用</td>
                    <td></td>
                    <td></td>
                    <td>{{$info->coupen->coupen_name}}</td>
                    <td>￥<span class="
                          coupen_total"></span></td>
                </tr>
                <tr>
                    <td>送料</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>-￥{{$info->shippingcost->apply_cost}}</td>
                </tr>
                <tr>
                    <td><b>合計</b></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>￥<b><span class="final_total text-success"><b></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="form-group">
        <button class="btn btn-primary" type="submit">送信</button>
    </div>
</form>

@endsection
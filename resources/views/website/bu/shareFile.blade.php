
@if(count($bu) > 0)


@foreach($bu as $key=>$b)

@if($key % 3 ==0 && $key !=0)
  <div class="clearfix">

  </div>
@endif

  <div class="col-md-4 pull-right">
    <div class="productbox">
      <img src="{{checkIfImageIsexist($b->image,'/public/website/thumb/','/website/thumb/')}}" class="img-responsive">
      <div class="producttitle">{{$b->bu_name}}</div>
      <p class="text-justify dis">{{str_limit($b->bu_small_dis,70) }} </p>
      <div class="productprice">
        <span class="pull-right">
          المساحة:
          {{$b->bu_square}}
          متر
        </span>
        <span class="pull-left">
           نوع العملة:
          {{bu_rent()[$b->bu_rent] }}

        </span>
        <span class="pull-right">
      نوع العقار:
          {{bu_type()[$b->bu_type]}}

        </span>
        <span class="pull-left">
          المكان:
        {{bu_place()[$b->bu_place]}}

        </span>
<div class="clearfix">

</div>
        <hr>
        <div class="pull-left">
          @if($b->bu_status == 0)
           <span class="btn btn-danger btm-sm" role="button">في انتظار التفعيل <span class="fa fa-arrow-circle-o-right" style="color:#fff">  </span></span>
           <a href="{{url('user/edit/building/'.$b->id)}}" class="btn btn-warning btm-sm"> تعديل العقار</a>
          @else
           <a href="{{ url('/singleBuilding/'.$b->id) }}" class="btn btn-primary btm-sm" role="button">اظهر التفاصيل
           <span class="fa fa-arrow-circle-o-right" style="color:#fff">
           </span>
         </a>

         @endif
       </div>
       <div class="pricetext">{{$b->bu_price}}
       </div>
     </div>
    </div>
  </div>

@endforeach

<div class="clearfix">
</div>
<br>
@else
<div class="alert alert-danger">
  لايوجد اي عقارات حالية
</div>
@endif

@extends('layouts.app')

@section('title')
اهلا بك زائرنا الكريم
@endsection

@section('header')
{!!Html::style('cus/css/select2.css') !!}

 <style>

    .banner{
      background: url("{{ checkIfImageIsexist(getSetting('mainslider'),'/public/website/slider/','/website/slider/') }}") no-repeat center;
    min-height: 500px;
    width: 100%;
    -webkit-background-size: 100%;
    -moz-background-size: 100%;
    -o-background-size: 100%;
    background-size: 100%;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    padding-bottom: 100px;
    }
 </style>
  <link rel="stylesheet" href="{{ Request::root() }}/main/css/reset.css"> <!-- CSS reset -->
 <link rel="stylesheet" href="{{ Request::root() }}/main/css/style.css"> <!-- Resource style -->
 	<script src="{{ Request::root() }}/main/js/modernizr.js"></script> <!-- Modernizr -->


@endsection

@section('content')

<div class="banner text-center">
  <div class="container">
    <div class="banner-info">
      <h1 style="color:#000">
        اهلا بك في
        {{getSetting()}}
      </h1>
      <p>
          {!! Form::open(['url'=>'search','method'=>'get']) !!}
            <div class="row">
              <div class="col-lg-3">
                {!! Form::text("bu_price_from",null,['class'=>'form-controller','placeholder'=>'سعر العقار من','style'=>'width:100%;height: 4%;']) !!}
              </div>
              <div class="col-lg-3">
                {!! Form::text("bu_price_to",null,['class'=>'form-controller','placeholder'=>'سعر العقار الي','style'=>'width:100%;height: 4%;']) !!}
              </div>

              <div class="col-lg-3">
                {!! Form::select("rooms",roomnumber(),null,['class'=>'form-controller select2','placeholder'=>'عدد الغرف','style'=>'width:100%;height: 4%;']) !!}
              </div>
              <div class="col-lg-3">
                {!! Form::select("bu_type",bu_type(),null,['class'=>'form-controller','placeholder'=>'نوع العقار','style'=>'width:100%;height: 4%;']) !!}
              </div>
           </div>
           <br>
           <div class="row">
             <div class="col-lg-3">
               {!! Form::submit("ابحث",['class'=>'btn btn-success' ,'style'=>'width:100%;height: 4%;']) !!}
             </div>
             <div class="col-lg-3">
               {!! Form::select("bu_place",bu_place(),null,['class'=>'form-controller select2','placeholder'=>'المنطقه','style'=>'width:100%']) !!}
             </div>
              <div class="col-lg-3">
                {!! Form::select("bu_rent",bu_rent(),null,['class'=>'form-controller','placeholder'=>'نوع العملية','style'=>'width:100%;height: 4%;']) !!}
              </div>
              <div class="col-lg-3">
                {!! Form::text("bu_square",null,['class'=>'form-controller','placeholder'=>'المساحة','style'=>'width:100%;height: 6%;']) !!}
              </div>

           </div>


            {!! Form::close() !!}

      </p>
      <a class="banner_btn" href="{{url('/user/create/building')}}">اضف عقارك مجانا</a> </div>
  </div>
</div>

<div class="main">
  <ul class="cd-items cd-container">

 @foreach(\App\BU::where('bu_status',1)->get() as $bu)
 		<li class="cd-item effect8">
 			<img src="{{checkIfImageIsexist($bu->image,'/public/website/thumb/','/website/thumb/')}}" alt="{{$bu->name}}" title="{{$bu->name}}">
 			<a href="#0" data-id="{{$bu->id}}" class="cd-trigger" title="{{$bu->name}}">نبذة سريعة</a>
 		</li> <!-- cd-item -->
 @endforeach
 	</ul> <!-- cd-items -->

 	<div class="cd-quick-view">
 		<div class="cd-slider-wrapper">
 			<ul class="cd-slider">
 				<li><img src="" alt="Product 1" class="imagebox"></li>
 			</ul> <!-- cd-slider -->
 		</div> <!-- cd-slider-wrapper -->

 		<div class="cd-item-info">
 			<h2 class="titlebox"></h2>
 			<p class="disbox"></p>

 			<ul class="cd-item-action">
 				<li><a href="" class="add-to-cart pricebox"></a></li>
 				<li><a href="" class="morebox">اقرأ المزيد</a></li>
 			</ul> <!-- cd-item-action -->
 		</div> <!-- cd-item-info -->
 		<a href="#0" class="cd-close">Close</a>
 	</div> <!-- cd-quick-view -->
</div>


@endsection
@section('footer')


<script src="{{ Request::root() }}/main/js/jquery-2.1.1.js"></script>
<script src="{{ Request::root() }}/main/js/velocity.min.js"></script>
<script>
  function urlHome(){
    return '{{Request::root()}}';
  }
  function noImageUrl(){
    return '{{getSetting('no_image')}}';
  }
</script>
<script src="{{ Request::root() }}/main/js/main.js"></script> <!-- Resource jQuery -->
{!!Html::script('cus/js/select2.js') !!}
<script type="text/javascript">
  $('.select2').select2({
    dir:'rtl',
  });

</script>

@endsection

@extends('layouts.app')

@section('title')
العقار
{{$buInfo->bu_name}}
@endsection

@section('header')

{!! Html::style('cus/buall.css') !!}
{!!Html::style('cus/css/select2.css') !!}

  <style>
  hr{
      margin-bottom: 10px;
        margin-top: 10px;
  }
    .dis{
      padding-bottom: 10px;
      margin-bottom: 10px;
    }
    .itemsearch{
      margin-bottom: 10px;
    }
    .breadcrumb{
      background-color: #ffffff;
    }
  </style>
@endsection

@section('content')


<div class="container">
    <div class="row profile">

      <div class="col-md-9">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">الرئيسيه</a></li>
              <li><a href="{{url('/showAll/Building')}}">كل العقارات</a></li>
              <li><a href="{{url('/singleBuilding/'.$buInfo->id)}}">{{$buInfo->bu_name}}</a></li>

              </ol>
            </nav>
                <div class="profile-content">
                   <h1>{{$buInfo->bu_name}}</h1>
                   <hr>
                   <div class="btn-group" role="group">

                    <a href="{{ url('/search?bu_square='.$buInfo->bu_square) }}" class="btn btn-default">
المساحة
:
{{$buInfo->bu_square}}
                   </a>
                    <a href="{{ url('/search?bu_price='.$buInfo->bu_price) }}" class="btn btn-default">
السعر
:
{{$buInfo->bu_price}}
                   </a>
                    <a href="{{ url('/search?bu_place='.$buInfo->bu_place) }}" class="btn btn-default">
المنطقه
:
{{bu_place()[$buInfo->bu_place]}}
                   </a>
                    <a href="{{ url('/search?rooms='.$buInfo->rooms) }}" class="btn btn-default">
عدد الغرف
:
{{$buInfo->rooms}}
                   </a>
                    <a href="{{ url('/search?bu_rent='.$buInfo->bu_rent) }}" class="btn btn-default">
نوع العملية
:
{{bu_rent()[$buInfo->bu_rent]}}
                   </a>
                    <a href="{{ url('/search?bu_type='.$buInfo->bu_type) }}" class="btn btn-default">
نوع العقار
:
{{bu_type()[$buInfo->bu_type]}}
                   </a>
                   <div class="clearfix">

                   </div>
                   <br>
                   <!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e371bc4fcb9cdc9"></script>


                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <div class="addthis_inline_share_toolbox_a6qi"></div>

                       </div>
                   <hr>
                      <img src="{{checkIfImageIsexist($buInfo->image)}}" class="img-responsive">
                      <hr>
                   <p>
                   {!! nl2br($buInfo->bu_large_dis) !!}
                   </p>
                   <br>
<hr>
                   <div id="map" style="width:100%;height:500px"></div>

                   <script>
                   function myMap() {
                     var mapCanvas = document.getElementById("map");
                     var myCenter = new google.maps.LatLng({{$buInfo->bu_langtuide}},{{$buInfo->bu_latituide}});
                     var mapOptions = {center: myCenter, zoom: 5};
                     var map = new google.maps.Map(mapCanvas,mapOptions);
                     var marker = new google.maps.Marker({
                       position: myCenter,
                       animation: google.maps.Animation.BOUNCE
                     });
                     marker.setMap(map);
                   }
                   </script>

                   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCaF4Ny26_uXGyJrH5lYrJtJKbsBknarKU&callback=myMap"></script>


            </div>

            <br>

              <div class="profile-content">
                <h3>عقارات اخري قد تهمك</h3>
                <hr>
                 @include('website.bu.shareFile',['bu'=>$same_rent])
                  @include('website.bu.shareFile',['bu'=>$same_type])
              </div>

      </div>
        @include('website.bu.pages')
    </div>
	</div>

        <br>
        <br>

@endsection

@section('footer')

{!!Html::script('cus/js/select2.js') !!}


<script type="text/javascript">
  $('.select2').select2({
    dir: "rtl",

  });

</script>

@endsection

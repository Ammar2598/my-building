@extends('layouts.app')

@section('title')
{{$messageTitle}}
@endsection

@section('header')
  {!! Html::style('cus/buall.css') !!}
{!!Html::style('cus/css/select2.css') !!}


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
    		          <div class="alert alert-danger">
                    <b>
تنبيه :
                    </b>
{{$messageBody}}
                  </div>
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

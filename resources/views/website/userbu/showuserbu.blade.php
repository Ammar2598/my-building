@extends('layouts.app')

@section('title')
عقارات اليوزر
{{$user->name}}
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
              <li class="breadcrumb-item"><a href="{{ url('/showAll/Building') }}">كل العقارات</a></li>
              <li class="active"><a href="#">عقارات اليوزر
              {{$user->name}}</a></li>


            </ol>
          </nav>
                <div class="profile-content">
    			 @include('website.bu.shareFile',['bu'=>$bu])
           <div class="text-center">

             {{$bu->appends(Request::except('page'))->render()}}

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

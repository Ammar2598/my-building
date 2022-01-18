@extends('layouts.app')

@section('title')
تعديل العقار
{{$bu->bu_name}}
@endsection

@section('header')
  {!! Html::style('cus/buall.css') !!}
{!!Html::style('cus/css/select2.css') !!}
<style media="screen">
  label{
    left: 657px !important;
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
              <li class="breadcrumb-item"><a href="{{ url('/user/buildingShowWating') }}">عقارات في انتظار التفعيل</a></li>
              <li class="breadcrumb-item"><a href="{{ url('/user/edit/building/'.$bu->id) }}">تعديل العقار
              {{$bu->bu_name}}</a></li>

            </ol>
          </nav>
                <div class="profile-content">


                  {!! Form::model($bu, ['url' => '/user/update/building','method' => 'patch','files'=>true]) !!}
                  <input type="hidden" name="bu_id" value="{{$bu->id}}">
                  @include('admin.bu.form',['user'=>1])

                  {!! Form::close() !!}
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

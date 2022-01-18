@extends('layouts.app')

@section('title')
تم اضافة العقار بنجاح
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
              <li class="breadcrumb-item"><a href="{{ url('/user/create/building') }}">اضافه عقار جديد</a></li>
              <li class="breadcrumb-item active"><a href="#">تم الاضافة </a></li>


            </ol>
          </nav>
                <div class="profile-content">
                  <div class="alert alert-success">
                    <b>
تم اضافة
                    </b>
...... العقار بنجاح                 
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

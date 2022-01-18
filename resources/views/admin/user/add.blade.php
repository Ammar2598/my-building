@extends('admin.layouts.layout')

@section('title')
اضافة عضو جديد
@endsection


@section('header')


  {!!Html::style('admin/custom.css') !!}
@endsection



@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">


      </div>
      <div class="col-sm-6 left">
          <h1> اضافة عضو</h1>
        <ol class="breadcrumb float-sm-right">
          <li class="active"><a href="{{ url('/adminpanel/users/create') }}">اضافه عضو</a> </li> >

          &nbsp;&nbsp;&nbsp;
          <li><a href="{{ url('/adminpanel/users') }}">التحكم في الاعضاء</a> </li> >
            &nbsp;&nbsp;&nbsp;

            <li class="breadcrumb-item"><a href="{{ url('/adminpanel') }}">الرئيسيه</a></li>

        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header right">
          <h3 class="card-title ">اضف عضو جديد</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

          {!! Form::open( ['url' => '/adminpanel/users','method' => 'POST']) !!}
          @include('admin.user.form')
        
          {!! Form::close() !!}
  </div>
    </div>
      </div>
        </div>
</section>


@endsection






@section('footer')
<!-- DataTables -->

@endsection

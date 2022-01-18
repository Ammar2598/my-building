@extends('admin.layouts.layout')

@section('title')
{{ $contact->contact_name }}
تعديل الرسالة

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
          <h1>{{ $contact->contact_name }} تعديل الرسالة
          </h1>


        <ol class="breadcrumb float-sm-right">
          <li class="active"><a href="{{ url('/adminpanel/contact/'.$contact->id.'edit') }}">{{ $contact->contact_name }} تعديل الرسالة
          </a> </li> >

          &nbsp;&nbsp;&nbsp;
          <li><a href="{{ url('/adminpanel/contact') }}">التحكم في الاعضاء</a> </li> >
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
           <h3 class="card-title"> {{ $contact->contact_name }} تعديل الرسالة
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          {!! Form::model($contact, ['method' => 'PUT', 'route' => ['adminpanel.contact.update',    $contact->id]]) !!}
          @include('admin.contact.form')
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

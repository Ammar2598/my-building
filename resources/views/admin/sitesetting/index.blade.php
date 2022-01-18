@extends('admin.layouts.layout')

@section('title')
تعديل اعدادات الموقع
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
          <h1> تعديل اعدادات الموقع</h1>
        <ol class="breadcrumb float-sm-right">

        <li><a href="{{ url('/adminpanel/sitesetting') }}">تعديل اعدادات الموقع</a> </li> >
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
          <h3 class="card-title ">تعديل اعدادات الموقع</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

          <form class="" action="{{url('adminpanel/sitesetting/')}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}

            @foreach($siteSetting as $setting)
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <div class="col-md-2">
                  {{$setting->slug}}
                </div>

                <div class="col-md-10">
                  @if(($setting->type) == 0)
                   {!! Form::text($setting->namesetting,$setting->value,['class'=>'form-control']) !!}
                  @elseif($setting->type ==3)
                    @if($setting->value !='')
                    <img src="{{ checkIfImageIsexist($setting->value,'/public/website/slider/','/website/slider/') }}" alt="" width="150">
                    <br>
                    @endif
                   {!! Form::file($setting->namesetting,null,['class'=>'form-control']) !!}
                  @else
                   {!! Form::textarea($setting->namesetting,$setting->value,['class'=>'form-control']) !!}
                  @endif

                    @if ($errors->has($setting->namesetting))
                        <span class="help-block">
                            <strong>{{ $errors->first($setting->namesetting) }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            @endforeach
            <button type="submit" name="submit"  class="btn btn-app">
              <i class="fa fa-save">
              حفظ
              </i>
            </button>
              </form>
        </div>
          </div>
            </div>
              </div>
</section>


@endsection

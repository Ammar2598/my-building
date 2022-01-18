@extends('admin.layouts.layout')

@section('title')
{{ $bu->name }}
تعديل العقار

@endsection


@section('header')


{!!Html::style('cus/css/select2.css') !!}
  {!!Html::style('admin/custom.css') !!}
@endsection



@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">


      </div>
      <div class="col-sm-6 left">
          <h1> تعديل العقار {{ $bu->bu_name }}
          </h1>
        <ol class="breadcrumb float-sm-right">
          <li class="active"><a href="{{ url('/adminpanel/bu/'.$bu->id.'edit') }}"> تعديل العقار {{ $bu->bu_name }}
          </a> </li> >

          &nbsp;&nbsp;&nbsp;
          <li><a href="{{ url('/adminpanel/bu') }}">التحكم في العقارات</a> </li> >
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
           <h3 class="card-title">  تعديل العقار {{ $bu->bu_name }}
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

                    <div class="form-group">
                      <label class="col-md-12" style="left: 897px">
                معلومات عن صاحب العقار
                      </label>

                        <div class="col-md-12" style="left: 884px;">
                           @if($user =='')
                           <p>
                              تم اضافة العقار بواسطة زائر
                           </p>
                           @else
                           <p>
                           اسم المستخدم
                           :
                           {{$user->name}}
                           </p>
                           <p>
                           الايميل
                           :
                           {{$user->email}}
                           </p>
                           <p>
                         صلاحيات العضو
                           :
                           @if($user->admin == 1)
                           مدير
                           @else
                           عضو
                           @endif

                           </p>
                           <p>
                      للمزيد:

                          <a href="{{url('/adminpanel/users/'.$user->id.'/edit')}}">اضغط هنا</a>
                           </p>
                           @endif
                        </div>
                    </div>
          {!! Form::model($bu, ['method' => 'PUT','files'=>true, 'route' => ['adminpanel.bu.update',    $bu->id]]) !!}
          @include('admin.bu.form')
          {!! Form::close() !!}

  </div>
    </div>
      </div>
        </div>
</section>



@endsection







@section('footer')
{!!Html::script('cus/js/select2.js') !!}
<script type="text/javascript">
  $('.select2').select2({
    dir: "rtl",

  });

</script>

@endsection

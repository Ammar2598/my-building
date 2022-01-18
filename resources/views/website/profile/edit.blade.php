@extends('layouts.app')

@section('title')
تعديل المعلومات الشخصيه للعضو
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
              <li class="active"><a href="#">  تعديل المعلومات الشخصيه للعضو
                {{$user->name}}</a></li>

            </ol>
          </nav>
                <div class="profile-content">
                  <h2>تعديل الايميل واسم المستخدم</h2>
                          <hr>
              {!! Form::model($user, ['method' => 'patch', 'route' => ['user.editSetting', $user->id]]) !!}
            			 @include('admin.user.form',['showfouser'=>1])
              {!! Form::close() !!}
                         <hr>
                         <div class="clearfix">

                         </div>
                         <br>


            <!-- change user password -->

            <h2>تعديل كلمه المرور</h2>
                    <hr>
              {!! Form::open( ['url' => '/user/changePassword','method' => 'post']) !!}

              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} col-sm-12">


                  <div class="col-md-12">
                      <input id="password" type="password" class="form-control" name="password" placeholder="كلمة المرور القديمه">

                      @if ($errors->has('password'))
                          <span class="help-block">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                      @endif

                  </div>
                  <div class="clearfix">

                  </div>
<br>
                  <div class="col-md-12">
                      <input type="password" class="form-control" name="newpassword" placeholder="كلمة المرور الجديده">

                      @if ($errors->has('newpassword'))
                          <span class="help-block">
                              <strong>{{ $errors->first('newpassword') }}</strong>
                          </span>
                      @endif

                  </div>
                  <div class="clearfix">

                  </div>
<br>
                  <div class="col-md-12">
                      <button type="submit" class="btn btn-warning">
                          <i class="fa fa-btn fa-edit"></i>  تغيير كلمه المرور
                      </button>

                  </div>

              </div>

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

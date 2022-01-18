@extends('layouts.app')

@section('title')
تسجيل عضويه جديده
@endsection

@section('content')
<div class="container">
  <div class="contact_bottom">
    <hr>
    <h3>تسجيل عضوية جديدة</h3>
    <hr>
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

            <div class="col-md-12">
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="اسم المستخدم">

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

            <div class="col-md-12">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="البريد الالكتروني">

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">


            <div class="col-md-12">
                <input id="password" type="password" class="form-control" name="password" placeholder="كلمة المرور">

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">

            <div class="col-md-12">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="تاكيد كلمه المرور">

                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-12">
                <button type="submit" class="btn btn-warning">
                    <i class="fa fa-btn fa-user"></i>تسجيل عضوية جديدة
                </button>
            </div>
        </div>
    </form>
  </div>
  <div class="clearfix">

  </div>
  <br>
</div>

@endsection

@extends('admin.layouts.layout')

@section('title')
{{ $user->name }}
تعديل العضو

@endsection


@section('header')


  {!!Html::style('admin/custom.css') !!}
@endsection

<style media="screen">
.content {
  width: 500px !important;
}
.row {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -145.5px  !important;
    margin-left: -7.5px;
  }
  .btn-danger {
    width: 154px !important;
}
.content-header {
    width: 992px !important;
    background-color: #F4F6F9;
    height: 82px;
}

</style>

@section('content')





<div class="row">

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">


        </div>
        <div class="col-sm-6 left">
            <h1>{{ $user->name }} تعديل العضو
            </h1>


          <ol class="breadcrumb float-sm-right">
            <li class="active"><a href="{{ url('/adminpanel/users/'.$user->id.'edit') }}">{{ $user->name }} تعديل العضو
            </a> </li> >

            &nbsp;&nbsp;&nbsp;
            <li><a href="{{ url('/adminpanel/users') }}">التحكم في الاعضاء</a> </li> >
              &nbsp;&nbsp;&nbsp;

              <li class="breadcrumb-item"><a href="{{ url('/adminpanel') }}">الرئيسيه</a></li>

          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab"> {{ $user->name }} تعديل العضو</a></li>
                  <li class="nav-item"><a class="nav-link " href="#activity" data-toggle="tab">عقارات غير مفعله</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">عقارات مفعله</a></li>

                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="settings">

                      <section >

                          <div class="col-12">
                            <div class="card">
                              <div class="card-header right">
                                 <h3 class="card-title"> {{ $user->name }} تعديل العضو
                                </h3>
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body">
                                {!! Form::model($user, ['method' => 'PUT', 'route' => ['adminpanel.users.update',    $user->id]]) !!}
                                @include('admin.user.form')
                                {!! Form::close() !!}

                        </div>
                          </div>
                            </div>

                      </section>
                      <section >

                          <div class="col-12">
                            <div class="card">
                              <div class="card-header right">
                                 <h3 class="card-title"> {{ $user->name }} تغيير كلمه المرور الخاصه بالعضو
                                </h3>
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body">
                                {!! Form::open( ['url' => '/adminpanel/user/changePassword/','method' => 'post']) !!}
                                <input type="hidden" name="user_id" value="{{$user->id}}">
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} col-sm-12">


                                    <div class="col-md-12">
                                        <input id="password" type="password" class="form-control" name="password" placeholder="كلمة المرور">

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif

                                    </div>
                                    <br>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-warning">
                                            <i class="fa fa-btn fa-edit"></i>  تغيير كلمه المرور
                                        </button>

                                        @if($user->id != 1)
                                        <a href="{{url('/adminpanel/users/' . $user->id . '/delete')}}" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i> حذف العضو</a>
                                        @endif
                                    </div>
                                </div>

                                {!! Form::close() !!}

                        </div>
                          </div>
                            </div>

                      </section>

                  </div>
                  <div class=" tab-pane" id="activity">
                    <table class="table table-bordered">
                      <tr>
                        <td>اسم العقار</td>
                        <td>اضيف في</td>
                        <td>نوع العقار</td>
                        <td>سعر العقار</td>
                        <td>المنطقه</td>
                        <td>المساحة</td>
                        <td>حاله العقار</td>
                        <td>تغيير حالة العقار</td>
                      </tr>
                      @foreach($buwating as $wating)
                         <tr>
                           <td><a href="{{url('/adminpanel/bu/'.$wating->id.'/edit')}}"> {{$wating->bu_name}} </a> </td>
                           <td>{{$wating->created_at}}</td>
                           <td>{{bu_type()[$wating->bu_type]}}</td>
                           <td>{{$wating->bu_price}}</td>
                           <td>{{bu_place()[$wating->bu_place]}}</td>
                           <td>{{$wating->bu_square}}</td>
                            <td>{{bu_rent()[$wating->bu_rent]}}</td>
                           <td><a href="{{url('/adminpanel/change_status/'.$wating->id.'/1')}}">تفعيل العقار</a> </td>
                          </tr>
                      @endforeach
                    </table>

                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <table class="table table-bordered">
                      <tr>
                        <td>اسم العقار</td>
                        <td>اضيف في</td>
                        <td>نوع العقار</td>
                        <td>سعر العقار</td>
                        <td>المنطقه</td>
                        <td>المساحة</td>
                        <td>حاله العقار</td>
                        <td>تغيير حالة العقار</td>

                      </tr>
                      @foreach($buenable as $wating)
                         <tr>
                           <td><a href="{{url('/adminpanel/bu/'.$wating->id.'/edit')}}"> {{$wating->bu_name}} </a> </td>
                           <td>{{$wating->created_at}}</td>
                           <td>{{bu_type()[$wating->bu_type]}}</td>
                           <td>{{$wating->bu_price}}</td>
                           <td>{{bu_place()[$wating->bu_place]}}</td>
                           <td>{{$wating->bu_square}}</td>
                           <td>{{bu_rent()[$wating->bu_rent]}}</td>
                            <td><a href="{{url('/adminpanel/change_status/'.$wating->id.'/0')}}">الغاء تفعيل العقار</a> </td>
                          </tr>
                      @endforeach
                    </table>

                  </div>
                  <!-- /.tab-pane -->


                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>

</div>

@endsection



@section('footer')
<!-- DataTables -->

@endsection

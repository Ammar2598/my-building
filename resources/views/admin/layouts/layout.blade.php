<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>

    لوحه تحكم الموقع
    {{getSetting()}}
    |
    @yield('title')

  </title>
  <style media="screen">
    .custom{
           direction: ltr !important;
    }

  </style>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  {!!Html::style('admin/plugins/fontawesome-free/css/all.min.css') !!}
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
    {!!Html::style('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') !!}
  <!-- iCheck -->
    {!!Html::style('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') !!}
  <!-- JQVMap -->
    {!!Html::style('admin/plugins/jqvmap/jqvmap.min.css') !!}
  <!-- Theme style -->
    {!!Html::style('admin/dist/css/adminlte.min.css') !!}
  <!-- overlayScrollbars -->
    {!!Html::style('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') !!}
  <!-- Daterange picker -->
    {!!Html::style('admin/plugins/daterangepicker/daterangepicker.css') !!}
  <!-- summernote -->
    {!!Html::style('admin/plugins/summernote/summernote-bs4.css') !!}
    {!!Html::style('cus/sweetalert.css') !!}
  <!-- Google Font: Source Sans Pro -->

  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  @yield('header')
  {!!Html::style('admin/custom.css') !!}
</head>
<body class="hold-transition sidebar-mini layout-fixed">

  <!-- Navbar -->
    <nav class="main-header navbar navbar-expand nav navbar-dark navbar-gray">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <!-- <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
              </li> -->
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{url('/')}}" class="nav-link">الصفحه الرئيسية</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{url('/logout')}}" class="nav-link">تسجيل خروج</a>
        </li>
      </ul>



      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <span class="badge badge-danger navbar-badge"> {{ countunreadMessage() }}</span>
          </a>


          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <center>
            <h5>لديك {{ countunreadMessage() }}
            رساله غير مقروءه
           </h5>
          </center>
            <hr>
          @foreach(unreadMessage() as $keymessage=>$valuemessage )
          <center>
            <a href="{{url('/adminpanel/contact/'.$valuemessage->id.'/edit')}}" class="dropdown-item" style="direction:rtl">
              <!-- Message Start -->
              <div class="media">

                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    {{$valuemessage->contact_name}}
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">{{str_limit($valuemessage->contact_message,10)}}</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>{{$valuemessage->created_at}}</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
          </center>

                   @endforeach
            <div class="dropdown-divider"></div>
            <a href="{{url('/adminpanel/contact')}}" class="dropdown-item dropdown-footer">اظهر كل الرسائل</a>
          </div>

        </li>



        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">{{countBuAppendTostatus(0)}}</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">
              يوجد
               {{countBuAppendTostatus(0)}}
               عقار غير مفعل
            </span>
           @foreach(\App\Bu::where('bu_status',0)->get() as $buWating)
            <div class="dropdown-divider"></div>
            <a  href="{{url('/adminpanel/change_status/'.$buWating->id.'/1')}}" class="pull-right">
              <span>
              تفعيل العقار
              </span>
            </a>
            <a  href="{{url('/adminpanel/bu/'.$buWating->id.'/edit')}}" class="dropdown-item" class="pull-left">
              <i class="fa fa-building">
                <span >
                 {{$buWating->bu_name}}
                 </span>
               </i>

            </a>

           @endforeach
          </div>
        </li>
        <li class="nav-item">
        <a class="nav-link"  href="{{url('/adminpanel')}}"><i class="fas fa-bars"></i></a>
      </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4 custom" style="direction:rtl">
      <!-- Brand Logo -->
      <a href="{{ url('/adminpanel') }}" class="brand-link">


      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt=" مرحبا" >
          </div>
          <div class="info">
            <a href="{{url('/adminpanel/users/'.Auth::user()->id.'/edit')}}" class="d-block" STYLE="text-transform:capitalize">{{ Auth::user()->name }}</a>
            <hr>
              <a href="{{ url('/adminpanel') }}" class="x"> <i class="fa fa-circle text-success" ></i> القائمة الرئيسية</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            @include('/admin/layouts/nav')

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper con">

  <!-- Main content -->
  @yield('content')
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->



<footer class="main-footer" style="margin-left:0 !important">
  <center>
  <strong>  تحت اشراف د.حاتم  &copy; 2020 <a href="ammar.yasser2598@gmail.com">Ammar Yaser</a>.</strong>
  All rights reserved.
  <div class="y float-right d-none d-sm-inline-block" >

  </div>
</center>

</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>

  <!-- jQuery -->

  {!!Html::script('admin/plugins/jquery/jquery.min.js') !!}
  {!!Html::script('admin/plugins/jquery-ui/jquery-ui.min.js') !!}

<!-- jQuery UI 1.11.4 -->

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
{!!Html::script('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') !!}
<!-- ChartJS -->
{!!Html::script('admin/plugins/chart.js/Chart.min.js') !!}
<!-- Sparkline -->
{!!Html::script('admin/plugins/sparklines/sparkline.js') !!}
<!-- JQVMap -->
{!!Html::script('admin/plugins/jqvmap/jquery.vmap.min.js') !!}
{!!Html::script('admin/plugins/jqvmap/maps/jquery.vmap.usa.js') !!}
<!-- jQuery Knob Chart -->
{!!Html::script('admin/plugins/jquery-knob/jquery.knob.min.js') !!}
{!!Html::script('admin/plugins/moment/moment.min.js') !!}
<!-- daterangepicker -->
{!!Html::script('admin/plugins/daterangepicker/daterangepicker.js') !!}
<!-- Tempusdominus Bootstrap 4 -->
{!!Html::script('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') !!}
<!-- Summernote -->
{!!Html::script('admin/plugins/summernote/summernote-bs4.min.js') !!}
<!-- overlayScrollbars -->
{!!Html::script('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') !!}
<!-- AdminLTE App -->
{!!Html::script('admin/dist/js/adminlte.js') !!}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<!-- AdminLTE for demo purposes -->
{!!Html::script('admin/dist/js/demo.js') !!}
{!!Html::script('cus/sweetalert.min.js') !!}
{!!Html::script('cus/sweetalert.js') !!}

{!!Html::script('admin/plugins/jquery-mousewheel/jquery.mousewheel.js') !!}
{!!Html::script('admin/plugins/raphael/raphael.min.js') !!}
{!!Html::script('admin/plugins/jquery-mapael/jquery.mapael.min.js') !!}
{!!Html::script('admin/plugins/jquery-mapael/maps/usa_states.min.js') !!}
{!!Html::script('admin/dist/js/pages/dashboard2.js') !!}


@include('admin.layouts.f_message')


@yield('footer')
</body>
</html>

@extends('admin.layouts.layout')
@section('header')
<style media="screen">
.card-body {
  direction: ltr !important;
}
.card-tools{
  float: left !important;
}
.users-list>li {
    float: right !important;
    float: right;
    padding: 10px;
    text-align: center;
    width: 25%;
}
.text-center {
    text-align: center!important;
    left: 261px !important;
}
</style>
@endsection
@section('content')

<div class="content-wrapper" style="margin-left:-17px  !important">
   <!-- Content Header (Page header) -->
   <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6 text-center">
           <h1 class="m-0 text-dark">لوحة تحكم الموقع الرئيسية</h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="{{url('/adminpanel')}}">الرئيسية</a></li>

           </ol>
         </div><!-- /.col -->
       </div><!-- /.row -->
     </div><!-- /.container-fluid -->
   </div>
   <!-- /.content-header -->

   <!-- Main content -->
   <section class="content">
     <div class="container-fluid">
       <!-- Info boxes -->
       <div class="row">
         <div class="col-12 col-sm-6 col-md-3">
           <div class="info-box">
             <span class="info-box-icon bg-info elevation-1"><i class="fa fa-envelope"></i></span>

             <div class="info-box-content">
               <span class="info-box-text">عدد الرسائل</span>
               <span class="info-box-number">
                {{$contactUsCount}}

               </span>
             </div>
             <!-- /.info-box-content -->
           </div>
           <!-- /.info-box -->
         </div>
         <!-- /.col -->
         <div class="col-12 col-sm-6 col-md-3">
           <div class="info-box mb-3">
             <span class="info-box-icon bg-success elevation-1"><i class="far fa-check-square"></i></span>

             <div class="info-box-content">
               <span class="info-box-text">عدد العقارات المفعله</span>
               <span class="info-box-number">{{$buCountActive}}</span>
             </div>
             <!-- /.info-box-content -->
           </div>
           <!-- /.info-box -->
         </div>
         <!-- /.col -->

         <!-- fix for small devices only -->
         <div class="clearfix hidden-md-up"></div>

         <div class="col-12 col-sm-6 col-md-3">
           <div class="info-box mb-3">
             <span class="info-box-icon bg-danger elevation-1"><i class="far fa-clock"></i></span>

             <div class="info-box-content">
               <span class="info-box-text">عدد العقارات الغير مفعله</span>
               <span class="info-box-number">{{$buWating}}</span>
             </div>
             <!-- /.info-box-content -->
           </div>
           <!-- /.info-box -->
         </div>
         <!-- /.col -->
         <div class="col-12 col-sm-6 col-md-3">
           <div class="info-box mb-3">
             <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

             <div class="info-box-content">
               <span class="info-box-text">عدد اعضاء الموقع</span>
               <span class="info-box-number">{{$usersCount}}</span>
             </div>
             <!-- /.info-box-content -->
           </div>
           <!-- /.info-box -->
         </div>
         <!-- /.col -->
       </div>
       <!-- /.row -->

       <div class="row">
               <div class="col-md-12">
                 <div class="card">
                   <div class="card-header">
                     <h5 class="card-title">العقارات خلال السنة الحالية</h5>

                     <div class="card-tools">
                       <button type="button" class="btn btn-tool" data-card-widget="collapse">
                         <i class="fas fa-minus"></i>
                       </button>
                       <div class="btn-group">
                         <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                           <i class="fas fa-wrench"></i>
                         </button>
                         <div class="dropdown-menu dropdown-menu-right" role="menu">
                           <a href="#" class="dropdown-item">Action</a>
                           <a href="#" class="dropdown-item">Another action</a>
                           <a href="#" class="dropdown-item">Something else here</a>
                           <a class="dropdown-divider"></a>
                           <a href="#" class="dropdown-item">Separated link</a>
                         </div>
                       </div>
                       <button type="button" class="btn btn-tool" data-card-widget="remove">
                         <i class="fas fa-times"></i>
                       </button>
                     </div>
                   </div>
                   <!-- /.card-header -->
                   <div class="card-body">
                     <div class="row">
                       <div class="col-md-12">
                         <p class="text-center">
                           <strong>رسم بياني يوضح اضافه العقارات خلال السنه</strong>
                         </p>

                         <div class="chart">
                           <!-- Sales Chart Canvas -->
                           <canvas id="salesChart" height="180" style="height: 180px;"></canvas>
                         </div>
                         <!-- /.chart-responsive -->
                       </div>

                     </div>
                     <!-- /.row -->
                   </div>

                 </div>
                 <!-- /.card -->
               </div>
               <!-- /.col -->
             </div>
             <!-- /.row -->

             <!-- Main row -->
             <div class="row">
               <!-- Left col -->
               <div class="col-md-8">
                 <!-- MAP & BOX PANE -->
                 <div class="card">
                   <div class="card-header">
                     <h3 class="card-title">مكان اخر عقار</h3>

                     <div class="card-tools">
                       <button type="button" class="btn btn-tool" data-card-widget="collapse">
                         <i class="fas fa-minus"></i>
                       </button>
                       <button type="button" class="btn btn-tool" data-card-widget="remove">
                         <i class="fas fa-times"></i>
                       </button>
                     </div>
                   </div>
                   <!-- /.card-header -->
                   <div class="card-body p-0">
                     <div class="d-md-flex">
                       <div class="p-1 flex-fill" style="overflow: hidden">
                         <!-- Map will be created here -->
                         <!-- <div id="world-map-markers" style="height: 325px; overflow: hidden">
                           <div class="map"></div>
                         </div> -->
                         <div id="map" style="width:100%;height:500px"></div>

                         <script>
                         function myMap() {
                           var mapCanvas = document.getElementById("map");
                           var myCenter = new google.maps.LatLng({{$sample->bu_langtuide}},{{$sample->bu_latituide}});
                           var mapOptions = {center: myCenter, zoom: 5};
                           var map = new google.maps.Map(mapCanvas,mapOptions);
                           var marker = new google.maps.Marker({
                             position: myCenter,
                             animation: google.maps.Animation.BOUNCE
                           });
                           marker.setMap(map);
                         }
                         </script>

                         <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCaF4Ny26_uXGyJrH5lYrJtJKbsBknarKU&callback=myMap"></script>
                       </div>
                       <div class="card-pane-right bg-success pt-2 pb-2 pl-4 pr-4">
                         <div class="description-block mb-4">

                           <h5 class="description-header">{{$buCountActive}}</h5>
                           <span class="description-text"> العقارات
                             <br>
                              المفعله</span>
                         </div>
                         <!-- /.description-block -->
                         <div class="description-block mb-4">

                           <h5 class="description-header">{{$buWating}}</h5>
                           <span class="description-text"> العقارات
                              <br> الغير مفعله</span>
                         </div>
                         <!-- /.description-block -->
                         <div class="description-block">

                           <h5 class="description-header">{{$buWating + $buCountActive}}</h5>
                           <span class="description-text">كل
                              <br>
                              العقارات </span>
                         </div>
                         <!-- /.description-block -->
                       </div><!-- /.card-pane-right -->
                     </div><!-- /.d-md-flex -->
                   </div>
                   <!-- /.card-body -->
                 </div>
                 <!-- /.card -->
                 <div class="row">
                   <div class="col-md-6">
                     <!-- TABLE: LATEST ORDERS -->
                     <div class="card">
                       <div class="card-header border-transparent">
                         <h3 class="card-title">اخر الرسائل الموقع</h3>

                         <div class="card-tools">
                           <button type="button" class="btn btn-tool" data-card-widget="collapse">
                             <i class="fas fa-minus"></i>
                           </button>
                           <button type="button" class="btn btn-tool" data-card-widget="remove">
                             <i class="fas fa-times"></i>
                           </button>
                         </div>
                       </div>
                       <!-- /.card-header -->
                       <div class="card-body p-0">
                         <div class="table-responsive">
                           <table class="table m-0">
                             <thead>

                             <tr>
                               <th>التسلسل</th>
                               <th>اسم المرسل</th>
                               <th>ايميل المرسل</th>
                               <th>المشاهده</th>
                               <th>نوع الرساله</th>
                             </tr>

                             </thead>
                             <tbody>
                                  @foreach($lastesContactus as $contatus)
                             <tr>

                               <td><a href="{{url('/adminpanel/contact/'.$contatus->id.'/edit')}}">{{$contatus->id}}</a></td>
                               <td><a href="{{url('/adminpanel/contact/'.$contatus->id.'/edit')}}">{{$contatus->contact_name}}</a></td>
                               <td><span class="badge badge-success">{{$contatus->contact_email}}</span></td>
                               <td>  {!! $contatus->view ==0 ? '<li class="fas fa-eye-slash btn btn-danger"></li>' : '<li class="fa fa-eye btn btn-success"></li>' !!} </td>
                               <td>  {{contact()[$contatus->contact_type]}} </td>

                             </tr>
                         @endforeach
                             </tbody>
                           </table>
                         </div>
                         <!-- /.table-responsive -->
                       </div>
                       <!-- /.card-body -->
                       <div class="card-footer clearfix">
                         <a href="{{url('/adminpanel/contact')}}" class="btn btn-sm btn-info float-left">كل الرسائل</a>

                       </div>
                       <!-- /.card-footer -->
                     </div>
                   </div>
                <!-- orderthis -->


                   <div class="col-md-6">
                     <!-- USERS LIST -->
                     <div class="card">
                       <div class="card-header">
                         <h3 class="card-title">اخر الاعضاء المسجلون</h3>

                         <div class="card-tools">
                           <span class="badge badge-danger">8 اعضاء</span>
                           <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                           </button>
                           <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                           </button>
                         </div>
                       </div>
                       <!-- /.card-header -->
                       <div class="card-body p-0">
                         <ul class="users-list clearfix">
                           @foreach($lastesUsers as $user)
                           <li>
                             <img src="admin/dist/img/user1-128x128.jpg" alt="{{$user->name}}" title="{{$user->name}}">
                             <a class="users-list-name" href="{{url('/adminpanel/users/'.$user->id.'/edit')}}">{{$user->name}}</a>
                             <span class="users-list-date">{{$user->created_at}}</span>
                           </li>
                          @endforeach
                         </ul>
                         <!-- /.users-list -->
                       </div>
                       <!-- /.card-body -->
                       <div class="card-footer text-center">
                         <a href="{{url('/adminpanel/users')}}">كل الاعضاء</a>
                       </div>
                       <!-- /.card-footer -->
                     </div>
                     <!--/.card -->
                   </div>
                   <!-- /.col -->
                 </div>
                 <!-- /.row -->


                 <!-- /.card -->
               </div>
               <!-- /.col -->

               <div class="col-md-4">

                 <div class="info-box mb-3 bg-warning">
                   <span class="info-box-icon"><i class="fas fa-user"></i></span>

                   <div class="info-box-content">
                     <span class="info-box-text">Ammar Yaser</span>
                     <span class="info-box-number">Leader & Implementation </span>
                   </div>

                 </div>

                 <div class="info-box mb-3 bg-success">
                   <span class="info-box-icon"><i class="far fa-user"></i></span>

                   <div class="info-box-content">
                     <span class="info-box-text">Hager Ezzat</span>
                     <span class="info-box-number"> Analisys Member</span>
                   </div>

                 </div>

                 <div class="info-box mb-3 bg-danger">
                   <span class="info-box-icon"><i class="fas fa-user"></i></span>

                   <div class="info-box-content">
                     <span class="info-box-text">Fatma Yaser</span>
                     <span class="info-box-number">Analisys Member</span>
                   </div>
                   <!-- /.info-box-content -->
                 </div>
                 <!-- /.info-box -->
                 <div class="info-box mb-3 bg-info">
                   <span class="info-box-icon"><i class="far fa-user"></i></span>

                   <div class="info-box-content">
                     <span class="info-box-text">D.Hatem Mohamed</span>
                     <span class="info-box-number">Supervisor</span>
                   </div>
                   <!-- /.info-box-content -->
                 </div>
                 <!-- /.info-box -->



                 <!-- PRODUCT LIST -->
                 <div class="card">
                   <div class="card-header">
                     <h3 class="card-title">اخر العقارات المضافه</h3>

                     <div class="card-tools">
                       <button type="button" class="btn btn-tool" data-card-widget="collapse">
                         <i class="fas fa-minus"></i>
                       </button>
                       <button type="button" class="btn btn-tool" data-card-widget="remove">
                         <i class="fas fa-times"></i>
                       </button>
                     </div>
                   </div>
                   <!-- /.card-header -->
                   <div class="card-body p-0">
                     <ul class="products-list product-list-in-card pl-2 pr-2">
                       @foreach($lastesBu as $bu)
                       <li class="item">
                         <div class="product-img">
                           <img src="{{checkIfImageIsexist($bu->image)}}" alt="Product Image" class="img-size-50">
                         </div>
                         <div class="product-info">
                           <a href="{{url('/adminpanel/bu/'.$bu->id.'/edit')}}" class="product-title">{{$bu->bu_name}}
                             <span class="badge badge-warning float-right">{{$bu->bu_price}}</span></a>
                           <span class="product-description">
                            {{$bu->bu_small_dis}}
                           </span>
                         </div>
                       </li>
                       @endforeach
                     </ul>
                   </div>
                   <!-- /.card-body -->
                   <div class="card-footer text-center">
                     <a href="{{url('/adminpanel/bu')}}" class="uppercase">كل العقارات</a>
                   </div>
                   <!-- /.card-footer -->
                 </div>
                 <!-- /.card -->
               </div>
               <!-- /.col -->
             </div>

@endsection

@section('footer')

<script>

  /* ChartJS
   * -------
   * Here we will create a few charts using ChartJS
   */

  //-----------------------
  //- MONTHLY SALES CHART -
  //-----------------------

  // Get context with jQuery - using jQuery's .get() method.
  var salesChartCanvas = $('#salesChart').get(0).getContext('2d')

  var salesChartData = {
    labels  : ['يناير', 'فبراير', 'مارس', 'ابريل', 'مايو', 'يونيو', 'يوليو','اغسطس','اكتوبر','نوفمبر','ديسمبر'],
    datasets: [
      {
        label               : 'Digital Goods',
        backgroundColor     : 'rgba(60,141,188,0.9)',
        borderColor         : 'rgba(60,141,188,0.8)',
        pointRadius          : true,
        pointColor          : '#3b8bba',
        pointStrokeColor    : 'rgba(60,141,188,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data                : [
          @foreach($new as $c)
          @if(is_array($c))
           {{$c['counting']}},
          @else
            {{$c}},
          @endif

          @endforeach

        ]
      },


    ]
  }
</script>

@endsection

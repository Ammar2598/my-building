<div class="col-md-3">
@if(Auth::user())

  <div class="profile-sidebar">
    <!-- SIDEBAR USERPIC -->

    <!-- END SIDEBAR USERPIC -->
<h2 style="margin-right:10px">خيارات العضو</h2>
    <!-- SIDEBAR MENU -->
    <div class="profile-usermenu">
      <ul class="nav" style="padding-right:0;margin-right:0">
        <li class="{{setActive(['user','editSetting'])}}">
          <a href="{{url('/user/editSetting')}}">
          <i class="fa fa-edit"></i>
        تعديل المعلومات الشخصيه </a>
        </li>
        <li class="{{setActive(['user','buildingShow'])}}">
          <a href="{{url('/user/buildingShow')}}">
          <i class="fa fa-check"></i>
      العقارات المفعلة
<label class="label label-default">{{buforusercount(Auth::user()->id,1)}}</label>
    </a>
        </li>
        <li class="{{setActive(['user','buildingShowWating'])}}">
          <a href="{{url('/user/buildingShowWating')}}">
          <i class="fa fa-clock-o"></i>
      عقارات في انتظار التفعيل
<label class="label label-default">{{buforusercount(Auth::user()->id,0)}}</label>
    </a>
        </li>
        <li class="{{setActive(['user','create','building'])}}">
          <a href="{{url('/user/create/building')}}">
          <i class="fa fa-plus"></i>
        اضف عقار </a>
        </li>

      </ul>
    </div>
      </div>
@endif
<br>
  <div class="profile-sidebar">
    <!-- SIDEBAR USERPIC -->

    <!-- END SIDEBAR USERPIC -->
<h2 style="margin-right:10px">خيارات العقارات</h2>
    <!-- SIDEBAR MENU -->
    <div class="profile-usermenu">
      <ul class="nav" style="padding-right:0;margin-right:0">

        <li class="{{setActive(['showAllBuilding'])}}">
          <a href="{{url('/showAllBuilding')}}">
          <i class="fa fa-building"></i>
          كل العقارات </a>
        </li>
        <li class="{{setActive(['ForRent'])}}">
          <a href="{{url('/ForRent')}}">
          <i class="fa fa-calendar"></i>
          ايجار </a>
        </li>
        <li class="{{setActive(['ForBuy'])}}">
          <a href="{{url('/ForBuy')}}">
          <i class="fa fa-building-o"></i>
          تمليك </a>
        </li>
        <li class="{{setActive(['type','0'])}}">
          <a href="{{url('/type/0')}}">
          <i class="fa fa-institution"></i>
          شقه</a>
        </li>
        <li class="{{setActive(['type','1'])}}">
          <a href="{{url('/type/1')}}">
          <i class="fa fa-home"></i>
          فيلا</a>
        </li>
        <li class="{{setActive(['type','2'])}}">
          <a href="{{url('/type/2')}}">
          <i class="fa fa-institution"></i>
          شاليه</a>
        </li>

      </ul>
    </div>
    <!-- END MENU -->
  </div>

  <br>

  <div class="profile-sidebar">
    <!-- SIDEBAR USERPIC -->

    <!-- END SIDEBAR USERPIC -->
<h2 style="margin-right:10px">البحث المتقدم</h2>
    <!-- SIDEBAR MENU -->
    <div class="profile-usermenu" style="padding:10px">
      {!! Form::open(['url'=>'search','method'=>'get']) !!}
      <ul class="nav" style="padding-right:0;margin-right:0">

        <li class="itemsearch">
         {!! Form::text("bu_price_from",null,['class'=>'form-controller','placeholder'=>'سعر العقار من']) !!}
        </li>
        <li class="itemsearch">
         {!! Form::text("bu_price_to",null,['class'=>'form-controller','placeholder'=>'سعر العقار الي']) !!}
        </li>
        <li class="itemsearch">
         {!! Form::select("bu_place",bu_place(),null,['class'=>'form-controller select2','placeholder'=>'المنطقه']) !!}
        </li>
        <li class="itemsearch">
         {!! Form::select("rooms",roomnumber(),null,['class'=>'form-controller select2','placeholder'=>'عدد الغرف']) !!}
        </li>
        <li class="itemsearch">
         {!! Form::select("bu_type",bu_type(),null,['class'=>'form-controller','placeholder'=>'نوع العقار']) !!}
        </li>
        <li class="itemsearch">
         {!! Form::select("bu_rent",bu_rent(),null,['class'=>'form-controller','placeholder'=>'نوع العملية']) !!}
        </li>
        <li class="itemsearch">
         {!! Form::text("bu_square",null,['class'=>'form-controller','placeholder'=>'المساحة']) !!}
        </li>

        <li class="itemsearch">
         {!! Form::submit("ابحث",['class'=>'btn btn-success']) !!}
        </li>
      </ul>
      {!! Form::close() !!}
    </div>
    <!-- END MENU -->
  </div>



</div>

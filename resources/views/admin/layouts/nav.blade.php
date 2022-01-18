
<li class="nav-item">
  <a href="{{url('/adminpanel/sitesetting')}}" class="nav-link ">
    <i class="fa fa-edit"></i>
    <p>الاعدادات الرئيسيه</p>
  </a>
</li>


<!-- users -->

<li class="nav-item has-treeview menu-open">
  <a href="#" class="nav-link">
    <i class="nav-icon fa fa-users"></i>
    <p>
      التحكم في الاعضاء
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{ url('/adminpanel/users/create') }}" class="nav-link ">
        <i class="far fa-circle nav-icon"></i>
        <p>اضف عضو</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ url('/adminpanel/users') }}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p style="margin-right:25px">كل الاعضاء</p>
      </a>
    </li>

  </ul>
</li>

  <!--bu  -->


  <li class="nav-item has-treeview menu-open">
    <a href="#" class="nav-link">
      <i class="nav-icon fa fa-building"></i>
      <p>
        التحكم في العقارات
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ url('/adminpanel/bu/create') }}" class="nav-link ">
          <i class="far fa-circle nav-icon"></i>
          <p>اضف عقار</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('/adminpanel/bu') }}" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p style="margin-right:25px">كل العقارات</p>
        </a>
      </li>

    </ul>
  </li>

<!-- contact -->
  <li class="nav-item pull-right">
    <a href="{{ url('/adminpanel/contact') }}" class="nav-link">
      <i class="nav-icon fa fa-envelope"></i>
      <p style="margin-right:25px">رسائل</p>
    </a>
  </li>

<!-- statistics -->
<li class="nav-item pull-right">
  <a href="{{ url('/adminpanel/buYear/statics') }}" class="nav-link">
    <i class="fas fa-chart-line"></i>
    <p style="margin-right:25px">احصائيات اضافية</p>
  </a>
</li>

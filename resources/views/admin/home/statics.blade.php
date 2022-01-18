@extends('admin.layouts.layout')

@section('title')
احصائيات اضافه العقارات من السنه
{{$year}}
@endsection


@section('header')

{!!Html::style('cus/css/select2.css') !!}
{!!Html::style('admin/custom.css') !!}
<style media="screen">
  #salesChart{
    width: 1079px !important;
  }
</style>

@endsection



@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">


      </div>
      <div class="col-sm-6 left">
          <h1> احصائيات اضافه العقارات من السنه
          {{$year}}</h1>
        <ol class="breadcrumb float-sm-right">
          <li class="active"><a href="{{ url('/adminpanel/buYear/statics') }}">احصائيات اضافه العقارات من السنه
          {{$year}}</a> </li> >



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
    <div class="col-md-12">
      {!! Form::open(['url'=>'/adminpanel/buYear/statics' ,'method'=>'post']) !!}
      <select class="select2" style="width:100px" name="year">
        @for($i=2020 ; $i <= 2100 ;$i++)
         <option value="{{$i}}">{{$i}} </option>
        @endfor
      </select>
      <input type="submit" name="submit" value="اظهار الاحصائيات" class="btn btn-warning">
      {!! Form::close() !!}
      <p class="text-center">
        <strong>احصائيات اضافه العقارات من السنه
        {{$year}}</strong>
      </p>

      <div class="chart">
        <!-- Sales Chart Canvas -->
        <canvas id="salesChart" height="180" style="height: 180px;    "></canvas>
      </div>
      <!-- /.chart-responsive -->
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
      labels  : ['يناير', 'فبراير', 'مارس', 'ابريل', 'مايو', 'يونيو', 'يوليو','اغسطس','سبتمبر','اكتوبر','نوفمبر','ديسمبر'],
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

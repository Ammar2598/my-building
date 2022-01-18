@extends('layouts.app')

@section('title')
كل العقارات
@endsection

@section('header')
  {!! Html::style('cus/buall.css') !!}
{!!Html::style('cus/css/select2.css') !!}

  <style>
  hr{
      margin-bottom: 10px;
        margin-top: 10px;
  }
    .dis{
      padding-bottom: 10px;
      margin-bottom: 10px;
    }
    .itemsearch{
      margin-bottom: 10px;
    }
    .breadcrumb{
      background-color: #ffffff;
    }
  </style>
@endsection

@section('content')


<div class="container">
    <div class="row profile">

    <div class="col-md-9">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">الرئيسيه</a></li>
            @if(isset($array))
            @if(!empty($array))
              @foreach($array as $key=>$value)
              <li class="breadcrumb-item"><a href="{{ url('/search?'.$key.'='.$value) }}">{{searchnameField()[$key]}} ->
                @if($key=='bu_type')
                  {{bu_type()[$value]}}

                @elseif($key =='bu_rent')
                 {{bu_rent()[$value]}}

                 @elseif($key =='bu_place')
                  {{bu_place()[$value]}}

                @else
                  {{$value}}
                @endif
              </a></li>
              @endforeach
            @endif
            @endif
            </ol>
          </nav>
                <div class="profile-content">
    			 @include('website.bu.shareFile',['bu'=>$buAll])
           <div class="text-center">

             {{$buAll->appends(Request::except('page'))->render()}}

           </div>
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

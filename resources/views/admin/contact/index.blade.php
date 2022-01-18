@extends('admin.layouts.layout')

@section('title')
التحكم في رسائل الموقع
@endsection


@section('header')

<!-- DataTables -->
  {!!Html::style('admin/custom.css') !!}
  {!!Html::style('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css') !!}


@endsection



@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">


      </div>
      <div class="col-sm-6">
          <h1 >التحكم في رسائل الموقع</h1>
        <ol class="breadcrumb float-sm-right">
            <li class="active"><a href="{{ url('/adminpanel/contact') }}">التحكم في رسائل الموقع</a> </li> >

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
        <div class="card-header">
          <h3 class="card-title">البيانات الحاليه</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="data" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>#</th>
              <th>الاسم</th>
              <th>البريد الالكتروني</th>
              <th>اضيف في</th>
              <th>الحاله </th>
              <th>نوع الرساله </th>
              <th>التحكم</th>


            </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot>
            <tr>
              <th>#</th>
              <th>الاسم</th>
              <th>البريد الالكتروني</th>
              <th>اضيف في</th>
              <th>الحاله </th>
              <th>نوع الرساله </th>
              <th>التحكم</th>




            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->


      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->

@endsection






@section('footer')
<!-- DataTables -->

{!!Html::script('admin/plugins/datatables/jquery.dataTables.js') !!}
{!!Html::script('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js') !!}

<script type="text/javascript">


     var lastIdx = null;

 $('#data thead th').each( function () {
     if($(this).index()  < 4 ){
         var classname = $(this).index() == 6  ?  'date' : 'dateslash';
         var title = $(this).html();
         $(this).html( '<input type="text" class="' + classname + '" data-value="'+ $(this).index() +'" placeholder=" البحث '+title+'" />' );
     }else if($(this).index() == 4){
         $(this).html( '<select><option value="0"> رسالة جديده </option><option value="1">رسالة قديمة</option></select>' );
     }else if($(this).index() == 5){
         $(this).html( '<select>'+
           @foreach(contact() as $key=>$contantus)
            '<option value="{{$key}}"> {{$contantus}} </option>' +
           @endforeach
         '</select>' );
     }

 } );

 var table = $('#data').DataTable({
     processing: true,
     serverSide: true,
     ajax: '{{ url('/adminpanel/contact/data') }}',
     columns: [
         {data: 'id', name: 'id'},
         {data: 'contact_name', name: 'contact_name'},
         {data: 'contact_email', name: 'contact_email'},
         {data: 'created_at', name: 'created_at'},
         {data: 'view', name: 'view'},
         {data: 'contact_type', name: 'contact_type'},
         {data: 'control', name: ''}
     ],
     "language": {
         "url": "{{ Request::root()  }}/admin/cus/Arabic.json"
     },
     "stateSave": false,
     "responsive": true,
     "order": [[0, 'desc']],
     "pagingType": "full_numbers",
     aLengthMenu: [
         [25, 50, 100, 200, -1],
         [25, 50, 100, 200, "All"]
     ],
     iDisplayLength: 25,
     fixedHeader: true,

     "oTableTools": {
         "aButtons": [


             {
                 "sExtends": "csv",
                 "sButtonText": "ملف اكسل",
                 "sCharSet": "utf16le"
             },
             {
                 "sExtends": "copy",
                 "sButtonText": "نسخ المعلومات",
             },
             {
                 "sExtends": "print",
                 "sButtonText": "طباعة",
                 "mColumns": "visible",


             }
         ],

         "sSwfPath": "{{ Request::root()  }}/admin/cus/copy_csv_xls_pdf.swf"
     },

     "dom": '<"pull-left text-left" T><"pullright" i><"clearfix"><"pull-right text-right col-lg-6" f > <"pull-left text-left" l><"clearfix">rt<"pull-right text-right col-lg-6" pi > <"pull-left text-left" l><"clearfix"> '
     ,initComplete: function ()
     {
         var r = $('#data tfoot tr');
         r.find('th').each(function(){
             $(this).css('padding', 8);
         });
         $('#data thead').append(r);
         $('#search_0').css('text-align', 'center');
     }

 });

 table.columns().eq(0).each(function(colIdx) {
     $('input', table.column(colIdx).header()).on('keyup change', function() {
         table
                 .column(colIdx)
                 .search(this.value)
                 .draw();
     });




 });



 table.columns().eq(0).each(function(colIdx) {
     $('select', table.column(colIdx).header()).on('change', function() {
         table
                 .column(colIdx)
                 .search(this.value)
                 .draw();
     });

     $('select', table.column(colIdx).header()).on('click', function(e) {
         e.stopPropagation();
     });
 });


 $('#data tbody')
         .on( 'mouseover', 'td', function () {
             var colIdx = table.cell(this).index().column;

             if ( colIdx !== lastIdx ) {
                 $( table.cells().nodes() ).removeClass( 'highlight' );
                 $( table.column( colIdx ).nodes() ).addClass( 'highlight' );
             }
         } )
         .on( 'mouseleave', function () {
             $( table.cells().nodes() ).removeClass( 'highlight' );
         } );



</script>
@endsection

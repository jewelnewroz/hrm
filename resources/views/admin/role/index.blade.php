@extends('layouts.app')

@section('content')
                <article class="content items-list-page">
                    <div class="card items" style="padding: 15px">
                        <div class="row">
                    <div class="col-sm-12">
                        <div class="box">
                            <table class="table table-striped table-bordered" id="dataTable">
                                <thead>
                                    <tr>
                                        <th><div>ID</div></th>
                                        <th><div>Name</div></th>
                                        <th><div>Permission</div></th>
                                        <th style="width:135px;v-align:middle;text-align:center;" class="align-middle"><div><i class="fa fa-wrench"></i></div></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div><!--/col-->
                    <div class="clearfix"></div>
                </div>
                </div>
            </article>
@endsection

@section('header')
<style type="text/css">
.sidebar-title {
  margin: 0;
}
hr {
  margin: 10px 0;
}
</style>
@endsection

@section('footer')
<script type="text/javascript" src="{{ asset('admin/assets/plugins/dataTable/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/assets/plugins/dataTable/DataTables-1.10.18/js/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript">
    var url = "{{ route('role.index') }}";
//
// Pipelining function for DataTables. To be used to the `ajax` option of DataTables
//
$.fn.dataTable.ext.classes.sPageButton = 'page-item';
$(function(){
    var customFilter = $('#customFilters');
    var keyword = $(customFilter).find('input#keywords');
    var status = $(customFilter).find('select#status');
    var search = $(customFilter).find('button#search');
    console.log(keyword);
    var table = $('#dataTable').DataTable( {
        "processing": true,
        "serverSide": true,
        "deferRender": false,
        "autoWidth": false,
        "bAutoWidth": false,
        "sPageButtonActive": "active",
        "ajax": {
         'url': url,
           pages: 5, // number of pages to cache
           'data': function(data){
              // Read values
              data.keyword = $(keyword).val();
              data.status = $(status).val();
          }
      },
        dom: 'lBfrtip',
        "lengthChange": false,
        lengthMenu: [[25, 50, 100, 500, -1], [25, 50, 100, 500, "All"]],
        "oLanguage": {
          "sLengthMenu": "Show _MENU_ ",
        },
        "pageLength": 25,
        "bFilter": false,
        "bInfo": true,
        "searching": false,
        "columns": [
        { "data": "id" },
        { "data": "name" },
        {
            "mRender": function( data, type, row ){
                var str = '';
                if( row['permissions'].length > 0 ) {
                    for( var i = 0; i < row['permissions'].length; i++ ) {
                        str += '<span class="badge badge-primary">' + row['permissions'][i].name + '</span>';
                    }
                }
                return str;
            }
        }
,
        {
            "mRender": function( data, type, row ){
                return "<a href='/dashboard/role/edit/" + row['id'] + "' class='btn btn-secondary btn-xs'><i class='fa fa-edit'></i></a> <a href='/dashboard/role/show/" + row['id'] + "' class='btn btn-success btn-xs'><i class='fa fa-eye'></i></a>";
            }
        }
      ],
      "columnDefs": [
      {"targets": [2,3], "searchable": false, "orderable": false, "visible": true}
      ],
      "order": [[0, 'asc']]
  } );

    //Click on Search Button
    $(search).click( function(e) {
        table.draw();
    });

    //Custom Filters ( title search )
    $(keyword).keyup( function(event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        // if(keycode == '13'){
            table.draw();
        // }
    } );

    //Custom Filters ( Author search )
    $(status).change( function() {
        if( $(this).val() != ''){
            table.draw();
        }
    } );

    // $('#myModal').modal('show');

    function deleteLibraryItem( id ) {
        var parent = $(this).parents('tr');
        var url = "{{ url('dashboard/library/delete/') }}/" + id;
        var data = null;
        var confirmed = confirm('Are you sure to delete this item?');
        if( confirmed ) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "DELETE",
                url: url,
                data: data,
                success: function(data, textStatus, xhr){
                    if( data.success == true ) {
                        $(parent).remove();
                    }
                    return false;
                }
            });
        }
        return false;
    }
});
</script>
@endsection

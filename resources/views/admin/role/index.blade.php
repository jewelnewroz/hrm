@extends('madmin.layout._layout')

@section('content')
                <article class="content items-list-page">
                    <div class="title-search-block">
                        <div class="title-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="title"> {{ $title }} <a href="{{ route('roles.create')}}" class="btn btn-primary btn-sm rounded-s"> Add New </a>
                                        <div class="action dropdown">
                                            <button class="btn  btn-sm rounded-s btn-secondary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> More actions... </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                <a class="dropdown-item" href="#"><i class="fa fa-file-export icon"></i> Export</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#confirm-modal"><i class="fa fa-file-import icon"></i> Import</a>
                                            </div>
                                        </div>
                                    </h3>
                                    <!-- <p class="title-description"> List of <a href="{{ route('dashboard.customer.index') }}">Active</a>, <a href="{{ route('dashboard.customer.index') }}">Pending</a>, <a href="{{ route('dashboard.customer.index') }}">Disabled</a> Customers</p> -->
                                </div>
                            </div>
                        </div>
                        <div class="items-search" id="customFilters">
                            <form class="form-inline">
                                <div class="input-group">
                                    <input type="text" class="form-control boxed rounded-s" value="<?php echo (isset( $_GET['q'] )) ? $_GET['q'] : ''; ?>" placeholder="Search for..." id="keywords">
                                    <span class="input-group-btn">
                                        <button class="btn btn-secondary rounded-s list-search-btn" type="button" id="search">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
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
    var url = "{{ route('roles.index') }}";
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
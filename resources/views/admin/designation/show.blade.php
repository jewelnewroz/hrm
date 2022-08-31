@extends('layouts.app')

@section('content')

                <article class="content items-list-page">
                    <div class="title-search-block">
                        <div class="title-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="title"> {{ $title }} <a href="{{ route('dashboard.area.edit', $area->id)}}" class=""> <i class="fa fa-edit"></i> </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="items-search" id="customFilters">
                            <form class="form-inline">
                                <div class="input-group">
                                    <a href="{{ route('dashboard.area.index') }}" class="btn btn-secondary rounded-s list-search-btn" id="search">
                                        <i class="fa fa-arrow-left"></i> Back
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="items">

                    <div class="col-sm-12">
                        <div class="clearfix"></div>
                        <div class="box" style="padding:0;">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Package Information</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="customer-tab" data-toggle="tab" href="#customer" role="tab" aria-controls="customer" aria-selected="false">Customers</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="statistics-tab" data-toggle="tab" href="#statistics" role="tab" aria-controls="statistics" aria-selected="false">Statistics</a>
                                </li>
                            </ul>
                             <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                  <table class="table table-striped">
                                    <tr>
                                      <th style="width:25%;">Name</th>
                                      <td>{{ $area->user['name'] }}</td>
                                    </tr>
                                    <tr>
                                      <th>Username</th>
                                      <td>{{ $area->user['username'] }}</td>
                                    </tr>
                                    <tr>
                                      <th>Email</th>
                                      <td>{{ $area->email }}</td>
                                    </tr>
                                    <tr>
                                      <th>Mobile</th>
                                      <td>{{ $area->mobile }}</td>
                                    </tr>
                                    <tr>
                                      <th>Address</th>
                                      <td>{{ $area->name }}</td>
                                    </tr>
                                    <tr>
                                      <th>Status</th>
                                      <td>{{ ( $area->status == 1 ) ? 'Active' : (($area->status == 0) ? 'Pending' : 'Inactive') }}</td>
                                    </tr>
                                  </table>
                                </div>
                                <div class="tab-pane fade" id="customer" role="tabpanel" aria-labelledby="customer-tab">
                                  <table class="table table-striped table-bordered" id="billingsTable">
                                    <thead>
                                      <tr>
                                        <th>Bill Month</th>
                                        <th>Bills</th>
                                        <th>Paid</th>
                                        <th>Dues</th>
                                        <th><i class="fa fa-wrench"></i></th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                  </table>
                                </div>
                                <div class="tab-pane fade" id="package" role="tabpanel" aria-labelledby="package-tab">
                                  <table class="table table-striped table-bordered" id="billingsTable">
                                    <thead>
                                      <tr>
                                        <th>Bill Month</th>
                                        <th>Bills</th>
                                        <th>Paid</th>
                                        <th>Dues</th>
                                        <th><i class="fa fa-wrench"></i></th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                  </table>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>


</article>
@endsection

@section('header')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/plugins/dataTable/DataTables-1.10.18/css/dataTables.bootstrap.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/plugins/dataTable/Buttons-1.5.6/css/buttons.bootstrap4.min.css') }}"/>
<style type="text/css">
    /*search box css start here*/
    .list-search-btn {
        font-size: 23px;
    }
    .table-avatar {
        max-width: 50px;
    }
    .search-sec{
        padding: 2rem;
    }
    .search-slt{
        display: block;
        width: 100%;
        font-size: 1.5rem;
        line-height: 1.5;
        color: #55595c;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        height: calc(3rem + 2px) !important;
        border-radius:0;
    }
    .wrn-btn{
        width: 100%;
        font-size: 16px;
        font-weight: 400;
        text-transform: capitalize;
        height: calc(3rem + 2px) !important;
        border-radius:0;
    }
    @media (min-width: 992px){
        .search-sec{
            position: relative;
            top: -114px;
            background: rgba(26, 70, 104, 0.51);
        }
    }

    @media (max-width: 992px){
        .search-sec{
            background: #1A4668;
        }
    }

</style>
@endsection

@section('footer')
<script src="{{ asset('admin/assets/plugins/dataTable/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/dataTable/DataTables-1.10.18/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/dataTable/Buttons-1.5.6/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/dataTable/Buttons-1.5.6/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/dataTable/pdfmake-0.10.18/pdfmake.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/dataTable/pdfmake-0.10.18/vfs_fonts.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/dataTable/Buttons-1.5.6/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/dataTable/Buttons-1.5.6/js/buttons.print.min.js') }}"></script>
<script>

var url = "{{ route('dashboard.customer.billing') }}";
$.fn.dataTable.ext.classes.sPageButton = 'page-item';

$(function(){
    var customFilter = $('#customFilters');
    var keyword = $(customFilter).find('input#keywords');
    var area = $(customFilter).find('select#area');
    var package = $(customFilter).find('select#package');
    var status = $(customFilter).find('select#status');
    var search = $(customFilter).find('button#search');
    var table = $('#billingsTable').DataTable( {
        "processing": true,
        "serverSide": true,
        "bAutoWidth": false,
        "sPageButtonActive": "active",
        "ajax": {
           'url': url,
           pages: 5, // number of pages to cache
           'data': function(data){
              // Read values
              data.keyword = $(keyword).val();
              data.area = $(area).val();
              data.package = $(package).val();
              data.status = $(status).val();
          }
        },
        dom: 'lBfrtip',
        "lengthChange": true,
        lengthMenu: [[25, 50, 100, 500, -1], [25, 50, 100, 500, "All"]],
        "oLanguage": {
          "sLengthMenu": "Show _MENU_ ",
        },
        "pageLength": 25,
        "bFilter": true,
        "bInfo": true,
        "searching": false,
        "columns": [
            { "mRender": function(data, type, row)
                {
                    return '<input type="checkbox" value="'+ row['id'] +'" class="form-control table-checkbox">';
                }
            },
            { "mRender": function(data, type, row)
                {
                    return '<img src="'+ row['photo'] +'" class="table-avatar">';
                }
            },
            { "mRender": function(data, type, row)
                {
                    return '<a href="/dashboard/customer/show/'+ row['id'] +'" class="table-avatar">' + row['name'] + '</a>';
                }
            },
            { "data": "email" },
            { "data": "mobile" },
            { "data": "package" },
            { "data": "area" },
            { "data": "bills" },
            { "data": "dues" },
            { "data": "status" },
            {"mRender": function ( data, type, row ) {
                    return "<div class='btn-group'> <button class='btn btn-secondary btn-sm dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'><i class='fa fa-ellipsis-h' aria-hidden='true'></i></button> <div class='dropdown-menu dropdown-menu-right'> <a href='/dashboard/customer/show/" + row['id'] + "' class='dropdown-item' data-customer-id='" + row['id'] + "'><i class='fa fa-eye'></i> View</a> <a href='/dashboard/customer/edit/" + row['id'] + "' class='dropdown-item'><i class='fa fa-edit'></i> Edit</a> <a href='#' class='dropdown-item customer-active' data-customer-id='" + row['id'] + "'><i class='fa fa-check'></i> Active</a> <a href='#' class='dropdown-item customer-deactive' data-customer-id='" + row['id'] + "'><i class='fa fa-ban'></i> Deactive</a> </div> </div>";
                }
            }
      ],
      "columnDefs": [
      {"targets": [0,1,6], "searchable": false, "orderable": false, "visible": true}
      ],
      "order": [[2, 'asc']],
      buttons: [
           'copy', 'excel', 'pdf', 'print'
        ]
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
    $(area).change( function() {
        // var keycode = (event.keyCode ? event.keyCode : event.which);
        table.draw();
    } );

    //Custom Filters ( Author search )
    $(package).change( function() {
        // var keycode = (event.keyCode ? event.keyCode : event.which);
        table.draw();
    } );

    //Custom Filters ( Author search )
    $(status).change( function() {
        table.draw();
    } );

    // $('#myModal').modal('show');
    $("#PopS").popover({
        html: true
    }).on('shown.bs.popover', function () {
        $('#datetimepicker1').datetimepicker();
        $('#datetimepicker2').datetimepicker();
    });

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
@endsection

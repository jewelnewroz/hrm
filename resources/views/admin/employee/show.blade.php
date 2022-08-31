@extends('layouts.app')

@section('content')

                <article class="content items-list-page">
                    <div class="title-search-block">
                        <div class="title-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="title"> {{ $title }} <a href="{{ route('user.edit', $customer->id)}}" class=""> <i class="fa fa-edit"></i> </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="items-search" id="customFilters">
                            <form class="form-inline">
                                <div class="input-group">
                                    <a href="{{ route('user.index') }}" class="btn btn-secondary rounded-s list-search-btn" id="search">
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
                                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Account Information</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Customer Info</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="billing-tab" data-toggle="tab" href="#billing" role="tab" aria-controls="billing" aria-selected="false">Billings</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="payments-tab" data-toggle="tab" href="#payments" role="tab" aria-controls="payments" aria-selected="false">Payments</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="activity-tab" data-toggle="tab" href="#activity" role="tab" aria-controls="activity" aria-selected="false">Activities</a>
                                </li>
                            </ul>
                             <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                  <table class="table table-striped">
                                    <tr>
                                      <th style="width:25%;">Name</th>
                                      <td>{{ $customer->user['first_name'] . ' ' . $customer->user['last_name'] }}</td>
                                    </tr>
                                    <tr>
                                      <th>Username</th>
                                      <td>{{ $customer->user['username'] }}</td>
                                    </tr>
                                    <tr>
                                      <th>Email</th>
                                      <td>{{ $customer->user['email'] }}</td>
                                    </tr>
                                    <tr>
                                      <th>Mobile</th>
                                      <td>{{ $customer->user['mobile'] }}</td>
                                    </tr>
                                    <tr>
                                      <th>Status</th>
                                      <td>{{ ( $customer->status == 1 ) ? 'Active' : (($customer->status == 0) ? 'Pending' : 'Inactive') }}</td>
                                    </tr>
                                  </table>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                  <table class="table table-striped">
                                    <tr>
                                      <th style="width:25%;">Customer ID</th>
                                      <td>{{ $customer->customerID }}</td>
                                    </tr>
                                    <tr>
                                      <th>Mikrotik ID</th>
                                      <td>{{ $customer->mktikID }}</td>
                                    </tr>
                                    <tr>
                                      <th>Remote Address (IP)</th>
                                      <td>{{ $customer->remote_ip }}</td>
                                    </tr>
                                    <tr>
                                      <th>Physical Address (MAC)</th>
                                      <td>{{ $customer->mobile }}</td>
                                    </tr>
                                    <tr>
                                      <th>Package</th>
                                      <td>{{ $customer->package['name'] . ' (' . $customer->package['price'] . ')' }}</td>
                                    </tr>
                                    <tr>
                                      <th>Zonal Name</th>
                                      <td>{{ $customer->zone['name'] }}</td>
                                    </tr>
                                    <tr>
                                      <th>Area Name</th>
                                      <td>{{ $customer->area['name'] }}</td>
                                    </tr>
                                    <tr>
                                      <th>Address</th>
                                      <td>{{ $customer->address }}</td>
                                    </tr>
                                    <tr>
                                      <th>Connectivity location</th>
                                      <td>{{ $customer->connectivity_location }}</td>
                                    </tr>
                                    <tr>
                                      <th>Status</th>
                                      <td>{{ ( $customer->status == 1 ) ? 'Active' : (($customer->status == 0) ? 'Pending' : 'Inactive') }}</td>
                                    </tr>
                                  </table>
                                </div>
                                <div class="tab-pane fade" id="billing" role="tabpanel" aria-labelledby="billing-tab">
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
                                <div class="tab-pane fade" id="payments" role="payments" aria-labelledby="payments-tab">
                                  <table class="table table-striped table-bordered" id="paymentTable">
                                    <thead>
                                      <tr>
                                        <th>Payment date</th>
                                        <th>Bills</th>
                                        <th>Paid Amount</th>
                                        <th>Dues</th>
                                        <th><i class="fa fa-wrench"></i></th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                  </table>
                                </div>
                                <div class="tab-pane fade" id="activity" role="tabpanel" aria-labelledby="activity-tab">
                                  <table class="table table-striped table-bordered" id="activityTable">
                                    <tr>
                                      <th></th>
                                    </tr>
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
<script type="text/javascript">
var billingsTable, paymentTable;
$(function(){
    var url = "{{ route('user.billing') }}";
    $.fn.dataTable.ext.classes.sPageButton = 'page-item';
    var customFilter = $('#customFilters');
    var keyword = $(customFilter).find('input#keywords');
    var area = $(customFilter).find('select#area');
    var package = $(customFilter).find('select#package');
    var status = $(customFilter).find('select#status');
    var search = $(customFilter).find('button#search');
    billingsTable = $('#billingsTable').DataTable( {
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

    $('#billing-tab').click(function(e){
      alert('billing tab clicked');
      table.draw();
    });

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

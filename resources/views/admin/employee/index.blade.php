@extends('layouts.app')

@section('content')

                <article class="content items-list-page">
                    <div class="title-search-block">
                        <div class="title-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="title"> {{ $title }} <a href="{{ route('employee.create')}}" class="btn btn-primary btn-sm rounded-s"> Add New </a>
                                        <div class="action dropdown">
                                            <button class="btn  btn-sm rounded-s btn-secondary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i> Actions</button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                <a class="dropdown-item" href="#"><i class="fa fa-user-check icon"></i> Active</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#confirm-modal"><i class="fa fa-user-alt-slash icon"></i> Deactive</a>
                                            </div>
                                        </div>
                                        <div class="action dropdown">
                                            <button class="btn  btn-sm rounded-s btn-secondary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog"></i> Manage </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                <a class="dropdown-item" href="{{ route('employee.export') }}"><i class="fa fa-file-export icon"></i> Export</a>
                                                <a class="dropdown-item" href="{{ route('employee.import') }}"><i class="fa fa-file-import icon"></i> Import</a>
                                            </div>
                                        </div>
                                    </h3>
                                    <!-- <p class="title-description"> List of <a href="{{ route('employee.index') }}">Active</a>, <a href="{{ route('employee.index') }}">Pending</a>, <a href="{{ route('employee.index') }}">Disabled</a> Customers</p> -->
                                </div>
                            </div>
                        </div>
                        <div class="items-search" id="customFilters">
                            <form class="form-inline">
                                <div class="input-group">
                                    <input type="text" class="form-control boxed rounded-s" value="<?php echo (isset( $_GET['q'] )) ? $_GET['q'] : ''; ?>" placeholder="Search for..." id="keywords">
                                    <span class="input-group-btn">
                                        <select class="form-control" id="department">
                                            <option value="">Department</option>
                                            @foreach( $departments as $department )
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                            @endforeach
                                        </select>
                                        <select class="form-control" id="package">
                                            <option value="">Designation</option>
                                            @foreach( $designations as $k => $v )
                                            <option value="{{ $k }}">{{$v}}</option>
                                            @endforeach
                                        </select>
                                    </span>
                                    <span class="input-group-btn">
                                        <select class="form-control" id="status">
                                            <option value="">Status</option>
                                            <option value="0">Pending</option>
                                            <option value="1">Active</option>
                                            <option value="2">Disabled</option>
                                        </select>
                                        <button class="btn btn-secondary rounded-s list-search-btn" type="button" id="search">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card items">

                    <div class="col-sm-12">
                        <div class="clearfix"></div>
                        <div class="box" style="padding:15px 0;">
                            <table class="table table-striped table-bordered" id="dataTable">
                                <thead>
                                    <tr>
                                        <th style="width:30px;"><input type="checkbox" name="" value="1" class="form-control"></th>
                                        <th style="width:50px;"><div><i class="fa fa-image"></i></div></th>
                                        <th><div>Name</div></th>
                                        <th><div>Email</div></th>
                                        <th><div>Mobile</div></th>
                                        <th><div>Department</div></th>
                                        <th><div>Designation</div></th>
                                        <th><div>Joining date</div></th>
                                        <th><div>Status</div></th>
                                        <th style="width:40px;v-align:middle;text-align:center;" class="align-middle"><div><i class="fa fa-wrench"></i></div></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <div class="clearfix"></div>
                    </div><!--/col-->
                    <div class="clearfix"></div>
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
// <div id="popover-content">
// <form role="form" method="post">
//     <div class="form-group">
//         <label>Start time?</label>
//         <div class="input-group date" id="datetimepicker1">
//             <input type="text" class="form-control" placeholder="Start Date time of event" /> <span class="input-group-addon">
//                 <span class="glyphicon glyphicon-calendar"></span>
// </span>
//         </div>
//     </div>
//     <div class="form-group">
//         <label>End time?</label>
//         <div class="input-group date" id="datetimepicker2">
//             <input type="text" class="form-control" placeholder="End Date time" /> <span class="input-group-addon">
//                 <span class="glyphicon glyphicon-calendar"></span>
// </span>
//         </div>
//     </div>
//     <div class="form-group">
//         <button class="btn btn-primary btn-block">Search between dates</button>
//     </div>
// </form>
// </div>
    $(document).ready(function () {
        $("#PopS").popover({
            html: true
        }).on('shown.bs.popover', function () {
            $('#datetimepicker1').datetimepicker();
            $('#datetimepicker2').datetimepicker();
        });
    });
    var url = "{{ route('employee.index') }}";
//
// Pipelining function for DataTables. To be used to the `ajax` option of DataTables
//
$.fn.dataTable.ext.classes.sPageButton = 'page-item';
$.fn.dataTable.pipeline = function ( opts ) {
    // Configuration options
    var conf = $.extend( {
        pages: 5,     // number of pages to cache
        url: "{{ route('employee.index') }}",      // script url
        data: null,   // function or object with parameters to send to the server
                      // matching how `ajax.data` works in DataTables
        method: 'GET' // Ajax HTTP method
    }, opts );

    // Private variables for storing the cache
    var cacheLower = -1;
    var cacheUpper = null;
    var cacheLastRequest = null;
    var cacheLastJson = null;

    return function ( request, drawCallback, settings ) {
        var ajax          = true;
        var requestStart  = request.start;
        var drawStart     = request.start;
        var requestLength = request.length;
        var requestEnd    = requestStart + requestLength;

        if ( settings.clearCache ) {
            // API requested that the cache be cleared
            ajax = true;
            settings.clearCache = false;
        }
        else if ( cacheLower < 0 || requestStart < cacheLower || requestEnd > cacheUpper ) {
            // outside cached data - need to make a request
            ajax = true;
        }
        else if ( JSON.stringify( request.order )   !== JSON.stringify( cacheLastRequest.order ) ||
          JSON.stringify( request.columns ) !== JSON.stringify( cacheLastRequest.columns ) ||
          JSON.stringify( request.search )  !== JSON.stringify( cacheLastRequest.search )
          ) {
            // properties changed (ordering, columns, searching)
        ajax = true;
    }

        // Store the request for checking next time around
        cacheLastRequest = $.extend( true, {}, request );

        if ( ajax ) {
            // Need data from the server
            if ( requestStart < cacheLower ) {
                requestStart = requestStart - (requestLength*(conf.pages-1));

                if ( requestStart < 0 ) {
                    requestStart = 0;
                }
            }

            cacheLower = requestStart;
            cacheUpper = requestStart + (requestLength * conf.pages);

            request.start = requestStart;
            request.length = requestLength*conf.pages;

            // Provide the same `data` options as DataTables.
            if ( typeof conf.data === 'function' ) {
                // As a function it is executed with the data object as an arg
                // for manipulation. If an object is returned, it is used as the
                // data object to submit
                var d = conf.data( request );
                if ( d ) {
                    $.extend( request, d );
                }
            }
            else if ( $.isPlainObject( conf.data ) ) {
                // As an object, the data given extends the default
                $.extend( request, conf.data );
            }

            settings.jqXHR = $.ajax( {
                "type":     conf.method,
                "url":      conf.url,
                "data":     request,
                "dataType": "json",
                "cache":    true,
                "success":  function ( json ) {
                    cacheLastJson = $.extend(true, {}, json);

                    if ( cacheLower != drawStart ) {
                        json.data.splice( 0, drawStart-cacheLower );
                    }
                    if ( requestLength >= -1 ) {
                        json.data.splice( requestLength, json.data.length );
                    }

                    drawCallback( json );
                }
            } );
        }
        else {
            json = $.extend( true, {}, cacheLastJson );
            json.draw = request.draw; // Update the echo for each response
            json.data.splice( 0, requestStart-cacheLower );
            json.data.splice( requestLength, json.data.length );

            drawCallback(json);
        }
    }
};

// Register an API method that will empty the pipelined data, forcing an Ajax
// fetch on the next draw (i.e. `table.clearPipeline().draw()`)
$.fn.dataTable.Api.register( 'clearPipeline()', function () {
    return this.iterator( 'table', function ( settings ) {
        settings.clearCache = true;
    } );
} );

$(function(){
    var confirm = $('#confirm-modal');
    // $(confirm).modal('show');
    $(confirm).on('hide.bs.modal', function (event) {
        // $(this).find('.modal-footer .btn').each(function(e){
        //     if( $(this).hasClass('btn-primary') ) {
        //         alert('You clicked Yes');
        //     } else {
        //         alert('You clicked No');
        //     }
        // });
        // alert('modal closing');
      // var button = $(event.relatedTarget) // Button that triggered the modal
      // var recipient = button.data('whatever') // Extract info from data-* attributes
      // // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      // var modal = $(this)
      // modal.find('.modal-title').text('New message to ' + recipient)
      // modal.find('.modal-body input').val(recipient)
    });
    var customFilter = $('#customFilters');
    var keyword = $(customFilter).find('input#keywords');
    var area = $(customFilter).find('select#area');
    var package = $(customFilter).find('select#package');
    var status = $(customFilter).find('select#status');
    var search = $(customFilter).find('button#search');
    var table = $('#dataTable').DataTable( {
        "processing": true,
        "serverSide": true,
        "deferRender": true,
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
            { "data": "department" },
            { "data": "designation" },
            { "data": "joining_date" },
            { "mRender": function(data, type, row)
                {
                    return (parseInt(row['status']) == 1) ? 'Active' : ((parseInt(row['status']) == 0 ) ? 'Pending' : 'Inactive');
                }
            },
            {"mRender": function ( data, type, row )
                {
                    var str =  "<div class='btn-group'> <button class='btn btn-secondary btn-sm dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'><i class='fa fa-ellipsis-h' aria-hidden='true'></i></button> <div class='dropdown-menu dropdown-menu-right'> <a href='/dashboard/customer/show/" + row['id'] + "' class='dropdown-item' data-customer-id='" + row['id'] + "'><i class='fa fa-eye'></i> View</a> <a href='/dashboard/customer/edit/" + row['id'] + "' class='dropdown-item'><i class='fa fa-edit'></i> Edit</a>";
                    if( parseInt(row['status']) == 1 ) {
                        str = "<a href='#' class='dropdown-item customer-action' data-action='inactive' data-customer-id='" + row['id'] + "'><i class='fa fa-ban'></i> Inactive</a>";
                    } else if(parseInt(row['status']) == 0) {
                        str += "<a href='#' class='dropdown-item customer-action' data-action='active' data-customer-id='" + row['id'] + "'><i class='fa fa-check'></i> Active</a>";
                    } else {
                        str += "<a href='#' class='dropdown-item customer-action' data-action='reactive' data-customer-id='" + row['id'] + "'><i class='fa fa-check'></i> Re-active</a>";
                    }
                    if( row['deleted_at'] == '' ) {
                        str += "<a href='#' class='dropdown-item customer-action' data-action='softdelete' data-customer-id='" + row['id'] + "'><i class='fa fa-times'></i> Delete</a>";
                    } else {
                        str += "<a href='#' class='dropdown-item customer-action' data-action='delete' data-customer-id='" + row['id'] + "'><i class='fa fa-times'></i> Delete</a>";
                    }
                    str += "</div> </div>";
                    return str;
                }
            }
      ],
      "columnDefs": [
      {"targets": [0,1,9], "searchable": false, "orderable": false, "visible": true}
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

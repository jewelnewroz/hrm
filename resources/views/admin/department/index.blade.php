@extends('layouts.app')

@section('content')


    <article class="content items-list-page">
        <div class="title-search-block">
            <div class="title-block">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="title"> {{ $title }} <a href="{{ route('dashboard.department.create')}}"
                                                           class="btn btn-primary btn-sm rounded-s"> Add New </a>
                            <div class="action dropdown">
                                <button class="btn  btn-sm rounded-s btn-secondary dropdown-toggle" type="button"
                                        id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false"> Manage
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <a class="dropdown-item" href="#"><i class="fa fa-file-export icon"></i> Export</a>
                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                       data-target="#confirm-modal"><i class="fa fa-file-import icon"></i> Import</a>
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
                        <input type="text" class="form-control boxed rounded-s"
                               value="<?php echo (isset($_GET['q'])) ? $_GET['q'] : ''; ?>" placeholder="Search for..."
                               id="keywords">
                        <span class="input-group-btn">
                                        <button class="btn btn-secondary rounded-s list-search-btn" type="button"
                                                id="search">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="card items" style="padding: 15px">
            <div class="row">
                <div class="col-sm-9">
                    <div class="box">
                        <table class="table table-striped table-bordered" id="dataTable">
                            <thead>
                            <tr>
                                <th>
                                    <div>Department Name</div>
                                </th>
                                <th>
                                    <div>Department Code</div>
                                </th>
                                <th style="width:135px;v-align:middle;text-align:center;" class="align-middle">
                                    <div><i class="fa fa-wrench"></i></div>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div><!--/col-->
                <div class="col-sm-3" style="padding-left: 0">
                    <div class="sidebar-right"
                         style="background: #f9f8f8; margin: 0;min-height: 400px; border: 1px solid #f1f1f1; padding: 10px 15px">
                        <h4 class="sidebar-title"><i class="fa fa-plus"></i> Add new department</h4>
                        <hr>

                        <form id="createPackage" method="post" action="{{ route('dashboard.department.store') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" placeholder="Department Name" class="form-control"
                                       required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="code" placeholder="Department code" class="form-control"
                                       required>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success btn-block">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
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
    <script type="text/javascript"
            src="{{ asset('admin/assets/plugins/dataTable/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript"
            src="{{ asset('admin/assets/plugins/dataTable/DataTables-1.10.18/js/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        var url = "{{ route('dashboard.department.index') }}";
        //
        // Pipelining function for DataTables. To be used to the `ajax` option of DataTables
        //
        $.fn.dataTable.ext.classes.sPageButton = 'page-item';
        $.fn.dataTable.pipeline = function (opts) {
            // Configuration options
            var conf = $.extend({
                pages: 5,     // number of pages to cache
                url: "{{ route('dashboard.department.index') }}",      // script url
                data: null,   // function or object with parameters to send to the server
                              // matching how `ajax.data` works in DataTables
                method: 'GET' // Ajax HTTP method
            }, opts);

            // Private variables for storing the cache
            var cacheLower = -1;
            var cacheUpper = null;
            var cacheLastRequest = null;
            var cacheLastJson = null;

            return function (request, drawCallback, settings) {
                var ajax = true;
                var requestStart = request.start;
                var drawStart = request.start;
                var requestLength = request.length;
                var requestEnd = requestStart + requestLength;

                if (settings.clearCache) {
                    // API requested that the cache be cleared
                    ajax = true;
                    settings.clearCache = false;
                } else if (cacheLower < 0 || requestStart < cacheLower || requestEnd > cacheUpper) {
                    // outside cached data - need to make a request
                    ajax = true;
                } else if (JSON.stringify(request.order) !== JSON.stringify(cacheLastRequest.order) ||
                    JSON.stringify(request.columns) !== JSON.stringify(cacheLastRequest.columns) ||
                    JSON.stringify(request.search) !== JSON.stringify(cacheLastRequest.search)
                ) {
                    // properties changed (ordering, columns, searching)
                    ajax = true;
                }

                // Store the request for checking next time around
                cacheLastRequest = $.extend(true, {}, request);

                if (ajax) {
                    // Need data from the server
                    if (requestStart < cacheLower) {
                        requestStart = requestStart - (requestLength * (conf.pages - 1));

                        if (requestStart < 0) {
                            requestStart = 0;
                        }
                    }

                    cacheLower = requestStart;
                    cacheUpper = requestStart + (requestLength * conf.pages);

                    request.start = requestStart;
                    request.length = requestLength * conf.pages;

                    // Provide the same `data` options as DataTables.
                    if (typeof conf.data === 'function') {
                        // As a function it is executed with the data object as an arg
                        // for manipulation. If an object is returned, it is used as the
                        // data object to submit
                        var d = conf.data(request);
                        if (d) {
                            $.extend(request, d);
                        }
                    } else if ($.isPlainObject(conf.data)) {
                        // As an object, the data given extends the default
                        $.extend(request, conf.data);
                    }

                    settings.jqXHR = $.ajax({
                        "type": conf.method,
                        "url": conf.url,
                        "data": request,
                        "dataType": "json",
                        "cache": true,
                        "success": function (json) {
                            cacheLastJson = $.extend(true, {}, json);

                            if (cacheLower != drawStart) {
                                json.data.splice(0, drawStart - cacheLower);
                            }
                            if (requestLength >= -1) {
                                json.data.splice(requestLength, json.data.length);
                            }

                            drawCallback(json);
                        }
                    });
                } else {
                    json = $.extend(true, {}, cacheLastJson);
                    json.draw = request.draw; // Update the echo for each response
                    json.data.splice(0, requestStart - cacheLower);
                    json.data.splice(requestLength, json.data.length);

                    drawCallback(json);
                }
            }
        };

        // Register an API method that will empty the pipelined data, forcing an Ajax
        // fetch on the next draw (i.e. `table.clearPipeline().draw()`)
        $.fn.dataTable.Api.register('clearPipeline()', function () {
            return this.iterator('table', function (settings) {
                settings.clearCache = true;
            });
        });
        $(function () {
            var customFilter = $('#customFilters');
            var keyword = $(customFilter).find('input#keywords');
            var status = $(customFilter).find('select#status');
            var search = $(customFilter).find('button#search');
            console.log(keyword);
            var table = $('#dataTable').DataTable({
                "processing": true,
                "serverSide": true,
                "deferRender": true,
                "autoWidth": false,
                "bAutoWidth": false,
                "sPageButtonActive": "active",
                "ajax": {
                    'url': url,
                    pages: 5, // number of pages to cache
                    'data': function (data) {
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
                    {"data": "name"},
                    {"data": "code"},
                    {
                        "mRender": function (data, type, row) {
                            return "<a href='/dashboard/department/edit/" + row['id'] + "' class='btn btn-secondary btn-xs'><i class='fa fa-edit'></i></a> <a href='/dashboard/department/show/" + row['id'] + "' class='btn btn-warning btn-xs'><i class='fa fa-chart-line'></i></a>";
                        }
                    }
                ],
                "columnDefs": [
                    {"targets": [2], "searchable": false, "orderable": false, "visible": true}
                ],
                "order": [[0, 'asc']]
            });

            //Click on Search Button
            $(search).click(function (e) {
                table.draw();
            });

            //Custom Filters ( title search )
            $(keyword).keyup(function (event) {
                var keycode = (event.keyCode ? event.keyCode : event.which);
                // if(keycode == '13'){
                table.draw();
                // }
            });

            //Custom Filters ( Author search )
            $(status).change(function () {
                if ($(this).val() != '') {
                    table.draw();
                }
            });

            // $('#myModal').modal('show');

            function deleteLibraryItem(id) {
                var parent = $(this).parents('tr');
                var url = "{{ url('dashboard/library/delete/') }}/" + id;
                var data = null;
                var confirmed = confirm('Are you sure to delete this item?');
                if (confirmed) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "DELETE",
                        url: url,
                        data: data,
                        success: function (data, textStatus, xhr) {
                            if (data.success == true) {
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

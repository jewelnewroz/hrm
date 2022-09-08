@extends('layouts.app')

@section('actionToolBar')
    <a href="{{ route('role.create') }}" class="btn btn-primary float-right ml-2"><i class="fa fa-plus"></i> Add new</a>
@endsection

@section('content')
    <article class="content items-list-page">
        <div class="card items" style="padding: 15px">
            <div class="row">
                <div class="col-sm-12">
                    <div class="box">
                        <table class="table table-striped table-bordered" id="dataTable">
                            <thead>
                            <tr>
                                <th>
                                    <div>ID</div>
                                </th>
                                <th>
                                    <div>Name</div>
                                </th>
                                <th>
                                    <div>Permission</div>
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
                <div class="clearfix"></div>
            </div>
        </div>
    </article>
@endsection

@section('header')

@endsection

@section('footer')
    <script>
        var url = "{{ route('role.index') }}";
        //
        // Pipelining function for DataTables. To be used to the `ajax` option of DataTables
        //
        $.fn.dataTable.ext.classes.sPageButton = 'page-item';
        $(function () {
            var customFilter = $('#customFilters');
            var keyword = $(customFilter).find('input#keywords');
            var status = $(customFilter).find('select#status');
            var search = $(customFilter).find('button#search');
            console.log(keyword);
            var table = $('#dataTable').DataTable({
                "processing": true,
                "serverSide": true,
                "deferRender": false,
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
                "lengthChange": true,
                lengthMenu: [[15, 25, 50, 100, 500, -1], [15, 25, 50, 100, 500, "All"]],
                "oLanguage": {
                    "sLengthMenu": "Show _MENU_ ",
                },
                "pageLength": 15,
                "bFilter": false,
                "bInfo": true,
                "searching": false,
                "columns": [
                    {"data": "id"},
                    {"data": "name"},
                    {
                        "mRender": function (data, type, row) {
                            var str = '';
                            if (row['permissions'].length > 0) {
                                for (var i = 0; i < row['permissions'].length; i++) {
                                    str += '<span class="badge badge-primary">' + row['permissions'][i].name + '</span>';
                                }
                            }
                            return str;
                        }
                    }
                    ,
                    {
                        "mRender": function (data, type, row) {
                            return "<a href='/dashboard/manage/role/" + row['id'] + "/edit' class='btn btn-default btn-xs'><i class='fa fa-edit'></i> Edit</a>";
                        }
                    }
                ],
                "columnDefs": [
                    {"targets": [2, 3], "searchable": false, "orderable": false, "visible": true}
                ],
                "order": [[0, 'asc']],
                "buttons": []
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

        });
    </script>
@endsection

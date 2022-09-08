@extends('layouts.app')

@section('actionToolBar')
    <a href="{{ route('user.create') }}" class="btn btn-primary float-right ml-2"><i class="fa fa-plus"></i> Add new</a>
@endsection

@section('content')

    <article class="content items-list-page">
        <div class="card items p-2">
            <div class="col-sm-12">
                <div class="clearfix"></div>
                <div class="box" style="padding:15px 0;">
                    <table class="table table-striped table-bordered" id="dataTable">
                        <thead>
                        <tr>
                            <th>
                                <div>Name</div>
                            </th>
                            <th>
                                <div>Email</div>
                            </th>
                            <th>
                                <div>Mobile</div>
                            </th>
                            <th>
                                <div>Role</div>
                            </th>
                            <th>
                                <div>Status</div>
                            </th>
                            <th>
                                <div>Created at</div>
                            </th>
                            <th style="width:40px;v-align:middle;text-align:center;" class="align-middle">
                                <div>Action</div>
                            </th>
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

@endsection

@section('footer')
    <script>
        $(document).ready(function () {
            $("#PopS").popover({
                html: true
            }).on('shown.bs.popover', function () {
                $('#datetimepicker1').datetimepicker();
                $('#datetimepicker2').datetimepicker();
            });
        });
        let url = "{{ route('user.index') }}";
        $.fn.dataTable.ext.classes.sPageButton = 'page-item';

        $(function () {
            var customFilter = $('#customFilters');
            var keyword = $(customFilter).find('input#keywords');
            var area = $(customFilter).find('select#area');
            var package = $(customFilter).find('select#package');
            var status = $(customFilter).find('select#status');
            var role = $(customFilter).find('select#role');
            var search = $(customFilter).find('button#search');
            var table = $('#dataTable').DataTable({
                "processing": true,
                "serverSide": true,
                "deferRender": true,
                "bAutoWidth": false,
                "sPageButtonActive": "active",
                "ajax": {
                    'url': url,
                    pages: 5, // number of pages to cache
                    'data': function (data) {
                        // Read values
                        data.keyword = $(keyword).val();
                        data.area = $(area).val();
                        data.package = $(package).val();
                        data.role = $(role).val();
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
                    {"data": "name"},
                    {"data": "email"},
                    {"data": "mobile"},
                    {"data": "role"},
                    {"data": "status"},
                    {"data": "created_at"},
                    {
                        "mRender": function (data, type, row) {
                            let str = "<div class='btn-group'> <button class='btn btn-default btn-sm dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'><i class='fa fa-ellipsis-h' aria-hidden='true'></i></button> <div class='dropdown-menu dropdown-menu-right'> ";
                            str += "<a href='/dashboard/manage/user/" + row['id'] + "' class='dropdown-item'><i class='fa fa-eye'></i> View</a> ";
                            str += "<a href='/dashboard/manage/user/" + row['id'] + "/edit' class='dropdown-item'><i class='fa fa-edit'></i> Edit</a> ";
                            if (row['status'] != 'Active') {
                                str += "<a href='#' class='dropdown-item user-action' data-action='active' data-user-id='" + row['id'] + "'><i class='fa fa-check'></i> Active</a> ";
                            } else {
                                str += "<a href='#' class='dropdown-item user-action' data-action='deactive' data-user-id='" + row['id'] + "'><i class='fa fa-ban'></i> Deactive</a> ";
                            }
                            str += "</div> </div>";

                            return str;
                        }
                    }
                ],
                "columnDefs": [
                    {"targets": [6], "searchable": false, "orderable": false, "visible": true}
                ],
                "order": [[5, 'desc']],
                buttons: {!! json_encode(\App\Helper\CommonHelper::dataTableButtons(['copy', 'pdf','print', 'visibility'])) !!},
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
            $(area).change(function () {
                // var keycode = (event.keyCode ? event.keyCode : event.which);
                table.draw();
            });

            //Custom Filters ( Author search )
            $(package).change(function () {
                // var keycode = (event.keyCode ? event.keyCode : event.which);
                table.draw();
            });

            //Custom Filters ( Author search )
            $(role).change(function () {
                table.draw();
            });

            //Custom Filters ( Author search )
            $(status).change(function () {
                table.draw();
            });

            // $('#myModal').modal('show');

            // $('#myModal').modal('show');
            $('table').on('click', '.user-action', function (e) {
                e.defaultPrevented;
                console.log(this);
                var url = "{{ route('user.index') }}";
                var action = $(this).data('action');
                var id = $(this).data('user-id');
                if (action == 'request') {

                } else {
                    var data = {action: action, id: id};
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You are going to " + action + " this customer account.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes'
                    }).then((result) => {
                        if (result.value) {

                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            $.ajax({
                                type: "POST",
                                url: url,
                                data: data,
                                dataType: 'json',
                                success: function (response, textStatus, xhr) {
                                    table.draw();
                                    Toast.fire({
                                        icon: response.label,
                                        title: response.content
                                    });
                                }
                            });

                        }
                    });
                }
                return false;
            });
        });
    </script>
@endsection

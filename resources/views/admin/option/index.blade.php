@extends('layouts.app')

@section('content')
    <div class="content">
    <div class="row">
        <!-- column 2 -->
        <div class="col-sm-5">
            <h3><i class="fa fa-cubes"></i> Options</h3>
        </div>
        <div class="col-sm-7"></div>
    </div>
    <div class="row"><!-- center left-->
        <div class="col-md-12">

            <div class="row bhoechie-tab-container">
                    <div class="col-md-1 bhoechie-tab-menu">
                        <div class="list-group">
                            <a href="#"
                               class="list-group-item <?php if (!isset($_GET['tab']) || $_GET['tab'] == 'general') echo 'active'; ?> text-center">
                                <h4 class="fa fa-home"></h4><br/>General
                            </a>
                            <a href="#"
                               class="list-group-item <?php if (isset($_GET['tab']) && $_GET['tab'] == 'statement') echo 'active'; ?> text-center">
                                <h4 class="fa fa-file-pdf"></h4><br/>Statement
                            </a>

                            <a href="#"
                               class="list-group-item <?php if (isset($_GET['tab']) && $_GET['tab'] == 'billing') echo 'active'; ?> text-center">
                                <h4 class="fa fa-money-bill-wave"></h4><br/>Billing
                            </a>

                            <a href="#"
                               class="list-group-item <?php if (isset($_GET['tab']) && $_GET['tab'] == 'contact') echo 'active'; ?> text-center">
                                <h4 class="fa fa-hdd"></h4><br/>Mikrotik
                            </a>

                            <a href="#"
                               class="list-group-item <?php if (isset($_GET['tab']) && $_GET['tab'] == 'sms') echo 'active'; ?> text-center">
                                <h4 class="fa fa-phone"></h4><br/>SMS
                            </a>
                        </div>
                    </div>
                    <div class="col-md-10 bhoechie-tab">
                        <!-- flight section -->
                        <div class="bhoechie-tab-content <?php if (!isset($_GET['tab']) || $_GET['tab'] == 'general') echo 'active'; ?>">
                            <!-- General Tab-->
                            <h5>General Options</h5>
                            @include('admin/option/general')
                        </div>
                        <!-- flight section -->
                        <div class="bhoechie-tab-content <?php if (isset($_GET['tab']) && $_GET['tab'] == 'statement') echo 'active'; ?>">
                            <!-- General Tab-->
                            <h5>Statement Options</h5>
                            @include('admin/option/statement')
                        </div>

                        <!-- flight section -->
                        <div class="bhoechie-tab-content <?php if (isset($_GET['tab']) && $_GET['tab'] == 'billing') echo 'active'; ?>">
                            <!-- General Tab-->
                            <h5>Billings</h5>
                            @include('admin/option/billing')
                        </div>

                        <!-- train section -->
                        <div class="bhoechie-tab-content <?php if (isset($_GET['tab']) && $_GET['tab'] == 'mikrotik') echo 'active'; ?>">
                            <!-- Contact & About Tab-->
                            <h5>Mikrotik</h5>
                            @include('admin/option/mikrotik')
                        </div>

                        <!-- train section -->
                        <div class="bhoechie-tab-content <?php if (isset($_GET['tab']) && $_GET['tab'] == 'sms') echo 'active'; ?>">
                            <!-- Contact & About Tab-->
                            <h5>SMS Settings</h5>
                            @include('admin/option/sms')
                        </div>
                    </div>
            </div>

            {{--<div class="clearfix"></div>--}}
        </div><!--/col-->

    </div>
        @endsection

        @section('header')
            <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-tab.css') }}">
        @endsection

        @section('footer')
            <script>
                $(document).ready(function () {
                    $("div.bhoechie-tab-menu>div.list-group>a").click(function (e) {
                        e.preventDefault();
                        $(this).siblings('a.active').removeClass("active");
                        $(this).addClass("active");
                        var index = $(this).index();
                        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
                        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
                    });

                    $('#disableCustomerArtisanCall').click(function(e) {
                        e.defaultPrevented;
                        let confirmed = confirm('Are you sure to take this action? it will disable previous duel list customers.');
                        if(confirmed) {
                            $.ajax({
                                type: "POST",
                                url: "{{ route('customer.disable.artisan') }}",
                                data: null,
                                dataType: "json",
                                success: function(response) {
                                    Toast.fire({
                                        icon: response.label,
                                        title: response.content
                                    });
                                },
                                fail: function (error) {
                                    alert(error);
                                }
                            })
                        }
                    })
                });
            </script>

            <script>
                //call ajax for retrieve city
                $('.parent_category').on('change', function (e) {
                    var id = $(this).val();
                    var parent = $(this).parents('.parent');
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "POST",
                        url: "",
                        data: {category_id: id},
                        success: function (data) {
                            if(data=='')
                            {
                                console.log('id'+ id +' child '+ $(this).parents('.child_category').val());
                                $(parent).find('#child_category').html('');
                            }
                            else
                            {
                                var data = JSON.parse(data);
                                console.log(data);
                                $(parent).find('#child_category').html('');
                                $.each(data, function (key, value) {

                                    $(parent).find('#child_category').append('<option value="' + value.id + '">' + value.name + '</option>');
                                });
                            }


                        },
                        error: function (jqXHR, status, err) {
                            //alert(err);
                        }
                    });
                });

            </script>
<script type="text/javascript" src="{{ asset('js/jquery.upload.js') }}"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
      $('.jQFileUpload').click( function (e) {
        e.defaultPrevented;
        var jQUploadParent = $(this).parents('.uploadPrent');
        var modal = document.getElementById('myModal');
        var modalTitle = modal.querySelector('.modal-title');
        var modalBody = modal.querySelector('.modal-body');
        var role = this.getAttribute('role');
        modalTitle.innerHTML = "Upload " + role;
        modalBody.innerHTML = "";

        //create form
        var form = $("<form method='post' action='{{ route('dashboard.ajax.jqupload')}}' enqtype='multipart/form-data' charset='utf-8'></form>");
        var inputGroup = $('<div class="input-group"></div>');
        var inputGroupBtn = $('<span class="input-group-btn"></span>');
        var browsBtn = $('<button id="fake-file-button-browse" type="button" class="btn btn-default"></button>');
        var browsBtnIcon = $('<span class="fa fa-image"> Browse...</span>');
        $(browsBtn).append(browsBtnIcon);
        $(inputGroupBtn).append(browsBtn);
        $(inputGroup).append(inputGroupBtn);
        var fileInput = $('<input type="file" name="uploadfile" id="files-input-upload" style="display:none">');
        $(inputGroup).append(fileInput);
        var textInput = $('<input type="text" id="fake-file-input-name" disabled="disabled" placeholder="File not selected" class="form-control">');
        $(inputGroup).append(textInput);
        var inputGroupSubmit = $('<span class="input-group-btn"></span>');
        var submitBtn = $('<button type="submit" class="btn btn-default" disabled="disabled" id="fake-file-button-upload"></button>');
        var submitBtnIcon = $('<span class="fa fa-upload"></span>');

        $(submitBtn).append(submitBtnIcon);
        $(inputGroupSubmit).append(submitBtn);
        $(inputGroup).append(inputGroupSubmit);
        $(form).append(inputGroup);

        var progressParent = $('<div class="progress"></div>');
        var progressBar = $('<div class="bar"></div >');
        var progressPercent = $('<div class="percent">0%</div >');
        var progressStatus = $('<div id="status"></div>');
        $(progressParent).append(progressBar);
        $(progressParent).append(progressPercent);
        $(form).append(progressParent);
        $(form).append(progressStatus);
        $(modalBody).append(form);
        //click events
        $(browsBtn).click(function(e) {
          $(fileInput).click();
        });
        $(fileInput).on("change", function(e) {
          $(textInput).val($(this).val());
          $(submitBtn).removeAttr('disabled');
        });
        //csrf tockent send to header
        $(form).submit( function(e) {
          e.defaultPrevented;
          var bar = $('.bar');
          var percent = $('.percent');
          var status = $('#status');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
          $(this).ajaxSubmit({
            beforeSend: function() {
              status.empty();
              var percentVal = '0%';
              bar.width(percentVal);
              percent.html(percentVal);
            },
            uploadProgress: function(event, position, total, percentComplete) {
                var percentVal = percentComplete + '%';
                bar.width(percentVal);
                percent.html(percentVal);
            },
            success: function() {
                var percentVal = '100%';
                bar.width(percentVal)
                percent.html(percentVal);
            },
            complete: function(xhr){
              var msg = xhr.responseText;
              if( msg == 'no') {
                status.html("<div class='alert alert-warning'>Cannot upload files.</div>");
              } else {
                var fileInputField = jQUploadParent.find('input[name=' + role + ']');
                fileInputField.val(msg);
                var imgPreview = jQUploadParent.find('.imgPreview');
                imgPreview.html('<img src="' + msg + '" class="">');
                // progressParent.hide();
                $(modal).modal('hide');
              }
            }
          });

          return false;
        });
        $(modal).modal("show");
      });
    });
</script>
@endsection

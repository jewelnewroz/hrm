@extends('layouts.app')

@section('content')

    <article class="content items-list-page">
        <div class="card items">

            <div class="col-sm-12">
                <div class="clearfix"></div>
                <div class="box" style="padding:15px 0;">

                    <form action="{{ route('role.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Role name</label>
                            <input type="text" name="name" class="form-control" style="margin-bottom: 25px;"
                                   placeholder="Role name (ex. page-list)">
                        </div>
                        <div class="row">
                            @foreach( $permissions as $key => $lists )
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 box-item"  id="permissionParent">

                                    <div class="box-part">
                                        <div class="title">
                                            <h4><label><input type="checkbox" id="{{ $key }}" class="checkedAll"> {{ ucfirst( $key ) }}</label></h4>
                                        </div>

                                        <div class="text">
                                            @foreach( $lists as $list )
                                                <div class="form-check">
                                                    <label>
                                                        <input type="checkbox" class="checkedItem {{ $key }}" name="permission[]"
                                                               value="{{ $list->id }}"> <span
                                                            class="label-text">{{ ucwords( str_replace('-', ' ', $list->name ) ) }}</span>
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>

                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary pull-right" type="submit">Create role</button>
                        </div>
                    </form>
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
        jQuery(function ($) {
            $('.checkedAll').on('click', function (e) {
                let parent = $(this).parents('#permissionParent');
                console.log(parent);
                if($(this).is(':checked')) {
                    $(parent).find('.checkedItem').attr('checked', true)
                } else {
                    $(parent).find('.checkedItem').attr('checked', false)
                }
            })
        })
    </script>
@endsection

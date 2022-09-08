@extends('layouts.app')

@section('content')

    <article class="content items-list-page">
        <div class="card items">

            <div class="col-sm-12">
                <div class="clearfix"></div>
                <div class="box" style="padding:15px 0;">
                    <form action="{{ route('role.update', $role->id) }}" method="POST">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label>Role name</label>
                            <input type="text" name="name" value="{{ $role->name }}" class="form-control"
                                   style="margin-bottom: 25px;">
                        </div>
                        <div class="row">
                            @foreach( $permissions as $key => $lists )
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 box-item" id="permissionParent">
                                    <div class="box-part">
                                        <div class="title">
                                            <h4><label><input type="checkbox" class="checkedAll" id="{{ $key }}"> {{ ucfirst( $key ) }}</label></h4>
                                        </div>
                                        <div class="text">
                                            @foreach( $lists as $list )
                                                <div class="form-check">
                                                    <label>
                                                        <input type="checkbox" class="checkedItem {{ $key }}"
                                                               name="permission[]" value="{{ $list->id }}"
                                                               @if( in_array($list->id, $role->permissions->pluck('id')->toArray()) ) checked @endif>
                                                        <span
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
                            <button class="btn btn-primary pull-right" type="submit">Update role</button>
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

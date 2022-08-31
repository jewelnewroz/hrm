@extends('layouts.app')

@section('content')

                <article class="content items-list-page">
                    <div class="title-search-block">
                        <div class="title-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="title"> {{ $title }} <a href="{{ route('roles.create')}}" class="btn btn-primary btn-sm rounded-s"> Add New </a>
                                    </h3>
                                    <!-- <p class="title-description"> List of <a href="{{ route('dashboard.customer.index') }}">Active</a>, <a href="{{ route('dashboard.customer.index') }}">Pending</a>, <a href="{{ route('dashboard.customer.index') }}">Disabled</a> Customers</p> -->
                                </div>
                            </div>
                        </div>
                        <div class="items-search">
                          <a href="{{ route('role.index')}}" class="btn btn-secondary btn-sm rounded-s"><i class="fa fa-arrow-left"></i> Back </a>
                        </div>
                    </div>
                    <div class="card items">

                    <div class="col-sm-12">
                        <div class="clearfix"></div>
                        <div class="box" style="padding:15px 0;">
                            <form action="{{ route('roles.update', $role->id) }}" method="POST">
                                @csrf
                                {{ method_field('PUT') }}
                                <div class="form-group">
                                    <label>Role name</label>
                                    <input type="text" name="name" value="{{ $role->name }}" class="form-control" style="margin-bottom: 25px;">
                                </div>
                                <div class="row">
                                    @foreach( $permissions as $key => $lists )
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 box-item" id="permissionParent">
                                            <div class="box-part">
                                                <div class="title">
                                                    <h4><input type="checkbox" class="checkedAll" id="{{ $key }}"> {{ ucfirst( $key ) }}</h4>
                                                </div>
                                                <div class="text">
                                                    @foreach( $lists as $list )
                                                        <div class="form-check">
                                                            <label>
                                                                <input type="checkbox" class="checkedItem {{ $key }}"
                                                                       name="permission[]" value="{{ $list->id }}"
                                                                       @if( in_array($list->id, $rolePermissions) ) checked @endif>
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
<script>

</script>
@endsection

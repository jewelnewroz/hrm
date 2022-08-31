@extends('layouts.app')

@section('content')
                <article class="content items-list-page">
                    <div class="title-search-block">
                        <div class="title-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="title"> {{ $title ?? '' }} <a href="{{ route('dashboard.router.create')}}" class="btn btn-primary btn-sm rounded-s"> Add New </a>
                                        <div class="action dropdown">
                                            <button class="btn  btn-sm rounded-s btn-secondary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Manage </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                <a class="dropdown-item" href="#"><i class="fa fa-file-export icon"></i> Export</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#confirm-modal"><i class="fa fa-file-import icon"></i> Import</a>
                                            </div>
                                        </div>
                                    </h3>
                                    <!-- <p class="title-description"> List of <a href="{{ route('dashboard.customer.index') }}">Active</a>, <a href="{{ route('dashboard.customer.index') }}">Pending</a>, <a href="{{ route('dashboard.customer.index') }}">Disabled</a> Customers</p> -->
                                </div>
                            </div>
                        </div>
                        <div class="items-search" id="customFilters">
                        </div>
                    </div>
                    <div class="card items" style="padding: 15px">
                        <div class="box">
                            <table class="table table-striped table-bordered" id="dataTable">
                                <thead>
                                    <tr>
                                        <th><div>Branch</div></th>
                                        <th><div>Router name</div></th>
                                        <th><div>Host</div></th>
                                        <th><div>Port</div></th>
                                        <th><div>User</div></th>
                                        <th style="width:45px;"><div>Password</div></th>
                                        <th style="width:45px;"><div>Status</div></th>
                                        <th style="width:135px;v-align:middle;text-align:center;" class="align-middle"><div><i class="fa fa-wrench"></i></div></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $routers as $router )
                                    <tr>
                                        <td>{{ $router->branch['name'] }}</td>
                                        <td>{{ $router->router_name }}</td>
                                        <td>{{ $router->mktik_host }}</td>
                                        <td>{{ $router->mktik_port }}</td>
                                        <td>{{ $router->mktik_user }}</td>
                                        <td>********</td>
                                        <td>{{ ( $router->status ) ? 'Active' : 'Inactive' }}</td>
                                        <td>
                                            <a href="{{ route('dashboard.router.edit', $router->id)}}" class="btn btn-secondary"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('dashboard.router.reboot', $router->id) }}" class="btn btn-danger rebootRouter" title="Reboot router" data-id="{{ $router->id }}"><i class="fa fa-redo-alt"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
<script>
    jQuery(function($) {
        $('.rebootRouter').click(function(e) {
            e.defaultPrevented;
                alert('ok');
            return false;
        });
    })
</script>
@endsection

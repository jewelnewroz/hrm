@extends('layouts.app')

@section('content')

                <article class="content items-list-page">
                    <div class="title-search-block">
                        <div class="title-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="title"> {{ $title }}
                                    </h3>
                                    <!-- <p class="title-description"> List of <a href="{{ route('dashboard.customer.index') }}">Active</a>, <a href="{{ route('dashboard.customer.index') }}">Pending</a>, <a href="{{ route('dashboard.customer.index') }}">Disabled</a> Customers</p> -->
                                </div>
                            </div>
                        </div>
                        <div class="items-search">
                            <a href="{{ route('dashboard.router.index')}}" class="btn btn-secondary btn-sm rounded-s"><i class="fa fa-arrow-left"></i> Back </a>
                        </div>
                    </div>
                    <div class="card items">

                    <div class="col-sm-12">
                        <div class="clearfix"></div>
                        <div class="box" style="padding:15px 0;">
                            <form action="{{ route('dashboard.router.update', $router->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                              <div class="col-sm-5">

                                <div class="form-group float-label-control">
                                  <label for="">Branch</label>
                                    <select name="branch_id" class="form-control @if($errors->has('branch_id')) is-invalid @endif" required>
                                        <option value="">Select branch</option>
                                        @foreach( $branches as $k => $v )
                                        <option value="{{ $k }}" @if( $k == old('branch_id', $router->branch_id)) selected @endif>{{ $v }}</option>
                                        @endforeach
                                    </select>
                                      @if($errors->has('branch_id'))
                                      <div class="invalid-feedback" style="display:block;">
                                        {{ $errors->first('branch_id') }}
                                      </div>
                                      @endif
                                </div>
                                <div class="form-group float-label-control">
                                  <label for="router_name">Name</label>
                                  <input type="text" name="router_name" value="{{ old('router_name', $router->router_name) }}" class="form-control @if($errors->has('router_name')) is-invalid @endif" placeholder="Name" required>
                                      @if($errors->has('router_name'))
                                      <div class="invalid-feedback" style="display:block;">
                                        {{ $errors->first('router_name') }}
                                      </div>
                                      @endif
                                </div>
                                  <div class="form-group float-label-control">
                                      <label for="">Host</label>
                                      <input type="text" name="mktik_host" value="{{ old('mktik_host', $router->mktik_host) }}" class="form-control @if($errors->has('mktik_host')) is-invalid @endif" placeholder="Host (IP)" required>
                                      @if($errors->has('mktik_host'))
                                          <div class="invalid-feedback" style="display:block;">
                                              {{ $errors->first('mktik_host') }}
                                          </div>
                                      @endif
                                  </div>
                                  <div class="form-group float-label-control">
                                      <label for="">Port</label>
                                      <input type="text" name="mktik_port" value="{{ old('mktik_port', $router->mktik_port) }}" class="form-control @if($errors->has('mktik_port')) is-invalid @endif" placeholder="PORT)" required>
                                      @if($errors->has('mktik_port'))
                                          <div class="invalid-feedback" style="display:block;">
                                              {{ $errors->first('mktik_port') }}
                                          </div>
                                      @endif
                                  </div>
                                <div class="form-group float-label-control">
                                  <label for="">User</label>
                                  <input type="text" name="mktik_user" value="{{ old('mktik_user', $router->mktik_user) }}" class="form-control @if($errors->has('mktik_user')) is-invalid @endif" placeholder="User" required>
                                    @if($errors->has('mktik_user'))
                                    <div class="invalid-feedback" style="display:block;">
                                      {{ $errors->first('mktik_user') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group float-label-control">
                                  <label for="">Password</label>
                                  <input type="password" name="mktik_password" value="{{ old('mktik_password', $router->mktik_password) }}" class="form-control @if($errors->has('mktik_password')) is-invalid @endif" placeholder="Password" required>
                                    @if($errors->has('mktik_password'))
                                    <div class="invalid-feedback" style="display:block;">
                                      {{ $errors->first('mktik_password') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group float-label-control">
                                  <label for="">Status</label>
                                  <select class="form-control" name="status" required>
                                      <option value="1"  @if( old('status', $router->status) == 1) selected @endif>Active</option>
                                      <option value="0" @if( old('status', $router->status) == 0) selected @endif>Inactive</option>
                                  </select>
                                    @if($errors->has('status'))
                                    <div class="invalid-feedback" style="display:block;">
                                      {{ $errors->first('status') }}
                                    </div>
                                    @endif
                                </div>

                                <div class="form-group float-label-control">
                                  <button class="btn btn-primary btn-block" type="submit">Create area</button>
                                </div>

                              </div>
                              <div class="clearfix"></div>
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

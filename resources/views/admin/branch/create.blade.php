@extends('madmin.layout._layout')

@section('content')

                <article class="content items-list-page">
                    <div class="title-search-block">
                        <div class="title-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="title"> {{ $title }}
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="items-search">
                            <a href="{{ route('branch.index') }}" class="btn btn-secondary btn-sm rounded-s"><i class="fa fa-arrow-left"></i> Back </a>
                        </div>
                    </div>
                    <div class="card items">

                    <div class="col-sm-12">
                        <div class="clearfix"></div>
                        <div class="box" style="padding:15px 0;">
                            <form action="{{ route('branch.store') }}" method="POST">
                                @csrf
                                <input type="hidden" value="1" name="parent_id">
                              <div class="col-sm-5">
                                  <div class="form-group float-label-control">
                                      <label for="">Name</label>
                                      <input type="text" name="name" class="form-control @if($errors->has('name')) is-invalid @endif" value="{{ old('name') }}" placeholder="Name" required>
                                      @if($errors->has('name'))
                                          <div class="invalid-feedback" style="display:block;">
                                              {{ $errors->first('name') }}
                                          </div>
                                      @endif
                                  </div>

                                  <div class="form-group float-label-control">
                                      <label for="">Address line 1</label>
                                      <input type="text" name="address_line_1" class="form-control @if($errors->has('address_line_1')) is-invalid @endif" value="{{ old('address_line_1') }}" placeholder="Address" required>
                                      @if($errors->has('address_line_1'))
                                          <div class="invalid-feedback" style="display:block;">
                                              {{ $errors->first('address_line_1') }}
                                          </div>
                                      @endif
                                  </div>

                                  <div class="form-group float-label-control">
                                      <label for="">Address line 2</label>
                                      <input type="text" name="address_line_2" class="form-control @if($errors->has('address_line_2')) is-invalid @endif" value="{{ old('address_line_2') }}" placeholder="Address">
                                      @if($errors->has('address_line_2'))
                                          <div class="invalid-feedback" style="display:block;">
                                              {{ $errors->first('address_line_2') }}
                                          </div>
                                      @endif
                                  </div>

                                  <div class="form-group float-label-control">
                                      <label for="">Mobile</label>
                                      <input type="text" name="mobile" class="form-control @if($errors->has('mobile')) is-invalid @endif" value="{{ old('mobile') }}" placeholder="Mobile" required>
                                      @if($errors->has('mobile'))
                                          <div class="invalid-feedback" style="display:block;">
                                              {{ $errors->first('mobile') }}
                                          </div>
                                      @endif
                                  </div>

                                  <div class="form-group float-label-control">
                                      <label for="">Email</label>
                                      <input type="email" name="email" class="form-control @if($errors->has('email')) is-invalid @endif" value="{{ old('email') }}" placeholder="Email" required>
                                      @if($errors->has('email'))
                                          <div class="invalid-feedback" style="display:block;">
                                              {{ $errors->first('email') }}
                                          </div>
                                      @endif
                                  </div>

                                  <div class="form-group float-label-control">
                                      <label for="">City</label>
                                      <input type="text" name="city" class="form-control @if($errors->has('city')) is-invalid @endif" value="{{ old('city') }}" placeholder="City" required>
                                      @if($errors->has('city'))
                                          <div class="invalid-feedback" style="display:block;">
                                              {{ $errors->first('city') }}
                                          </div>
                                      @endif
                                  </div>

                                  <div class="form-group float-label-control">
                                      <label for="">Country</label>
                                      <input type="text" name="country" class="form-control @if($errors->has('country')) is-invalid @endif" value="{{ old('country') }}" placeholder="Country" required>
                                      @if($errors->has('country'))
                                          <div class="invalid-feedback" style="display:block;">
                                              {{ $errors->first('country') }}
                                          </div>
                                      @endif
                                  </div>

                                <div class="form-group float-label-control">
                                  <button class="btn btn-primary btn-block" type="submit">Create branch</button>
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

@extends('madmin.layout._layout')

@section('content')

                <article class="content items-list-page">
                    <div class="title-search-block">
                        <div class="title-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="title"><i class="fa fa-user-plus"></i> {{ $title }}
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="items-search" id="customFilters">
                            <form class="form-inline">
                                <div class="input-group">
                                    <a href="{{ route('dashboard.user.index') }}" class="btn btn-secondary rounded-s list-search-btn" id="search">
                                        <i class="fa fa-arrow-left"></i> Back
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <form name="item" id="customerForm" action="{{ route('dashboard.user.store')}}" method="POST">
                      @csrf
                      <div class="accordion" id="accordionExample">
                        <div class="card">
                          <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                              <button class="btn btn-link" type="button" style="color: #666;">
                                Account Information
                              </button>
                            </h2>
                          </div>

                          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            @if(count(array_intersect($errors->all(), ['name', 'mobile', 'email'])) > 0)
                              error found
                            @endif
                            <div class="card-body" style="border:1px solid #eee;">
                              <div class="row">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label for="branch_id">Branch</label>
                                      <select class="form-control @if($errors->has('branch_id')) is-invalid @endif" name="branch_id" id="branch_id" required>
                                        @if( $branches->count() > 1 )
                                        <option value="">Select branch</option>
                                        @endif
                                        @foreach( $branches as $branch )
                                        <option value="{{ $branch->id }}" @if(old('branch_id') == $branch->id) selected @endif>{{ $branch->name }}</option>
                                        @endforeach
                                      </select>
                                      @if($errors->has('branch_id'))
                                      <div class="invalid-feedback" style="display:block;">
                                        {{ $errors->first('branch_id') }}
                                      </div>
                                      @endif
                                    </div>
                                    <div class="form-group">
                                      <label>Name</label>
                                      <input type="text" id="firstName" name="name" class="form-control @if($errors->has('name')) is-invalid @endif" value="{{ old('name') }}" placeholder="First name">
                                      @if($errors->has('name'))
                                      <div class="invalid-feedback" style="display:block;">
                                        {{ $errors->first('name') }}
                                      </div>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Email</label>
                                      <input type="email" name="email" class="form-control @if($errors->has('email')) is-invalid @endif" value="{{ old('email') }}" placeholder="Email address">
                                      @if($errors->has('email'))
                                      <div class="invalid-feedback" style="display:block;">
                                        {{ $errors->first('email') }}
                                      </div>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="clearfix"></div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Father's Name</label>
                                      <input type="text" name="fathers_name" class="form-control @if($errors->has('fathers_name')) is-invalid @endif" value="{{ old('fathers_name') }}" placeholder="Father's name">
                                      @if($errors->has('fathers_name'))
                                      <div class="invalid-feedback" style="display:block;">
                                        {{ $errors->first('fathers_name') }}
                                      </div>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Mother's Name</label>
                                      <input type="text" name="mothers_name" class="form-control @if($errors->has('mothers_name')) is-invalid @endif" value="{{ old('mothers_name') }}" placeholder="Mother's name">
                                      @if($errors->has('mothers_name'))
                                      <div class="invalid-feedback" style="display:block;">
                                        {{ $errors->first('mothers_name') }}
                                      </div>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="clearfix"></div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Gender</label>
                                      <select class="form-control" name="gender" @if($errors->has('gender')) is-invalid @endif" >
                                        <option value="">Select</option>
                                        <option value="male" {{ ( old('gender') == 'male') ? 'selected':'' }}>Male</option>
                                        <option value="female" {{ ( old('gender') == 'female') ? 'selected':'' }}>Female</option>
                                        <option value="other" {{ ( old('gender') == 'other') ? 'selected':'' }}>Other</option>
                                      </select>
                                      @if($errors->has('gender'))
                                      <div class="invalid-feedback" style="display:block;">
                                        {{ $errors->first('gender') }}
                                      </div>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Mobile</label>
                                      <input type="text" name="mobile" class="form-control @if($errors->has('mobile')) is-invalid @endif" value="{{ old('mobile') }}" placeholder="Mobile">
                                      @if($errors->has('mobile'))
                                      <div class="invalid-feedback" style="display:block;">
                                        {{ $errors->first('mobile') }}
                                      </div>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="clearfix"></div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Role</label>
                                      <select class="form-control" name="role" @if($errors->has('role')) is-invalid @endif" >
                                        <option value="">Select</option>
                                        @foreach( $roles as $k => $v )
                                        <option value="{{ $k }}" @if(old('orle') == $k ) selected @endif>{{ $v }}</option>
                                        @endforeach
                                      </select>
                                      @if($errors->has('role'))
                                      <div class="invalid-feedback" style="display:block;">
                                        {{ $errors->first('role') }}
                                      </div>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Designation</label>
                                      <select class="form-control" name="designation_id" @if($errors->has('designation_id')) is-invalid @endif" >
                                        <option value="">Select</option>
                                        @foreach( $designations as $k => $v )
                                        <option value="{{ $k }}">{{ $v }}</option>
                                        @endforeach
                                      </select>
                                      @if($errors->has('designation_id'))
                                      <div class="invalid-feedback" style="display:block;">
                                        {{ $errors->first('designation_id') }}
                                      </div>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="clearfix"></div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Password</label>
                                      <input type="password" name="password" class="form-control @if($errors->has('password')) is-invalid @endif" value="{{ old('password') }}" placeholder="Password">
                                      @if($errors->has('password'))
                                      <div class="invalid-feedback" style="display:block;">
                                        {{ $errors->first('password') }}
                                      </div>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Password confirm</label>
                                      <input type="password" name="password_confirm" class="form-control @if($errors->has('password_confirm')) is-invalid @endif" value="{{ old('password_confirm') }}" placeholder="Password">
                                      @if($errors->has('password_confirm'))
                                      <div class="invalid-feedback" style="display:block;">
                                        {{ $errors->first('password_confirm') }}
                                      </div>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="clearfix"></div>
                                </div>
                                <div class="card-footer">
                                  <button class="btn btn-success" type="submit" style="color: #fff;">
                                    Create user
                                  </button>
                                </div>
                            </div>
                          </div>
                        </div>


                        </div>
                    </form>
                  </article>
@endsection

@section('header')

@endsection

@section('footer')

@endsection
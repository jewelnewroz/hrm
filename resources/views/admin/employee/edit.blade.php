@extends('madmin.layout._layout')

@section('content')

                <article class="content items-list-page">
                    <div class="title-search-block">
                        <div class="title-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="title"><i class="fa fa-user-edit"></i> {{ $title }} <a href="{{ route('dashboard.customer.create')}}" class="btn btn-primary btn-sm rounded-s"> Add New </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="items-search" id="customFilters">
                            <form class="form-inline">
                                <div class="input-group">
                                    <a href="{{ route('dashboard.customer.index') }}" class="btn btn-secondary rounded-s list-search-btn" id="search">
                                        <i class="fa fa-arrow-left"></i> Back
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <form name="item" action="{{ route('dashboard.customer.update', $customer->id) }}" method="POST">
                      @method('PUT')
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
                            <div class="card-body" style="border:1px solid #eee;">
                              <div class="row">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>First Name</label>
                                      <input type="text" name="first_name" class="form-control" value="{{ $customer->user['first_name'] }}" placeholder="First name">
                                      @if($errors->has('first_name'))
                                      <div class="invalid-feedback" style="display:block;">
                                        {{ $errors->first('first_name') }}
                                      </div>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Last Name</label>
                                      <input type="text" name="last_name" class="form-control" value="{{ $customer->user['last_name'] }}" placeholder="Last name">
                                      @if($errors->has('last_name'))
                                      <div class="invalid-feedback" style="display:block;">
                                        {{ $errors->first('last_name') }}
                                      </div>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="clearfix"></div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Userame</label>
                                      <input type="text" name="username" class="form-control" value="{{ $customer->user['username'] }}" placeholder="Username" readonly>
                                      @if($errors->has('username'))
                                      <div class="invalid-feedback" style="display:block;">
                                        {{ $errors->first('username') }}
                                      </div>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Email</label>
                                      <input type="text" name="email" class="form-control" value="{{ $customer->user['email'] }}" placeholder="Email address">
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
                                      <label>Mobile</label>
                                      <input type="text" name="mobile" class="form-control" value="{{ $customer->user['mobile'] }}" placeholder="Mobile">
                                      @if($errors->has('mobile'))
                                      <div class="invalid-feedback" style="display:block;">
                                        {{ $errors->first('mobile') }}
                                      </div>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Password</label>
                                      <input type="password" name="password" class="form-control" placeholder="Password">
                                      @if($errors->has('password'))
                                      <div class="invalid-feedback" style="display:block;">
                                        {{ $errors->first('password') }}
                                      </div>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="clearfix"></div>
                                </div>
                                <div class="card-footer">
                                  <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseThree" style="color: #666;">
                                    Next
                                  </button>
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="card">
                          <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                              <button class="btn btn-link" type="button" style="color: #666;">
                                Customer Information
                              </button>
                            </h2>
                          </div>
                          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body" style="border:1px solid #eee;">
                              <div class="row">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Zonal Name</label>
                                      <select class="form-control @if($errors->has('zone_id')) is-invalid @endif" name="zone_id">
                                        <option value="">Select zone</option>
                                        @foreach( $zones as $zone )
                                        <option value="{{ $zone->id }}" @if($zone->id == $customer->zone_id ) selected @endif>{{ $zone->name }}</option>
                                        @endforeach
                                      </select>
                                      @if($errors->has('zone_id'))
                                      <div class="invalid-feedback" style="display:block;">
                                        {{ $errors->first('zone_id') }}
                                      </div>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Area Name</label>
                                      <select class="form-control @if($errors->has('area_id')) is-invalid @endif" name="area_id">
                                        <option value="">Select area</option>
                                        @foreach( $areas as $area )
                                        <option value="{{ $area->id }}" @if($area->id == $customer->area_id ) selected @endif>{{ $area->name }}</option>
                                        @endforeach
                                      </select>
                                      @if($errors->has('area_id'))
                                      <div class="invalid-feedback" style="display:block;">
                                        {{ $errors->first('area_id') }}
                                      </div>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="clearfix"></div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Address</label>
                                      <input type="text" name="address" class="form-control" value="{{ $customer->user['address'] }}" placeholder="Address">
                                      @if($errors->has('address'))
                                      <div class="invalid-feedback" style="display:block;">
                                        {{ $errors->first('address') }}
                                      </div>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Connectivity Location</label>
                                      <input type="text" name="connectivity_location" class="form-control" value="{{ $customer->connectivity_location }}" placeholder="Connectivity location">
                                      @if($errors->has('connectivity_location'))
                                      <div class="invalid-feedback" style="display:block;">
                                        {{ $errors->first('connectivity_location') }}
                                      </div>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="clearfix"></div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Primary Contact</label>
                                      <input type="text" name="primary_contact" class="form-control" value="{{ $customer->primary_contact }}" placeholder="Primary contact">
                                      @if($errors->has('primary_contact'))
                                      <div class="invalid-feedback" style="display:block;">
                                        {{ $errors->first('primary_contact') }}
                                      </div>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Secondary Contact</label>
                                      <input type="text" name="secondary_contact" class="form-control" value="{{ $customer->secondary_contact }}" placeholder="Secondary contact">
                                      @if($errors->has('secondary_contact'))
                                      <div class="invalid-feedback" style="display:block;">
                                        {{ $errors->first('secondary_contact') }}
                                      </div>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="clearfix"></div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Remote address (IP)</label>
                                      <input type="text" name="remote_ip" class="form-control" value="{{ $customer->remote_ip }}" placeholder="IP address">
                                      @if($errors->has('remote_ip'))
                                      <div class="invalid-feedback" style="display:block;">
                                        {{ $errors->first('remote_ip') }}
                                      </div>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Physical Address (MAC)</label>
                                      <input type="text" name="remote_mac" class="form-control" value="{{ $customer->remote_mac }}" placeholder="MAC address">
                                      @if($errors->has('remote_mac'))
                                      <div class="invalid-feedback" style="display:block;">
                                        {{ $errors->first('remote_mac') }}
                                      </div>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="clearfix"></div>
                                </div>
                                <div class="card-footer">
                                  <button class="btn btn-secondary collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" style="color: #666;">
                                    <i class="fa fa-arrow-left"></i> Back to account information
                                  </button>
                                  <button class="btn btn-success pull-right" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="color: #666;">
                                    Next
                                  </button>
                                  <div class="clearfix"></div>
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="card">
                          <div class="card-header" id="headingThree">
                            <h2 class="mb-0">
                              <button class="btn btn-link" type="button" style="color: #666;">
                                Billing Information
                              </button>
                            </h2>
                          </div>
                          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="card-body" style="border:1px solid #eee;">
                              <div class="row">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Connection Type</label>
                                      <select class="form-control @if($errors->has('type')) is-invalid @endif" name="type">
                                        <option value="">Connection type</option>
                                        <option value="home" @if($customer->type == 'home') selected @endif>Home</option>
                                        <option value="store" @if($customer->type == 'store') selected @endif>Store</option>
                                        <option value="office" @if($customer->type == 'office') selected @endif>Office</option>
                                        <option value="bank" @if($customer->type == 'bank') selected @endif>Bank NGeo</option>
                                        <option value="govt-office" @if($customer->type == 'govt-office') selected @endif>Govt. Office</option>
                                      </select>
                                      @if($errors->has('type'))
                                      <div class="invalid-feedback" style="display:block;">
                                        {{ $errors->first('type') }}
                                      </div>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Package</label>
                                      <select class="form-control @if($errors->has('package_id')) is-invalid @endif" name="package_id" placeholder="Select package">
                                        @foreach( $packages as $package )
                                        <option value="{{ $package->id }}">{{ $package->name . ' ' . $package->type . ' (' . $package->price . ')'}}</option>
                                        @endforeach
                                      </select>
                                      @if($errors->has('package_id'))
                                      <div class="invalid-feedback" style="display:block;">
                                        {{ $errors->first('package_id') }}
                                      </div>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="clearfix"></div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Setup Charge</label>
                                      <input type="text" name="setup_charge" class="form-control" value="{{ $customer->setup_charge }}" placeholder="">
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Initial Dues</label>
                                      <input type="text" name="initial_dues" class="form-control" value="{{ $customer->initial_dues }}" placeholder="">
                                    </div>
                                  </div>
                                  <div class="clearfix"></div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Bill Payment way</label>
                                      <input type="text" name="payment_way" class="form-control" value="{{ $customer->payment_way }}" placeholder="">
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Billing Cycle Date</label>
                                      <input type="text" name="billing_cycle" class="form-control" value="{{ $customer->billing_cycle }}" placeholder="">
                                    </div>
                                  </div>
                                  <div class="clearfix"></div>
                                </div>
                                <div class="card-footer">
                                  <button class="btn btn-secondary collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="color: #666;">
                                    <i class="fa fa-arrow-left"></i> Back to customer information
                                  </button>
                                  <button class="btn btn-primary pull-right" type="submit" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="color: #666;">
                                    Update customer
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
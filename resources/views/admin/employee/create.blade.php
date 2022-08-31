@extends('layouts.app')

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
                                    <a href="{{ route('dashboard.customer.index') }}" class="btn btn-secondary rounded-s list-search-btn" id="search">
                                        <i class="fa fa-arrow-left"></i> Back
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <form name="item" id="customerForm" action="{{ route('dashboard.customer.store')}}" method="POST">
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
                            @if(count(array_intersect($errors->all(), ['first_name', 'mobile', 'username', 'email'])) > 0)
                              error found
                            @endif
                            <div class="card-body" style="border:1px solid #eee;">
                              <div class="row">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>First Name</label>
                                      <input type="text" id="firstName" name="first_name" class="form-control @if($errors->has('first_name')) is-invalid @endif" value="{{ old('first_name') }}" placeholder="First name">
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
                                      <input type="text" name="last_name" class="form-control @if($errors->has('last_name')) is-invalid @endif" value="{{ old('last_name') }}" placeholder="Last name">
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
                                      <label>Userame</label>
                                      <input type="text" name="username" class="form-control @if($errors->has('username')) is-invalid @endif" value="{{ old('username') }}" placeholder="Username">
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
                                      <label>Mobile</label>
                                      <input type="text" name="mobile" class="form-control @if($errors->has('mobile')) is-invalid @endif" value="{{ old('mobile') }}" placeholder="Mobile">
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
                                      <input type="password" name="password" class="form-control @if($errors->has('password')) is-invalid @endif" value="{{ old('password') }}" placeholder="Password">
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
                                  <button class="btn btn-success formNextStep" data-form-step="account" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseThree" style="color: #666;">
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
                                      <label>Department</label>
                                      <select class="form-control @if($errors->has('zone_id')) is-invalid @endif" name="zone_id">
                                        <option value="">Select department</option>
                                        @foreach( $departments as $zone )
                                        <option value="{{ $zone->id }}">{{ $zone->name }}</option>
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
                                      <label>Designation</label>
                                      <select class="form-control @if($errors->has('designation_id')) is-invalid @endif" name="designation_id">
                                        <option value="">Select designation</option>
                                        @foreach( $designations as $key => $designation )
                                        <option value="{{ $key }}">{{ $designation }}</option>
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
                                      <label>Address</label>
                                      <input type="text" name="address" class="form-control @if($errors->has('address')) is-invalid @endif" value="{{ old('address') }}" placeholder="Address">
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
                                      <input type="text" name="connectivity_location" class="form-control @if($errors->has('connectivity_location')) is-invalid @endif" value="{{ old('connectivity_location') }}" placeholder="Connection location">
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
                                      <input type="text" name="primary_contact" class="form-control @if($errors->has('primary_contact')) is-invalid @endif" value="{{ old('primary_contact') }}" placeholder="Primary contact">
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
                                      <input type="text" name="secondary_contact" class="form-control @if($errors->has('secondary_contact')) is-invalid @endif" value="{{ old('secondary_contact') }}" placeholder="Secondary contact">
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
                                      <input type="text" name="remote_ip" class="form-control @if($errors->has('remote_ip')) is-invalid @endif" value="{{ old('remote_ip') }}" placeholder="IP address">
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
                                      <input type="text" name="remdote_mac" class="form-control @if($errors->has('remdote_mac')) is-invalid @endif" value="{{ old('remdote_mac') }}" placeholder="Mac address">
                                      @if($errors->has('remdote_mac'))
                                      <div class="invalid-feedback" style="display:block;">
                                        {{ $errors->first('remdote_mac') }}
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
                                  <button class="btn btn-success pull-right formNextStep" data-form-step="customer" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="color: #666;">
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
                                        <option value="home">Home</option>
                                        <option value="store">Store</option>
                                        <option value="office">Office</option>
                                        <option value="bank">Bank NGeo</option>
                                        <option value="govt-office">Govt. Office</option>
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
                                    </div>
                                  </div>
                                  <div class="clearfix"></div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Setup Charge</label>
                                      <input type="text" name="setup_charge" class="form-control @if($errors->has('setup_charge')) is-invalid @endif" value="{{ old('setup_charge') }}" placeholder="Setup charge">
                                      @if($errors->has('setup_charge'))
                                      <div class="invalid-feedback" style="display:block;">
                                        {{ $errors->first('setup_charge') }}
                                      </div>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Initial Dues</label>
                                      <input type="text" name="initial_dues" class="form-control @if($errors->has('initial_dues')) is-invalid @endif" value="{{ old('initial_dues') }}" placeholder="Initial dues">
                                      @if($errors->has('initial_dues'))
                                      <div class="invalid-feedback" style="display:block;">
                                        {{ $errors->first('initial_dues') }}
                                      </div>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="clearfix"></div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Bill Payment way</label>
                                      <select class="form-control @if($errors->has('payment_way')) is-invalid @endif" name="payment_way">
                                        <option value="office-collect">Office collection</option>
                                        <option value="home-collect">Home collection</option>
                                      </select>
                                      @if($errors->has('payment_way'))
                                      <div class="invalid-feedback" style="display:block;">
                                        {{ $errors->first('payment_way') }}
                                      </div>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Billing Cycle Date</label>
                                      <input type="text" name="billing_cycle" class="form-control @if($errors->has('billing_cycle')) is-invalid @endif" value="{{ old('billing_cycle') }}" placeholder="Billing date">
                                      @if($errors->has('billing_cycle'))
                                      <div class="invalid-feedback" style="display:block;">
                                        {{ $errors->first('billing_cycle') }}
                                      </div>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="clearfix"></div>
                                </div>
                                <div class="card-footer">
                                  <button class="btn btn-secondary collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="color: #666;">
                                    <i class="fa fa-arrow-left"></i> Back to customer information
                                  </button>
                                  <button class="btn btn-success pull-right" type="submit" style="color: #666;">
                                    Create customer
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
<script type="text/javascript" src="{{ asset('assets/js/parsley.min.js')}}"></script>
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';

  var form = $('#customerForm');

  $('.formNextStep').click(function(e){
    var errCounter = 0;
    if( $(this).attr('data-form-step') == 'account' ) {
      var accSection = $('.form-control').parsley();
      if(!accSection.isValid()) {
        return false;
      }

    }
  });

})();
</script>
@endsection

@extends('layouts.app')

@section('content')

    <article class="content items-list-page">
        <form name="item" id="customerForm" action="{{ route('user.update', $user->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" style="color: #666;">
                                Account Information
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                         data-parent="#accordionExample">
                        @if(count(array_intersect($errors->all(), ['name', 'mobile', 'email'])) > 0)
                            error found
                        @endif
                        <div class="card-body" style="border:1px solid #eee;">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" id="firstName" name="name"
                                               class="form-control @if($errors->has('name')) is-invalid @endif"
                                               value="{{ $user->name }}" placeholder="First name">
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
                                        <input type="email" name="email"
                                               class="form-control @if($errors->has('email')) is-invalid @endif"
                                               value="{{ $user->email }}" placeholder="Email address">
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
                                        <input type="text" name="fathers_name"
                                               class="form-control @if($errors->has('fathers_name')) is-invalid @endif"
                                               value="{{ $user->fathers_name }}" placeholder="Father's name">
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
                                        <input type="text" name="mothers_name"
                                               class="form-control @if($errors->has('mothers_name')) is-invalid @endif"
                                               value="{{ $user->mothers_name }}" placeholder="Mother's name">
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
                                        <select class="form-control" name="gender"
                                                @if($errors->has('gender')) is-invalid @endif" >
                                        <option value="">Select</option>
                                        <option value="male" {{ ( $user->gender == 'male') ? 'selected' : '' }}>Male
                                        </option>
                                        <option value="female" {{ ( $user->gender == 'female') ? 'selected' : '' }}>
                                            Female
                                        </option>
                                        <option value="other" {{ ( $user->gender == 'other') ? 'selected' : '' }}>
                                            Other
                                        </option>
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
                                        <input type="text" name="mobile"
                                               class="form-control @if($errors->has('mobile')) is-invalid @endif"
                                               value="{{ ( !empty( old('mobile') ) ) ? old('mobile') : $user->mobile }}"
                                               placeholder="Mobile">
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
                                        <select class="form-control" name="role"
                                                @if($errors->has('role')) is-invalid @endif" >
                                        <option value="">Select</option>
                                        @foreach( $roles as $role )
                                            <option
                                                value="{{ $role->id }}" {{ ( $user->hasrole( $role->name ) ) ? 'selected' : '' }}>{{ $role->name }}</option>
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
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password"
                                               class="form-control @if($errors->has('password')) is-invalid @endif"
                                               placeholder="Password">
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
                                        <input type="password" name="password_confirm"
                                               class="form-control @if($errors->has('password_confirm')) is-invalid @endif"
                                               placeholder="Password">
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
                                <button class="btn btn-success pull-right" type="submit">Update</button>
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
        (function () {
            'use strict';

            var form = $('#customerForm');

            $('.formNextStep').click(function (e) {
                var errCounter = 0;
                if ($(this).attr('data-form-step') == 'account') {
                    var accSection = $('.form-control').parsley();
                    if (!accSection.isValid()) {
                        return false;
                    }

                }
            });

        })();
    </script>
@endsection

@extends('layouts.app')

@section('content')

                <article class="content items-list-page">
                    <div class="title-search-block">
                        <div class="title-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="title"> {{ $title }} <a href="{{ route('dashboard.customer.edit', $user->id)}}" class=""> <i class="fa fa-edit"></i> </a>
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
                    <div class="items">

                    <div class="col-sm-12">
                        <div class="clearfix"></div>
                        <div class="box" style="padding:0;">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Basic information</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile photo</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="password-tab" data-toggle="tab" href="#password" role="tab" aria-controls="password" aria-selected="false">Password change</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Activities</a>
                                </li>
                            </ul>
                             <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                  <table class="table table-striped">
                                    <tr>
                                      <th style="width:25%;">Name</th>
                                      <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                      <th>Username</th>
                                      <td>{{ $user->username }}</td>
                                    </tr>
                                    <tr>
                                      <th>Email</th>
                                      <td>{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                      <th>Mobile</th>
                                      <td>{{ $user->mobile }}</td>
                                    </tr>
                                    <tr>
                                      <th>Role</th>
                                      <td>{{ $user->roles[0]->role_name }}</td>
                                    </tr>
                                    <tr>
                                      <th>Designation</th>
                                      <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                      <th>Address</th>
                                      <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                      <th>Status</th>
                                      <td>{{ ( $user->status == 1 ) ? 'Active' : (($user->status == 0) ? 'Pending' : 'Inactive') }}</td>
                                    </tr>
                                  </table>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                                </div>
                                <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                                  <div class="col-md-7">
                                    <form method="post" action="{{ route('dashboard.user.password')}}">
                                      @csrf
                                      <div class="form-group">
                                        <input type="password" name="old_password" class="form-control" placeholder="Old Password">
                                      </div>
                                      <div class="form-group">
                                        <input type="password" name="old_password" class="form-control" placeholder="Password">
                                      </div>
                                      <div class="form-group">
                                        <input type="password" name="old_password" class="form-control" placeholder="Password confirm">
                                      </div>
                                      <div class="form-group">
                                        <button class="btn btn-primary btn-lg" type="submit">Change password</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

                                </div>
                            </div>
                        </div>
                      </div>
                    </div>


</article>
@endsection

@section('header')

@endsection

@section('footer')

@endsection

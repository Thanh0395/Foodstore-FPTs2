@extends('adminlayout.app')
@section('content')

            <div class="right_col" role="main">
                <!-- page content -->
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h2>User Create<small> (Khách hàng là thượng đế) </small></h2>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_content">
                                    {{-- De tai file qua form them dong vào the form: enctype="multipart/form-data" --}}
                                    <form action="{{route('admin.user.store')}}" method="POST" novalidate data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                                        @csrf
                                        <h3>Add user form</h3>
                                        {{-- User Name --}}
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">User Name
                                                <span style="color: red" class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control col-md-6 col-xs-12" name="name" placeholder="Enter your full name"
                                                    required="required" type="text">
                                            </div>
                                        </div>
                                        {{-- User Role --}}
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Role
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select name="role" id="" class="form-control col-md-6 col-xs-12" >
                                                    <option value="user" selected>User</option>
                                                    <option value="member">Member</option>
                                                    <option value="admin">Admin</option>
                                                </select>
                                            </div>
                                        </div>
                                        {{-- Email --}}
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email
                                                <span style="color: red" class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control col-md-6 col-xs-12" name="email" placeholder="For ex: email@gmail.com"
                                                    required="required" type="email"
                                                    data-parsley-type="email" data-parsley-id="email">
                                            </div>
                                        </div>
                                        {{-- Password --}}
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Password
                                                <span style="color: red" class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control col-md-6 col-xs-12" name="password" id="password" placeholder=""
                                                data-parsley-minlength="6" required="required" type="password">
                                            </div>
                                        </div>
                                        {{-- Confirm Password --}}
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="confirm_password">Confirm Password
                                                <span style="color: red" class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control col-md-6 col-xs-12" name="confirm_password" placeholder=""
                                                data-validate-linked="password" required="required" type="password">
                                            </div>
                                        </div>
                                        {{-- Phone type="text"--}}
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Phone
                                                <span style="color: red" class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control col-md-6 col-xs-12" name="phone" placeholder=""
                                                    required="required" type="text"
                                                    data-parsley-type="digits" data-parsley-minlength="10" data-parsley-maxlength="12" data-parsley-id="phone">
                                            </div>
                                        </div>
                                        {{-- Address --}}
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Address
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control col-md-6 col-xs-12" name="address" placeholder="" type="text">
                                            </div>
                                        </div>
                                        <div class="ln_solid"></div>
                                        {{-- Nút cancel và submit --}}
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <a href="{{ route('admin.user.index') }}" class="btn btn-primary">Cancel</a>
                                                <input type="submit" class="btn btn-success" value="Create">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /page content -->
            </div>

@endsection

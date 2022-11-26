@extends('adminlayout.app')
@section('content')
            <!-- /page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h2>User Update<small> (Khách hàng là thượng đế)</small></h2>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_content">
                                    {{-- De tai file qua form them dong vào the form: enctype="multipart/form-data" --}}
                                    <form action="{{route('admin.user.update',[$user->U_id])}}" method="POST" novalidate data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                                        @csrf
                                        <h3>Update user form</h3>
                                        <p>Remember: User's email is unique.</p>
                                        {{-- Name --}}
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">User Name
                                                <span style="color: red" class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control col-md-6 col-xs-12" name="name" value="{{$user->name}}"
                                                    required="required" type="text">
                                            </div>
                                        </div>
                                        {{-- User Role --}}
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Role</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select name="role" id="" class="form-control col-md-6 col-xs-12" required>
                                                    <option value="{{$user->role}}" selected>{{$user->role}}</option>
                                                    <option value="admin">admin</option>
                                                    <option value="user">user</option>
                                                </select>
                                            </div>
                                        </div>
                                        {{-- Email --}}
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email
                                                <span style="color: red" class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control col-md-6 col-xs-12" name="email" value="{{$user->email}}"
                                                    required="required" type="email"
                                                    data-parsley-type="email" data-parsley-id="email">
                                            </div>
                                        </div>
                                        {{-- Phone type="text"--}}
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Phone
                                                <span style="color: red" class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control col-md-6 col-xs-12" name="phone" value="{{$user->phone}}"
                                                    required="required" type="text"
                                                    data-parsley-type="digits" data-parsley-minlength="10" data-parsley-maxlength="12" data-parsley-id="phone">
                                            </div>
                                        </div>
                                        {{-- Address --}}
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Address
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control col-md-6 col-xs-12" name="address" value="{{$user->address}}" type="text">
                                            </div>
                                        </div>
                                        {{-- Password --}}
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Set New Password
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control col-md-6 col-xs-12" name="password" id="password" placeholder="Set new password here or not"
                                                data-parsley-minlength="6" type="password">
                                            </div>
                                        </div>
                                        {{-- Confirm Password --}}
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="confirm_password">Confirm Password
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control col-md-6 col-xs-12" name="confirm_password" placeholder="Confirm your password"
                                                data-validate-linked="password" type="password">
                                            </div>
                                        </div>
                                        <div class="ln_solid"></div>
                                        {{-- Nút cancel và submit --}}
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <a href="{{ route('admin.user.index') }}" class="btn btn-primary">Cancel</a>
                                                <input type="submit" class="btn btn-success" value="Update">
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

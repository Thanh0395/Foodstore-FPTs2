@extends('adminlayout.app')
@section('content')

        <div class="right_col" role="main">
            <!-- page content -->
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h2>User <small>(Khách hàng là thượng đế)</small></h2>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            {{-- Show entries và search cho table --}}
                            <div class="x_title">
                                <h3>All Users
                                    <a href="{{route('admin.user.create')}}" class="btn btn-success"> Add new </a>
                                </h3>
                                <div class="clearfix"></div>
                            </div>
                            @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade in">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                {{session('success')}}
                            </div>
                            @elseif (session('failure'))
                            <div class="alert alert-danger alert-dismissible fade in">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                {{session('failure')}}
                            </div>
                            @endif
                            {{-- /Show entries và search cho table --}}
                            <div class="x_content">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>User ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($users as $user)
                                        <tr>
                                            <td>{{$user->U_id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->role}}</td>
                                            <td>{{$user->phone}}</td>
                                            <td>{{$user->address}}</td>
                                            <td style="width: 30%;">
                                                <a class="btn btn-primary btn-xs" href="{{route('admin.user.view',[$user->U_id])}}">
                                                    <i class="fa fa-eye"></i> View
                                                </a>
                                                <a type="hidden" class="btn btn-warning btn-xs" href="{{route('admin.user.edit',[$user->U_id])}}" >
                                                    <i class="fa fa-pencil"></i> Edit
                                                </a>
                                                <button type="hidden" <?php if ($user->role == 'admin') echo "disabled"; ?>
                                                    class="btn btn-danger btn-xs" href="{{route('admin.user.delete',[$user->U_id])}}" onclick="return confirm ('Are you sure to want to delete this')">
                                                    <i class="fa fa-trash-o"></i> Delete
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->
        </div>

@endsection

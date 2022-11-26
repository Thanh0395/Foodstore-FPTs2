@extends('adminlayout.app')
@section('content')
    <div class="right_col" role="main">
        <!-- page content -->
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h2>Category <small> (Đa dạng chủng loại món)</small></h2>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        {{-- Show entries và search cho table --}}
                        <div class="x_title">
                            <h3>All categories
                                <a href="{{ route('admin.category.create') }}" class="btn btn-success"> Add new </a>
                            </h3>
                            <div class="clearfix"></div>
                        </div>
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade in">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">×</span>
                                </button>
                                {{ session('success') }}
                            </div>
                        @elseif (session('failure'))
                            <div class="alert alert-danger alert-dismissible fade in">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">×</span>
                                </button>
                                {{ session('failure') }}
                            </div>
                        @endif
                        {{-- /Show entries và search cho table --}}
                        <div class="x_content">
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $category->Cate_id }}</td>
                                            <td>{{ $category->Cate_name }}</td>
                                            <td style="width: 30%;">
                                                {{-- <a class="btn btn-primary btn-xs" href="{{route('admin.category.view',[$category->Cate_id])}}">
                                                    <i class="fa fa-eye"></i> View
                                                </a> --}}
                                                @if (session()->get('role') == 'admin')
                                                    <a class="btn btn-warning btn-xs"
                                                        href="{{ route('admin.category.edit', [$category->Cate_id]) }}">
                                                        <i class="fa fa-pencil"></i> Edit
                                                    </a>
                                                    <a class="btn btn-danger btn-xs"
                                                        href="{{ route('admin.category.delete', [$category->Cate_id]) }}"
                                                        onclick="return confirm ('Are you sure to want to delete this')">
                                                        <i class="fa fa-trash-o"></i> Delete
                                                    </a>
                                                @endif
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

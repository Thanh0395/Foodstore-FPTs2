@extends('adminlayout.app')
@section('content')
    <div class="right_col" role="main">
        <!-- page content -->
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h2>Post <small> (post make people know us)</small></h2>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        {{-- Show entries và search cho table --}}
                        <div class="x_title">
                            <h3>All Post
                                <a href="{{ route('admin.post.create') }}" class="btn btn-success"> Add new </a>
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
                            <form action="{{ route('admin.post.changestatus') }}" method="POST">
                                @csrf
                                <table id="datatable" class="table table-striped table-bordered">
                                    <div class="col-md-3 col-sm-3 col-xs-3">
                                        <select name="status" class="form-control">
                                            <option value="Publish">Change status to Publish</option>
                                            <option value="Draft">Change status to Draft</option>
                                        </select>
                                    </div>
                                    <input type="submit" class="btn btn-primary" href="" value="Update Status">
                                    <br><br>

                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" onclick="checkAll(this);"> Check</th>
                                            <th>Post ID</th>
                                            <th>Title</th>
                                            <th>Feature image</th>
                                            <th>Author</th>
                                            <th>Status</th>
                                            <th>Last update</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($posts as $post)
                                            <tr>
                                                <td><input type="checkbox" name="checkItem[]" id="{{ $post->P_id }}"
                                                        value="{{ $post->P_id }}">
                                                </td>
                                                <td>{{ $post->P_id }}</td>
                                                <td>{{ $post->title }}</td>
                                                <td><img src="{{ asset($post->feature_image_path) }}" width="100px"
                                                        height="100px"></td>
                                                <td>{{ $post->name }}</td>
                                                <td>{{ $post->status }}</td>
                                                <td>{{ $post->updated_at }}</td>
                                                <td style="width: 30%;">
                                                    <a class="btn btn-primary btn-xs"
                                                        href="{{ route('admin.post.view', [$post->P_id]) }}">
                                                        <i class="fa fa-eye"></i> View
                                                    </a>
                                                    @if (session()->get('role') == 'admin')
                                                        <a class="btn btn-warning btn-xs"
                                                            href="{{ route('admin.post.edit', [$post->P_id]) }}">
                                                            <i class="fa fa-pencil"></i> Edit
                                                        </a>
                                                        <a class="btn btn-danger btn-xs"
                                                            href="{{ route('admin.post.delete', [$post->P_id]) }}"
                                                            onclick="return confirm ('Are you sure to want to delete this')">
                                                            <i class="fa fa-trash-o"></i> Delete
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function checkAll(source) {
                var checkboxes = document.querySelectorAll('input[type="checkbox"]');
                for (var i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i] != source)
                        checkboxes[i].checked = source.checked;
                }
            }
        </script>
        <!-- /page content -->
    </div>
@endsection

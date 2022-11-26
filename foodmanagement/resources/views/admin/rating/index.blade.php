@extends('adminlayout.app')
@section('content')
    <div class="right_col" role="main">
        <!-- page content -->
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h2>Rating list </h2>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        {{-- Show entries và search cho table --}}
                        <div class="x_title">
                            <h3>All Foods have been reviewed </h3>
                            <div class="clearfix"></div>
                        </div>
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade in">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">×</span>
                                </button>
                                {{ session('success') }}
                            </div>
                        @endif
                        {{-- /Show entries và search cho table --}}
                        <div class="x_content">

                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Food name</th>
                                        <th>Rating</th>
                                        <th>Values</th>
                                        <th>Reviews</th>
                                        <th>Give a rating</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <script src="http://code.jquery.com/jquery-1.11.3.min.js" charset="utf-8"></script>
                                    <script src="{{ asset('build/js/rater.js') }}" charset="utf-8"></script>
                                    @foreach ($foods as $food)
                                        <tr>
                                            <?php
                                            $count = $count + 1;
                                            $rating = $food->rating;
                                            if ($food->rating == null) {
                                                $rating = 0;
                                            }
                                            ?>
                                            <td>{{ $count }}</td>
                                            <td>{{ $food->F_name }}</td>
                                            <td>
                                                <div id="myRated<?php echo $count; ?>"
                                                    style="font-size: 40px; color: #D6E22B;"></div>
                                                <script>
                                                    $(<?php echo "'#myRated" . $count . "'"; ?>).rate(
                                                        options = {
                                                            readonly: true,
                                                            initial_value: {{ $rating }},
                                                        }
                                                    );
                                                </script>
                                            </td>
                                            <td>{{ round($rating, 2) }}</td>
                                            <td>{{ $food->reviews }}</td>
                                            <td style="width: 30%;">
                                                <a class="btn btn-primary btn-xs" href="{{ route('admin.rating.add',[$food->F_name]) }}">
                                                    <i class="fa fa-star-o"> </i> Rate
                                                </a>
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

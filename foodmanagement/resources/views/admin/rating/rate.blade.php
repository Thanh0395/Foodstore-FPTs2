@extends('adminlayout.app')
@section('content')
    <div class="right_col" role="main">
        <!-- page content -->
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h2>Rating for us </h2>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            {{-- Form --}}
                            <form action="{{ route('admin.rating.rate') }}" method="POST"
                                class="form-horizontal form-label-left" data-parsley-validate >
                                @csrf
                                {{-- Food Name & description --}}
                                <div class="form-group">
                                    <h3>Food name: {{ $food->F_name }}</h3>
                                </div>
                                <div class="form-group">
                                    <p><strong>Description:</strong></p>
                                    <p>{{ $food->description }}</p>
                                </div>
                                {{-- script rating --}}
                                <script src="http://code.jquery.com/jquery-1.11.3.min.js" charset="utf-8"></script>
                                <script src="{{ asset('build/js/rater.js') }}" charset="utf-8"></script>
                                {{-- /script rating --}}
                                <div class="col-md-6 col-sm-6 col-xs-6" id="myRated"
                                    style="font-size: 40px; color: rgb(214, 226, 43);">
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6" style="padding: 8px 20px">
                                    <h3><input type="text" name="inputrating" id="inputrating" readonly
                                            style="border: none"></h3>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <label for="comment">Your comment: * </label>
                                        <input class="form-control col-md-6 col-xs-12" name="comment" placeholder=""
                                            required="required" type="text">
                                        <input type="text" name="F_name" value="{{ $food->F_name }}" hidden>
                                    </div>
                                </div>
                                {{-- Nút submit --}}
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-0">
                                        <input type="submit" class="btn btn-success" value="Summit">
                                    </div>
                                </div>
                            </form>
                            {{-- /Form --}}
                            <div class="clearfix"></div>
                            {{-- Comments --}}
                            <div>
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h3 class="col-md-6 col-sm-6 col-xs-6">Comments </h3>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                            </li>
                                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <ul class="list-unstyled msg_list">
                                            @if ($comments == 'null')
                                                <li>
                                                    <a>
                                                        This foods have no comment yet.
                                                    </a>
                                                </li>
                                            @else
                                                @foreach ($comments as $comment)
                                                    <li>
                                                        <a>
                                                            <span>
                                                                <span><strong>{{ $comment->name }}</strong></span>
                                                                <span class="time">{{ $comment->updated_at }}</span>
                                                            </span>
                                                            <span class="message">
                                                                {{ $comment->comment }}
                                                            </span>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            @endif

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            {{-- /Comments --}}
                        </div>

                        <script>
                            var options = {
                                max_value: 5,
                                step_size: 0.5,
                                initial_value: 5,
                                selected_symbol_type: 'utf8_star', // Must be a key from symbols
                                //   cursor: 'default',
                                //   readonly: false,
                                //   change_once: false, // Determines if the rating can only be set once
                                //   additional_data: {}, // Additional data to send to the server
                                update_input_field_name: $("#inputrating"),
                            }

                            $("#myRated").rate(options);
                        </script>

                        {{-- Image --}}
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Food Image</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="product-image">
                                        <img src="{{ asset($food->image) }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- / Image --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
    </div>
@endsection

@extends('adminlayout.app')
@section('content')
    <div class="right_col" role="main">
        <!-- page content -->
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h2>Tell us why?</h2>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div col-md-12 col-sm-12 col-xs-12>
                            <h3 class="prod_title"> Order's infomation</h3>
                            <p><strong>Name:</strong> {{ $User->name }}</p>
                            <p><strong>Phone:</strong> {{ $User->phone }}</p>
                            <p><strong>Address:</strong> {{ $User->address }}</p>
                        </div>

                        {{-- Reason not for cancel the order --}}
                        <div>
                            <form action="{{ route('admin.order.cancel') }}" method="POST" data-parsley-validate
                                class="form-horizontal">
                                @csrf
                                    <label class="form-group form-label col-md-12 col-xs-12" for="note">Reason for
                                        cancel:
                                        <span style="color: red" class="required">*</span>
                                    </label>
                                    <input  style="width: 50%" class="form-group form-control" name="note" placeholder=""
                                        required="required" type="text">
                                    <input class="form-group form-control col-md-6 col-xs-6" name="O_id" placeholder=""
                                        type="hidden" value="{{ $O_id }}">
                                {{-- Nút cancel và submit --}}
                                <div class="form-group" >
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="submit" class="btn btn-success" value="Submit">
                                        <a href="{{ route('admin.order.index') }}" class="btn btn-primary">Cancel</a>
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

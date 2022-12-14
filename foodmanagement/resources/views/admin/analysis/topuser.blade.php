@extends('adminlayout.app')
@section('content')
    @if (session()->get('role') == 'admin')
    <!-- chartjs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
    <!-- Chart.js -->
    {{-- <script src="{{asset('vendors/Chart.js/dist/Chart.min.js')}}"></script> --}}
        <div class="right_col" role="main">
            <!-- page content -->
            {{-- pie chart all time --}}
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="dashboard_graph">

                        <div class="row x_title">
                            <div class="col-md-6">
                                <h3>Top User in all times or modify here <i class="fa fa-arrow-right"></i></h3>
                            </div>
                            <div class="col-md-6">
                                <form action="{{ route('admin.analysis.topUser') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <label for="top">Top: </label>
                                    <select name="top" id="" style="width: 25%">
                                        <option value="{{ $top }}">{{ $top }}</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>&emsp;&emsp;
                                    <label for="top">Period: </label>
                                    <select name="period" id="" style="width: 25%">
                                        <option value="{{ $period }}">{{ $period }}</option>
                                        <option value="week">Last Week</option>
                                        <option value="month">Last Month</option>
                                        <option value="year">Last Year</option>
                                        <option value="All times">All times</option>
                                    </select>
                                    &emsp;&emsp;
                                    <input type="submit" class="btn btn-info btn-sm" value="Apply filter">
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <canvas id="TopQuantityChart"></canvas>
                            <h4 align=center>Total Quantity: @php
                                $sum = 0;
                                foreach ($topUserQuan as $user) {
                                    $sum += $user->total;
                                }
                                echo $sum;
                            @endphp dishes</h4>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <canvas id="TopRevenueChart"></canvas>
                            <h4 align=center>Total Revenue: @php
                                $sum = 0;
                                foreach ($topUserReve as $user) {
                                    $sum += $user->amount;
                                }
                                echo number_format($sum, 0, ',', '.');
                            @endphp vn??</h4>
                        </div>

                        <script>
                            const TopQuantityChart = new Chart(
                                document.getElementById('TopQuantityChart'), {
                                    type: 'pie',
                                    data: {
                                        labels: [
                                            @php
                                                $count = 0;
                                                foreach ($topUserQuan as $user) {
                                                    $count++;
                                                    if ($count <= $top) {
                                                        echo "'" . $user->email . "',";
                                                    }
                                                }
                                                echo "'The Remainder',";
                                            @endphp
                                        ],
                                        datasets: [{
                                            label: 'TopQuantityChart',
                                            backgroundColor: [
                                                '#29CBA9',
                                                '#FFDF33',
                                                '#AA61C8',
                                                '#E95E4F',
                                                '#39A7F0',
                                                '#395067',
                                            ],
                                            borderColor: '#fff',
                                            data: [
                                                @php
                                                    $sum = $topvalue = $count = 0;
                                                    foreach ($topUserQuan as $user) {
                                                        $count++;
                                                        $sum += $user->total;
                                                        if ($count <= $top) {
                                                            $topvalue += $user->total;
                                                            echo $user->total . ',';
                                                        }
                                                    }
                                                    echo $sum - $topvalue;
                                                @endphp
                                            ],
                                            hoverOffset: 20
                                        }]
                                    },
                                    options: {
                                        layout: {
                                            padding: 50
                                        }
                                    }
                                }

                            );
                        </script>

                        <script>
                            const TopRevenueChart = new Chart(
                                document.getElementById('TopRevenueChart'), {
                                    type: 'pie',
                                    data: {
                                        labels: [
                                            @php
                                                $count = 0;
                                                foreach ($topUserReve as $user) {
                                                    $count++;
                                                    if ($count <= $top) {
                                                        echo "'" . $user->email . "',";
                                                    }
                                                }
                                                echo "'The Remainder',";
                                            @endphp
                                        ],
                                        datasets: [{
                                            label: 'TopRevenueChart',
                                            backgroundColor: [
                                                '#97CD7A',
                                                '#3498DB',
                                                '#FF9400',
                                                '#F6BDF2',
                                                '#02FFD3',
                                                '#965922',
                                            ],
                                            borderColor: '#fff',
                                            data: [
                                                @php
                                                    $sum = $topvalue = $count = 0;
                                                    foreach ($topUserReve as $user) {
                                                        $count++;
                                                        $sum += $user->amount;
                                                        if ($count <= $top) {
                                                            $topvalue += $user->amount;
                                                            echo $user->amount . ',';
                                                        }
                                                    }
                                                    echo $sum - $topvalue;
                                                @endphp
                                            ],
                                            hoverOffset: 20
                                        }]
                                    },
                                    options: {
                                        layout: {
                                            padding: 50
                                        }
                                    }
                                }

                            );
                        </script>
                        <div class="clearfix"></div>
                    </div>
                </div>

            </div>
            <br />
            {{-- /pie chart all time --}}

            <!-- /page content -->
        </div>
    @elseif (session()->get('role') != 'admin')
        <div class="right_col" role="main">
            <!-- page content -->
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h2>Sorry, you don't have permission for this session <small></small></h2>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

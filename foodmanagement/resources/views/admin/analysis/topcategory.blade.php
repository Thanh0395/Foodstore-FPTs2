@extends('adminlayout.app')
@section('content')
    @if (session()->get('role') == 'admin')
        <div class="right_col" role="main">
            <!-- page content -->
            {{-- pie chart all time --}}
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="dashboard_graph">

                        <div class="row x_title">
                            <div class="col-md-6">
                                <h3>Top Category in all times</h3>
                            </div>
                            <div class="col-md-6">
                                {{-- <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                              <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                              <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                            </div> --}}
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <canvas id="TopQuantityChart"></canvas>
                            <h3 align=center>Total Quantity: @php
                                $sum = 0;
                                foreach ($topCateQuan as $Cate) {
                                    $sum += $Cate->total;
                                }
                                echo $sum;
                            @endphp dishes</h3>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <canvas id="TopRevenueChart"></canvas>
                            <h3 align=center>Total Revenue: @php
                                $sum = 0;
                                foreach ($topCateReve as $Cate) {
                                    $sum += $Cate->amount;
                                }
                                echo number_format($sum, 0, ',', '.');
                            @endphp vnđ</h3>
                        </div>

                        <script>
                            const TopQuantityChart = new Chart(
                                document.getElementById('TopQuantityChart'), {
                                    type: 'pie',
                                    data: {
                                        labels: [
                                            @php
                                                foreach ($topCateQuan as $category) {
                                                    echo "'" . $category->Cate_name . "',";
                                                }
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
                                                    foreach ($topCateQuan as $Cate) {
                                                        echo $Cate->total . ',';
                                                    }
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
                                                foreach ($topCateQuan as $category) {
                                                    echo "'" . $category->Cate_name . "',";
                                                }
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
                                                    foreach ($topCateReve as $Cate) {
                                                        echo $Cate->amount . ',';
                                                    }
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

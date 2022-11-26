@extends('adminlayout.app')
@section('content')
    <div class="right_col" role="main">
        <!-- page content -->
        {{-- pie chart all time --}}
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="dashboard_graph">

                    <div class="row x_title">
                        <div class="col-md-6">
                            <h3>The Revenue in the last 1 year</h3>
                        </div>
                    </div>

                    <div class="col-md-11 col-sm-11 col-xs-11">
                        <canvas id="TrendRevenueChart"></canvas>
                        <h4 align=center>Total Revenue: @php
                            $sum = 0;
                            foreach ($trendFoodReve as $food) {
                                $sum += $food->amount;
                            }
                            echo $sum;
                        @endphp vnđ</h4>
                    </div>

                    <script>
                        const TrendRevenueChart = new Chart(
                            document.getElementById('TrendRevenueChart'), {
                                type: 'scatter',
                                data: {
                                    datasets: [{
                                        label: 'Revenue',
                                        data: [
                                            @php
                                                foreach ($trendFoodReve as $food) {
                                                    echo "{x: '" .$food->created_at. "',";
                                                    echo  "y: " .$food->amount. "},";
                                                }
                                            @endphp
                                            ],
                                        showLine: true,
                                        fill: true,
                                        borderColor: 'rgb(124, 71, 246)',
                                        backgroundColor: 'rgba(124, 71, 246,0.2)'
                                    }, ]
                                },
                                options: {
                                    scales: {
                                        x: {
                                            type: 'time',
                                            time: {
                                                unit: 'month'
                                            }
                                        }
                                    },
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
@endsection

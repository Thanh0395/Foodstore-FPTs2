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
                            <h3>Top Food in all times or modify here <i class="fa fa-arrow-right"></i></h3>
                        </div>
                        <div class="col-md-6">
                            <form action="{{route('admin.analysis.topFood')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <label for="top">Top: </label>
                                <select name="top" id="" style="width: 25%">
                                    <option value="{{$top}}">{{$top}}</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>&emsp;&emsp;
                                <label for="top">Period: </label>
                                <select name="period" id="" style="width: 25%">
                                    <option value="{{$period}}">{{$period}}</option>
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
                            $sum =0;
                            foreach ($topFoodQuan as $food){
                                $sum += $food->total;
                            }
                            echo $sum;
                        @endphp dishes</h4>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <canvas id="TopRevenueChart"></canvas>
                        <h4 align=center>Total Revenue: @php
                            $sum =0;
                            foreach ($topFoodReve as $food){
                                $sum += $food->amount;
                            }
                            echo $sum;
                        @endphp vnđ</h4>
                    </div>

                    <script>
                        const TopQuantityChart = new Chart(
                            document.getElementById('TopQuantityChart'), {
                                type: 'pie',
                                data: {
                                    labels: [
                                        @php
                                        $count=0;
                                        foreach ($topFoodQuan as $food){
                                            $count++;
                                            if ($count <= $top){
                                                echo "'".$food->F_name."',";
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
                                                foreach ($topFoodQuan as $food){
                                                    $count++;
                                                    $sum += $food->total;
                                                    if ($count <= $top){
                                                        $topvalue += $food->total;
                                                        echo $food->total.",";
                                                    }
                                                }
                                                echo ($sum-$topvalue);
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
                                        $count=0;
                                        foreach ($topFoodReve as $food){
                                            $count++;
                                            if ($count <= $top){
                                                echo "'".$food->F_name."',";
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
                                                $sum = $topvalue =$count = 0;
                                                foreach ($topFoodReve as $food){
                                                    $count++;
                                                    $sum += $food->amount;
                                                    if ($count <= $top){
                                                        $topvalue += $food->amount;
                                                        echo $food->amount.",";
                                                    }
                                                }
                                                echo ($sum-$topvalue);
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
@endsection

<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="/{{ session()->get('avatar') }}" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2>{{ session()->get('name') }}</h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">
                            <li><a href="{{ route('admin') }}"><i class="fa fa-home"></i> Home </a>
                                <ul class="nav child_menu">

                                </ul>
                            </li>
                            <li><a href="#"><i class="fa fa-user"></i> Users <span
                                        class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{ route('admin.user.index') }}">All Users</a></li>
                                    <li><a href="{{ route('admin.user.create') }}">Add new user</a></li>

                                </ul>
                            </li>
                            <li><a href="#"><i class="fa fa-cutlery"></i> Foods <span
                                        class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{ route('admin.food.index') }}">All Foods</a></li>
                                    <li><a href="{{ route('admin.food.create') }}">Add New Food</a></li>
                                    <li><a href="{{ route('admin.category.index') }}">Category</a></li>
                                    <li><a href="{{ route('admin.rating.index') }}">Rating</a></li>
                                    <li><a href="{{ route('admin.wishlist.index') }}">Wishlist</a></li>

                                </ul>
                            </li>
                            <li><a><i class="fa fa-file-text"></i> Orders <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{ route('admin.order.index') }}">All Orders</a></li>
                                    <li><a href="{{ route('admin.order.showCancel') }}">Cancelled Orders</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="menu_section">
                        <h3>analysis</h3>
                        <ul class="nav side-menu">
                            <li><a><i class="fa fa-money"></i> Top <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{ route('admin.analysis.topCate') }}">Categories</a></li>
                                    <li><a href="{{ route('admin.analysis.topFoodIndex') }}">Food</a></li>
                                    <li><a href="{{ route('admin.analysis.topUserIndex') }}">Customer</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-line-chart"></i> Trend <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{ route('admin.analysis.trendRevenue') }}">Revenue</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /sidebar menu -->
            </div>
        </div>
    </div>
</div>

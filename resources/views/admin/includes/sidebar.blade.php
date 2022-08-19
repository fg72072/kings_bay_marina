<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper"><a href="index.html"><img class="img-fluid for-light" src="{{asset('front/img/footer-logo.png')}}" alt=""><img class="img-fluid for-dark" src="" alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid" src="../assets/images/logo/logo-icon.png" alt=""></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn"><a href="index.html"><img class="img-fluid" src="../assets/images/logo/logo-icon.png" alt=""></a>
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>
                    <!-- <li class="sidebar-list">
                         <label class="badge badge-success">2</label><a class="sidebar-link sidebar-title"
                            href="#"><i data-feather="home"></i><span class="lan-3">Product
                            </span></a>
                        <ul class="sidebar-submenu">
                            <li><a class="lan-4" href="{{url('admin/product/add')}}">Add</a></li>
                            <li><a class="lan-5" href="{{url('admin/product/list')}}">List</a></li>
                        </ul> 
                    </li> -->
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{url('admin/dashboard')}}" data-bs-original-title="" title=""><i data-feather="home"></i><span>Dashboard</span>
                            <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                        </a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{url('admin/category')}}" data-bs-original-title="" title=""><i data-feather="home"></i><span>Category</span>
                            <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                        </a></li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="#"><i data-feather="home"></i><span class="lan-3">Product
                            </span></a>
                        <ul class="sidebar-submenu">
                            <li><a class="lan-4" href="{{url('admin/product/add')}}">Add</a></li>
                            <li><a class="lan-5" href="{{url('admin/product')}}">List</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="#"><i data-feather="home"></i><span class="lan-3">Service
                            </span></a>
                        <ul class="sidebar-submenu">
                            <li><a class="lan-4" href="{{url('admin/service/add')}}">Add</a></li>
                            <li><a class="lan-5" href="{{url('admin/service')}}">List</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="#"><i data-feather="home"></i><span class="lan-3">Coupon
                            </span></a>
                        <ul class="sidebar-submenu">
                            <li><a class="lan-4" href="{{url('admin/coupon/add')}}">Add</a></li>
                            <li><a class="lan-5" href="{{url('admin/coupon')}}">List</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="#"><i data-feather="home"></i><span class="lan-3">Blog
                            </span></a>
                        <ul class="sidebar-submenu">
                            <li><a class="lan-4" href="{{url('admin/blog/add')}}">Add</a></li>
                            <li><a class="lan-5" href="{{url('admin/blog')}}">List</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list">
                        <label class="badge badge-success">{{$v_ads}}</label>
                        <a class="sidebar-link sidebar-title" href="#"><i data-feather="home"></i><span class="lan-3">Ads
                            </span></a>
                        <ul class="sidebar-submenu">
                            <!-- <li><a class="lan-4" href="{{url('admin/blog/add')}}">Add</a></li> -->
                            <li><a class="lan-5" href="{{url('admin/ads')}}">List</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="#"><i data-feather="home"></i><span class="lan-3">User
                            </span></a>
                        <ul class="sidebar-submenu">
                            <li><a class="lan-4" href="{{url('admin/user/add')}}">Add</a></li>
                            <li><a class="lan-5" href="{{url('admin/user')}}">List</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list">
                        <label class="badge badge-success">{{$v_order}}</label>
                        <a class="sidebar-link sidebar-title link-nav" href="{{url('admin/order')}}" data-bs-original-title="" title=""><i data-feather="home"></i><span>Order</span>
                            <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="#"><i data-feather="home"></i><span class="lan-3">Pages
                            </span></a>
                        <ul class="sidebar-submenu">
                            <li><a class="lan-4" href="{{url('admin/homepage')}}">Home</a></li>
                            <li><a class="lan-4" href="{{url('admin/aboutpage')}}">About Us</a></li>
                            <li><a class="lan-4" href="{{url('admin/contactpage')}}">Contact Us</a></li>


                            <!-- <li><a class="lan-4" href="{{url('admin/first')}}">First Section</a></li>
                            <li><a class="lan-4" href="{{url('admin/second')}}">Second Section</a></li>
                            <li><a class="lan-4" href="{{url('admin/third')}}">Third Section</a></li>
                            <li><a class="lan-4" href="{{url('admin/setting')}}">Setting Section</a></li> -->
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
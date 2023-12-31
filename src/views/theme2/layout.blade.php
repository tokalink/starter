<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>{{ env('APP_NAME', 'WEB') }}</title>
    <link rel="shortcut icon" href="/assets-admin/theme2/img/favicon.png">
    <link rel="stylesheet" href="/assets-admin/theme2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets-admin/theme2/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="/assets-admin/theme2/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="/assets-admin/theme2/plugins/feather/feather.css">
    <link rel="stylesheet" href="/assets-admin/theme2/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet"
        href="{{ url('assets-admin/theme1') }}/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="/assets-admin/theme3/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="/assets-admin/theme2/css/style.css">
    @yield('css')
</head>

<body>
    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
        <div class="header header-one">

            <!-- Sidebar Toggle -->
            <a href="javascript:void(0);" id="toggle_btn">
                <span class="toggle-bars">
                    <span class="bar-icons"></span>
                    <span class="bar-icons"></span>
                    <span class="bar-icons"></span>
                    <span class="bar-icons"></span>
                </span>
            </a>
            <!-- /Sidebar Toggle -->

            <!-- Search -->
            <div class="top-nav-search">
                <form>
                    <input type="text" class="form-control" placeholder="Search here">
                    <button class="btn" type="submit"><img src="/assets-admin/theme2/img/icons/search.svg"
                            alt="img"></button>
                </form>
            </div>
            <!-- /Search -->

            <!-- Mobile Menu Toggle -->
            <a class="mobile_btn" id="mobile_btn">
                <i class="fas fa-bars"></i>
            </a>
            <!-- /Mobile Menu Toggle -->

            <!-- Header Menu -->
            <ul class="nav nav-tabs user-menu">
                <li class="nav-item dropdown  flag-nav dropdown-heads">
                    <a class="nav-link" data-bs-toggle="dropdown" href="#" role="button">
                        <i class="fe fe-bell"></i> <span class="badge rounded-pill"></span>
                    </a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span class="notification-title">Notifications</span>
                            <a href="javascript:void(0)" class="clear-noti"> Clear All</a>
                        </div>
                        <div class="noti-content">
                            <ul class="notification-list">
                                <li class="notification-message">
                                    <a href="profile.html">
                                        <div class="media d-flex">
                                            <span class="avatar avatar-sm">
                                                <img class="avatar-img rounded-circle" alt=""
                                                    src="/assets-admin/theme2/img/profiles/avatar-02.jpg">
                                            </span>
                                            <div class="media-body">
                                                <p class="noti-details"><span class="noti-title">Brian Johnson</span>
                                                    paid the invoice <span class="noti-title">#DF65485</span></p>
                                                <p class="noti-time"><span class="notification-time">4 mins ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="profile.html">
                                        <div class="media d-flex">
                                            <span class="avatar avatar-sm">
                                                <img class="avatar-img rounded-circle" alt=""
                                                    src="/assets-admin/theme2/img/profiles/avatar-03.jpg">
                                            </span>
                                            <div class="media-body">
                                                <p class="noti-details"><span class="noti-title">Marie Canales</span>
                                                    has accepted your estimate <span
                                                        class="noti-title">#GTR458789</span></p>
                                                <p class="noti-time"><span class="notification-time">6 mins ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="profile.html">
                                        <div class="media d-flex">
                                            <div class="avatar avatar-sm">
                                                <span class="avatar-title rounded-circle bg-primary-light"><i
                                                        class="far fa-user"></i></span>
                                            </div>
                                            <div class="media-body">
                                                <p class="noti-details"><span class="noti-title">New user
                                                        registered</span></p>
                                                <p class="noti-time"><span class="notification-time">8 mins ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="profile.html">
                                        <div class="media d-flex">
                                            <span class="avatar avatar-sm">
                                                <img class="avatar-img rounded-circle" alt=""
                                                    src="/assets-admin/theme2/img/profiles/avatar-04.jpg">
                                            </span>
                                            <div class="media-body">
                                                <p class="noti-details"><span class="noti-title">Barbara Moore</span>
                                                    declined the invoice <span class="noti-title">#RDW026896</span></p>
                                                <p class="noti-time"><span class="notification-time">12 mins
                                                        ago</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="profile.html">
                                        <div class="media d-flex">
                                            <div class="avatar avatar-sm">
                                                <span class="avatar-title rounded-circle bg-info-light"><i
                                                        class="far fa-comment"></i></span>
                                            </div>
                                            <div class="media-body">
                                                <p class="noti-details"><span class="noti-title">You have received a
                                                        new message</span></p>
                                                <p class="noti-time"><span class="notification-time">2 days ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="notifications.html">View all Notifications</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item  has-arrow dropdown-heads ">
                    <a href="javascript:void(0);" class="win-maximize">
                        <i class="fe fe-maximize"></i>
                    </a>
                </li>
                <!-- User Menu -->
                <li class="nav-item dropdown">
                    <a href="javascript:void(0)" class="user-link  nav-link" data-bs-toggle="dropdown">
                        <span class="user-img">
                            <img src="/assets-admin/theme2/img/profiles/avatar-07.jpg" alt="img"
                                class="profilesidebar">
                            <span class="animate-circle"></span>
                        </span>
                        <span class="user-content">
                            <span
                                class="user-details text-{{ auth()->user()->role->style_color ?? '' }}">{{ auth()->user()->role->description ?? '-' }}</span>
                            <span class="user-name">{{ auth()->user()->name }}</span>
                        </span>
                    </a>
                    <div class="dropdown-menu menu-drop-user">
                        <div class="profilemenu">
                            <div class="subscription-menu">
                                <ul>
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0)">Profile</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/admin/settings">Settings</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="subscription-logout">
                                <ul>
                                    <li class="pb-0">
                                        <a class="dropdown-item" href="javascript:void(0)">Log Out</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

        <div class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <div class="sidebar-logo">
                    <a href="/admin">
                        <img src="{{ config('tokalink.logo_web') ?? '/assets-admin/theme2/img/logo.png' }}"
                            class="img-fluid logo" alt="">
                    </a>
                    <a href="/admin">
                        <img src="/assets-admin/theme2/img/logo-small.png" class="img-fluid logo-small"
                            alt="">
                    </a>
                </div>
            </div>

            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <!-- Main -->
                    <ul>
                        @php
                            // $activeRoute = request()->segment(2);
                            $activeRoute = $menu ?? '';
                        @endphp
                        @foreach (config('tokalink.menu') as $key => $menu)
                            @if (count($menu['child']) > 0)
                                <li class="menu-title text-primary" style="background-color: rgb(80 255 253 / 50%);">
                                    <span>{{ $key }}</span>
                                </li>
                                @foreach ($menu['child'] as $key2 => $menu2)
                                    @if (count($menu2['child']) > 0)
                                        <li class="submenu">
                                            <a href="#"><i class="{{ $menu2['icon'] }}"></i> <span>
                                                    {{ $key2 }} </span> <span class="menu-arrow"></span></a>
                                            <ul class="sub-menus">
                                                @foreach ($menu2['child'] as $key3 => $menu3)
                                                    <li><a class="{{ $activeRoute == str_replace(' ', '', $key3) ? 'active' : '' }}"
                                                            href="/{{ tokalink::getAdminPrefix() }}/{{ $menu3['route'] }}">{{ $key3 }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @else
                                        <li class="menu-item {{ $activeRoute == $menu2['route'] ? 'active' : '' }}"
                                            data-route="{{ $menu2['route'] }}">
                                            <a href="/{{ tokalink::getAdminPrefix() }}/{{ $menu2['route'] }}"><i
                                                    class="{{ $menu2['icon'] }}"></i>
                                                <span> {{ $key2 }} </span></a>
                                        </li>
                                    @endif
                                @endforeach
                            @else
                                <li class="menu-item active" data-route="{{ $menu['route'] }}">
                                    <a href="/{{ tokalink::getAdminPrefix() }}/{{ $menu['route'] }}"><i
                                            class="{{ $menu['icon'] }}"></i>
                                        <span> {{ $key }} </span></a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Sidebar -->

        <!-- Page Wrapper -->

        @yield('content')
        <!-- /Page Wrapper -->

        <!-- Add Asset -->
        <!--/Add Asset -->

        <!-- Delete Items Modal -->
        <div class="modal custom-modal fade" id="delete_modal" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Delete FAQ</h3>
                            <p>Are you sure want to delete?</p>
                        </div>
                        <div class="modal-btn delete-action">
                            <div class="row">
                                <div class="col-6">
                                    <button type="reset" data-bs-dismiss="modal"
                                        class="w-100 btn btn-primary paid-continue-btn">Delete</button>
                                </div>
                                <div class="col-6">
                                    <button type="submit" data-bs-dismiss="modal"
                                        class="w-100 btn btn-primary paid-cancel-btn">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Delete Items Modal -->

    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="/assets-admin/theme2/js/jquery-3.6.3.min.js"></script>
    <script src="/assets-admin/theme2/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('assets-admin/theme1') }}/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="/assets-admin/theme2/plugins/select2/js/select2.min.js"></script>
    <script src="/assets-admin/theme2/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="/assets-admin/theme2/plugins/moment/moment.min.js"></script>
    <script src="/assets-admin/theme2/js/bootstrap-datetimepicker.min.js"></script>
    <script src="/assets-admin/theme2/js/jquery-ui.min.js"></script>
    {{-- <script src="/assets-admin/theme3/plugins/summernote/summernote-bs4.min.js"></script> --}}
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <script src="/assets-admin/theme2/js/script.js"></script>
    <script>
        // document.addEventListener('DOMContentLoaded', function() {
        //     const menuItems = document.querySelectorAll('.menu-item');
        //     menuItems.forEach(function(item) {
        //         item.addEventListener('click', function() {
        //             menuItems.forEach(function(menuItem) {
        //                 menuItem.classList.remove('active');
        //             });
        //             this.classList.add('active');
        //             const route = this.getAttribute('data-route');
        //             document.cookie = `activeRoute=${route}`;
        //         });
        //     });
        //     const activeRoute = document.cookie.replace(/(?:(?:^|.*;\s*)activeRoute\s*=\s*([^;]*).*$)|^.*$/, '$1');
        //     if (activeRoute) {
        //         const activeItem = document.querySelector(`[data-route="${activeRoute}"]`);
        //         if (activeItem) {
        //             activeItem.classList.add('active');
        //         }
        //     }
        // });

        const rightSideViews = document.querySelector('.right-side-views');
        rightSideViews.classList.add('d-none');

        // ambil element dataTables_length dan beri display none pada sudo class ::before dan ::after
        const dataTables_length = document.querySelector('.dataTables_length');
        // dataTables_length?.style?.content = "none";
    </script>
    <script src="/assets-admin/theme2/plugins/apexchart/apexcharts.min.js"></script>
    <script src="/assets-admin/theme2/plugins/apexchart/chart-data.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('js')
</body>

</html>

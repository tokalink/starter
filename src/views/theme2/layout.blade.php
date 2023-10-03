<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Tokalink</title>
    <link rel="shortcut icon" href="/assets-admin/theme2/img/favicon.png">
    <link rel="stylesheet" href="/assets-admin/theme2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets-admin/theme2/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="/assets-admin/theme2/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="/assets-admin/theme2/plugins/feather/feather.css">
    <link rel="stylesheet" href="/assets-admin/theme2/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet"
        href="{{ url('assets-admin/theme1') }}/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet"
        href="{{ url('assets-admin/theme1') }}/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet"
        href="{{ url('assets-admin/theme1') }}/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
    <link rel="stylesheet" href="/assets-admin/theme3/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="/assets-admin/theme2/css/style.css">
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
                <!-- Flag -->
                {{-- <li class="nav-item dropdown has-arrow flag-nav">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button">
                        <img src="/assets-admin/theme2/img/flags/us1.png" alt=""
                            height="20"><span>English</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="/assets-admin/theme2/img/flags/us.png" alt=""
                                height="16"><span>English</span>
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="/assets-admin/theme2/img/flags/fr.png" alt=""
                                height="16"><span>French</span>
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="/assets-admin/theme2/img/flags/es.png" alt=""
                                height="16"><span>Spanish</span>
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="/assets-admin/theme2/img/flags/de.png" alt=""
                                height="16"><span>German</span>
                        </a>
                    </div>
                </li> --}}
                <!-- /Flag -->

                {{-- <li class="nav-item  has-arrow dropdown-heads ">
                    <a href="javascript:void(0);" class="toggle-switch">
                        <i class="fe fe-moon"></i>
                    </a>
                </li> --}}
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
                            <span class="user-details">Admin</span>
                            <span class="user-name">John Smith</span>
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
                        <img src="/assets-admin/theme2/img/logo.png" class="img-fluid logo" alt="">
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
                        {{-- <li class="submenu">
                            <a href="/admin"><i class="fe fe-home"></i>
                                <span> Dashboard </span></a>
                            </li> --}}
                        @foreach (config('tokalink.menu') as $key => $menu)
                            <li class="menu-title"><span>{{ $key }}</span></li>
                             
                            @if (count($menu['child']) > 0)
                                <li class="submenu">
                                    <a href="/admin"><i class="fe fe-home"></i>
                                        <span> Dashboard {{ $key }} </span></a>
                                </li>
                            @endif
                        @endforeach
                    </ul>


                    <!-- /Main -->

                    <!-- Customers -->
                    <ul>
                        <li class="menu-title"><span>Admin</span></li>
                        <li>
                            {{-- <li class="@if (Request::$title == 'Users' || Request::$title == 'Add User' || Request::$title == 'Edit User') ?? 'active' @endif"> --}}
                            <a href="/admin/users"><i class="fe fe-users"></i> <span>Users</span></a>
                        </li>
                        <li>
                            <a href="/admin/kontak"><i class="fe fe-command"></i> <span>Kontak</span></a>
                        </li>
                        <li>
                            <a href="/admin/berkala"><i class="fe fe-mail"></i> <span>Pesan Berkala</span></a>
                        </li>
                        {{-- <li>
                            <a href="javascript:void(0)"><i class="fe fe-file"></i> <span>Customer
                                    Details</span></a>
                        </li> --}}

                    </ul>
                    <!-- /Customers -->

                    <!-- User Management -->
                    {{-- <ul>
                        <li class="menu-title"><span>User Management</span></li>
                        <li class="submenu">
                            <a href="#"><i class="fe fe-user"></i> <span> Manage Users</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="add-user.html">Add User</a></li>
                                <li><a href="users.html">Users</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="roles-permission.html"><i class="fe fe-clipboard"></i> <span>Roles &
                                    Permission</span></a>
                        </li>
                        <li>
                            <a href="delete-account-request.html"><i class="fe fe-trash-2"></i> <span>Delete Account
                                    Request</span></a>
                        </li>
                    </ul> --}}
                    <!-- /User Management -->

                    <!-- Settings -->
                    <ul>
                        <li class="menu-title"><span>Settings</span></li>
                        <li>
                            <a href="/admin/settings"><i class="fe fe-settings"></i> <span>Settings</span></a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"><i class="fe fe-power"></i>
                                <span>Logout</span></a>
                        </li>
                    </ul>
                    <!-- /Settings -->

                </div>
            </div>
        </div>
        <!-- /Sidebar -->

        <!-- Page Wrapper -->

        @yield('content')
        <!-- /Page Wrapper -->

        <!-- Add Asset -->
        <div class="toggle-sidebar">
            <div class="sidebar-layout-filter">
                <div class="sidebar-header">
                    <h5>Filter</h5>
                    <a href="#" class="sidebar-closes"><i class="fa-regular fa-circle-xmark"></i></a>
                </div>
                <div class="sidebar-body">
                    <form action="#" autocomplete="off">
                        <!-- Customer -->
                        <div class="accordion" id="accordionMain1">
                            <div class="card-header-new" id="headingOne">
                                <h6 class="filter-title">
                                    <a href="javascript:void(0);" class="w-100" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true"
                                        aria-controls="collapseOne">
                                        Customer
                                        <span class="float-end"><i class="fa-solid fa-chevron-down"></i></span>
                                    </a>
                                </h6>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample1">
                                <div class="card-body-chat">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="checkBoxes1">
                                                <div class="form-custom">
                                                    <input type="text" class="form-control" id="member_search1"
                                                        placeholder="Search here">
                                                    <span><img src="/assets-admin/theme2/img/icons/search.svg"
                                                            alt="img"></span>
                                                </div>
                                                <div class="selectBox-cont">
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> Brian Johnson
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> Russell Copeland
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> Greg Lynch
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> John Blair
                                                    </label>
                                                    <!-- View All -->
                                                    <div class="view-content">
                                                        <div class="viewall-One">
                                                            <label class="custom_check w-100">
                                                                <input type="checkbox" name="username">
                                                                <span class="checkmark"></span> Barbara Moore
                                                            </label>
                                                            <label class="custom_check w-100">
                                                                <input type="checkbox" name="username">
                                                                <span class="checkmark"></span> Hendry Evan
                                                            </label>
                                                            <label class="custom_check w-100">
                                                                <input type="checkbox" name="username">
                                                                <span class="checkmark"></span> Richard Miles
                                                            </label>
                                                        </div>
                                                        <div class="view-all">
                                                            <a href="javascript:void(0);"
                                                                class="viewall-button-One"><span class="me-2">View
                                                                    All</span><span><i
                                                                        class="fa fa-circle-chevron-down"></i></span></a>
                                                        </div>
                                                    </div>
                                                    <!-- /View All -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Customer -->

                        <!-- Select Date -->
                        <div class="accordion" id="accordionMain2">
                            <div class="card-header-new" id="headingTwo">
                                <h6 class="filter-title">
                                    <a href="javascript:void(0);" class="w-100 collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="true"
                                        aria-controls="collapseTwo">
                                        Select Date
                                        <span class="float-end"><i class="fa-solid fa-chevron-down"></i></span>
                                    </a>
                                </h6>
                            </div>

                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample2">
                                <div class="card-body-chat">
                                    <div class="form-group">
                                        <label class="form-control-label">From</label>
                                        <div class="cal-icon">
                                            <input type="email" class="form-control datetimepicker"
                                                placeholder="DD-MM-YYYY">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">To</label>
                                        <div class="cal-icon">
                                            <input type="email" class="form-control datetimepicker"
                                                placeholder="DD-MM-YYYY">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Select Date -->

                        <!-- By Status -->
                        <div class="accordion" id="accordionMain3">
                            <div class="card-header-new" id="headingThree">
                                <h6 class="filter-title">
                                    <a href="javascript:void(0);" class="w-100 collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="true"
                                        aria-controls="collapseThree">
                                        By Status
                                        <span class="float-end"><i class="fa-solid fa-chevron-down"></i></span>
                                    </a>
                                </h6>
                            </div>

                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample3">
                                <div class="card-body-chat">
                                    <div id="checkBoxes2">
                                        <div class="form-custom">
                                            <input type="text" class="form-control" id="member_search2"
                                                placeholder="Search here">
                                            <span><img src="/assets-admin/theme2/img/icons/search.svg"
                                                    alt="img"></span>
                                        </div>
                                        <div class="selectBox-cont">
                                            <label class="custom_check w-100">
                                                <input type="checkbox" name="bystatus">
                                                <span class="checkmark"></span> All Invoices
                                            </label>
                                            <label class="custom_check w-100">
                                                <input type="checkbox" name="bystatus">
                                                <span class="checkmark"></span> Paid
                                            </label>
                                            <label class="custom_check w-100">
                                                <input type="checkbox" name="bystatus">
                                                <span class="checkmark"></span> Overdue
                                            </label>
                                            <label class="custom_check w-100">
                                                <input type="checkbox" name="bystatus">
                                                <span class="checkmark"></span> Draft
                                            </label>
                                            <label class="custom_check w-100">
                                                <input type="checkbox" name="bystatus">
                                                <span class="checkmark"></span> Recurring
                                            </label>
                                            <label class="custom_check w-100">
                                                <input type="checkbox" name="bystatus">
                                                <span class="checkmark"></span> Cancelled
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /By Status -->

                        <!-- Category -->
                        <div class="accordion accordion-last" id="accordionMain4">
                            <div class="card-header-new" id="headingFour">
                                <h6 class="filter-title">
                                    <a href="javascript:void(0);" class="w-100 collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFour" aria-expanded="true"
                                        aria-controls="collapseFour">
                                        Category
                                        <span class="float-end"><i class="fa-solid fa-chevron-down"></i></span>
                                    </a>
                                </h6>
                            </div>

                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                                data-bs-parent="#accordionExample4">
                                <div class="card-body-chat">
                                    <div id="checkBoxes3">
                                        <div class="selectBox-cont">
                                            <label class="custom_check w-100">
                                                <input type="checkbox" name="category">
                                                <span class="checkmark"></span> Advertising
                                            </label>
                                            <label class="custom_check w-100">
                                                <input type="checkbox" name="category">
                                                <span class="checkmark"></span> Food
                                            </label>
                                            <label class="custom_check w-100">
                                                <input type="checkbox" name="category">
                                                <span class="checkmark"></span> Repairs
                                            </label>
                                            <label class="custom_check w-100">
                                                <input type="checkbox" name="category">
                                                <span class="checkmark"></span> Software
                                            </label>
                                            <!-- View All -->
                                            <div class="view-content">
                                                <div class="viewall-Two">
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> Stationary
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> Medical
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> Designing
                                                    </label>
                                                </div>
                                                <div class="view-all">
                                                    <a href="javascript:void(0);" class="viewall-button-Two"><span
                                                            class="me-2">View All</span><span><i
                                                                class="fa fa-circle-chevron-down"></i></span></a>
                                                </div>
                                            </div>
                                            <!-- /View All -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Category -->

                        <button type="submit"
                            class="d-inline-flex align-items-center justify-content-center btn w-100 btn-primary">
                            <span><img src="/assets-admin/theme2/img/icons/chart.svg" class="me-2"
                                    alt="Generate report"></span>Generate report
                        </button>
                    </form>

                </div>
            </div>
        </div>
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

    <!-- Bootstrap Core JS -->
    <script src="/assets-admin/theme2/js/bootstrap.bundle.min.js"></script>

    <!-- Datatable JS -->
    <!-- <script src="/assets-admin/theme2/plugins/datatables/datatables.js"></script> -->
    <script src="{{ url('assets-admin/theme1') }}/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

    <!-- select CSS -->
    <script src="/assets-admin/theme2/plugins/select2/js/select2.min.js"></script>

    <!-- Slimscroll JS -->
    <script src="/assets-admin/theme2/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Datepicker Core JS -->
    <script src="/assets-admin/theme2/plugins/moment/moment.min.js"></script>
    <script src="/assets-admin/theme2/js/bootstrap-datetimepicker.min.js"></script>

    <!-- multiselect JS -->
    <script src="/assets-admin/theme2/js/jquery-ui.min.js"></script>
    <script src="/assets-admin/theme3/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- Custom JS -->
    <script src="/assets-admin/theme2/js/script.js"></script>
    @yield('js')
</body>

</html>

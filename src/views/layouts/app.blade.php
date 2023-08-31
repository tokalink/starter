<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="{{url('tokalink-assets')}}/" data-template="vertical-menu-template">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>{{Auth::user()->name ?? '---'}}</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{url('tokalink-assets')}}/img/favicon/favicon.ico" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap" rel="stylesheet" />

  <!-- Icons -->
  <link rel="stylesheet" href="{{url('tokalink-assets')}}/vendor/fonts/fontawesome.css" />
  <link rel="stylesheet" href="{{url('tokalink-assets')}}/vendor/fonts/tabler-icons.css" />
  <link rel="stylesheet" href="{{url('tokalink-assets')}}/vendor/fonts/flag-icons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="{{url('tokalink-assets')}}/vendor/css/rtl/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="{{url('tokalink-assets')}}/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="{{url('tokalink-assets')}}/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="{{url('tokalink-assets')}}/vendor/libs/node-waves/node-waves.css" />
  <link rel="stylesheet" href="{{url('tokalink-assets')}}/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  <link rel="stylesheet" href="{{url('tokalink-assets')}}/vendor/libs/typeahead-js/typeahead.css" />
  <link rel="stylesheet" href="{{url('tokalink-assets')}}/vendor/libs/apex-charts/apex-charts.css" />
  <link rel="stylesheet" href="{{url('tokalink-assets')}}/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
  <link rel="stylesheet" href="{{url('tokalink-assets')}}/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
  <link rel="stylesheet" href="{{url('tokalink-assets')}}/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />

  <!-- Page CSS -->

  <!-- Helpers -->
  <script src="{{url('tokalink-assets')}}/vendor/js/helpers.js"></script>
  <script src="{{url('tokalink-assets')}}/js/config.js"></script>
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->
      <!-- jika ada layouts.navbar -->
      @if(View::exists('menu.sidebar-menu'))
      @include('menu.sidebar-menu')
      @else
      @include('tokalink::menu.sidebar-menu')
      @endif

      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->
        <!-- jika ada layouts.sidebar-menu -->
        @if(View::exists('menu.navbar-menu'))
        @include('menu.navbar-menu')
        @else
        @include('tokalink::menu.navbar-menu')
        @endif

        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->
          <div class="container-xxl flex-grow-1 container-p-y">
          @yield('content')
          </div>
          
          <!-- / Content -->

          <!-- Footer -->
          <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl">
              <div class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
                <div>
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made with ❤️ by <a href="https://pixinvent.com" target="_blank" class="fw-medium">Pixinvent</a>
                </div>
                <div class="d-none d-lg-inline-block">
                  <a href="https://themeforest.net/licenses/standard" class="footer-link me-4" target="_blank">License</a>
                  <a href="https://1.envato.market/pixinvent_portfolio" target="_blank" class="footer-link me-4">More Themes</a>

                  <a href="https://demos.pixinvent.com/vuexy-html-admin-template/documentation/" target="_blank" class="footer-link me-4">Documentation</a>

                  <a href="https://pixinvent.ticksy.com/" target="_blank" class="footer-link d-none d-sm-inline-block">Support</a>
                </div>
              </div>
            </div>
          </footer>
          <!-- / Footer -->

          <div class="content-backdrop fade"></div>
        </div>
        
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>

    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
  </div>
  <!-- / Layout wrapper -->

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->

  <script src="{{url('tokalink-assets')}}/vendor/libs/jquery/jquery.js"></script>
  <script src="{{url('tokalink-assets')}}/vendor/libs/popper/popper.js"></script>
  <script src="{{url('tokalink-assets')}}/vendor/js/bootstrap.js"></script>
  <script src="{{url('tokalink-assets')}}/vendor/libs/node-waves/node-waves.js"></script>
  <script src="{{url('tokalink-assets')}}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="{{url('tokalink-assets')}}/vendor/libs/hammer/hammer.js"></script>
  <script src="{{url('tokalink-assets')}}/vendor/libs/i18n/i18n.js"></script>
  <script src="{{url('tokalink-assets')}}/vendor/libs/typeahead-js/typeahead.js"></script>
  <script src="{{url('tokalink-assets')}}/vendor/js/menu.js"></script>

  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="{{url('tokalink-assets')}}/vendor/libs/apex-charts/apexcharts.js"></script>
  <script src="{{url('tokalink-assets')}}/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>

  <!-- Main JS -->
  <script src="{{url('tokalink-assets')}}/js/main.js"></script>

  <!-- Page JS -->
  <script src="{{url('tokalink-assets')}}/js/app-ecommerce-dashboard.js"></script>
  @yield('js')
</body>

</html>
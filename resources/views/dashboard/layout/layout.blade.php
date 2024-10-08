<!DOCTYPE html>
<html lang="en" dir="rtl">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('admin')}}/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{asset('admin')}}/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('admin')}}/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="{{asset('admin')}}/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{asset('admin')}}/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('admin')}}/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
      <link rel="stylesheet" href="{{asset('admin')}}/assets/select2-4.1.0-rc.0/dist/css/select2.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('admin')}}/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('admin')}}/assets/images/favicon.png" />
    <link rel="stylesheet" type="text/css" href="{{asset('admin')}}/dropify.css">
      <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

      <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
      <script>

          // Enable pusher logging - don't include this in production
          Pusher.logToConsole = true;

          var pusher = new Pusher('4c8ceab0128d63d5fe82', {
              cluster: 'ap1'
          });

          const channel = pusher.subscribe('place-order');
          channel.bind('user-order', function(data) {
              toastr.info(JSON.stringify(data.name) + 'Has Placed An Order')
          });
      </script>
</head>
<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
            @include('dashboard.layout.sidebar')
        <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            @yield('content')
        <!-- partial -->
        </div>
        <!-- main-panel ends -->
        </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('admin')}}/{{asset('admin')}}/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('admin')}}/{{asset('admin')}}/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="{{asset('admin')}}/{{asset('admin')}}/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="{{asset('admin')}}/{{asset('admin')}}/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="{{asset('admin')}}/{{asset('admin')}}/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="{{asset('admin')}}/{{asset('admin')}}/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <script src="{{asset('admin')}}/{{asset('admin')}}/assets/js/jquery.cookie.js" type="text/javascript"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('admin')}}/{{asset('admin')}}/assets/js/off-canvas.js"></script>
    <script src="{{asset('admin')}}/{{asset('admin')}}/assets/js/hoverable-collapse.js"></script>
    <script src="{{asset('admin')}}/{{asset('admin')}}/assets/js/misc.js"></script>
    <script src="{{asset('admin')}}/{{asset('admin')}}/assets/js/settings.js"></script>
    <script src="{{asset('admin')}}/{{asset('admin')}}/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{asset('admin')}}/{{asset('admin')}}/assets/js/dashboard.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- End custom js for this page -->
    <script src="{{asset('admin')}}/dropify.js"></script>
    <script>
        $('.dropify').dropify();
    </script>
    <script src="{{asset('admin')}}/assets/select2-4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    @stack('script')

</body>
</html>

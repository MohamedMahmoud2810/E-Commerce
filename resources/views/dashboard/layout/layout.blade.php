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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('admin')}}/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('admin')}}/assets/images/favicon.png" />
    <link rel="stylesheet" type="text/css" href="{{asset('admin')}}/dropify.css">
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

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function){
            $('#table_id').datatable({
                processing:true;
            });
        }
    </script>
    @stack('script')

</body>
</html>

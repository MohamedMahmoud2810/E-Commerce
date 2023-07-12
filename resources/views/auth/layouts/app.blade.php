<!DOCTYPE html>
<html lang="en">
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
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('admin')}}/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('admin')}}/assets/images/favicon.png" />
</head>
<body class="rtl">
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <!-- endinject -->
    <script src="{{asset('admin')}}/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('admin')}}/assets/js/hoverable-collapse.js"></script>
    <script src="{{asset('admin')}}/assets/js/off-canvas.js"></script>
    <script src="{{asset('admin')}}/assets/js/misc.js"></script>
    <script src="{{asset('admin')}}/assets/js/settings.js"></script>
    <script src="{{asset('admin')}}/assets/js/todolist.js"></script>
    <!-- endinject -->
</body>
</html>

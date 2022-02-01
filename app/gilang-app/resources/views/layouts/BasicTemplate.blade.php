<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Hanashi Coffee</title>
    <meta content="aplikasi kasir coffee shop hanashi" name="description">
    <meta content="coffee hanashi" name="keywords">

    @include('components.head')
    <!-- @notifyCss -->
    @toastr_css
</head>

<body>

    <!-- ======= Header ======= -->
    @include('components.header')
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @include('components.sidebar')
    <!-- End Sidebar-->

    <main id="main" class="main">
        @yield('content')


    </main><!-- End #main -->
    <a href="/template/#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <!-- <x:notify-messages />
    @notifyJs -->
    <script src="/template/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="/template/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/template/assets/vendor/chart.js/chart.min.js"></script>
    <script src="/template/assets/vendor/echarts/echarts.min.js"></script>
    <script src="/template/assets/vendor/quill/quill.min.js"></script>
    <script src="/template/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="/template/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="/template/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="/template/assets/js/main.js"></script>

    @jquery
    @toastr_js
    @toastr_render
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShopper -online Shop </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    @include('frontend.includes.style')
</head>

<body>
    <!-- Topbar Start -->

    @include('frontend.includes.header')
    <!-- Topbar End -->


    @yield('contant')


    <!-- Footer Start -->

    @include('frontend.includes.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->

    @include('frontend.includes.script')
</body>

</html>

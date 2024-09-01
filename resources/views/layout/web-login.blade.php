<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>Magic Port</title>
    <meta http-equiv="Content-Language" content="tr">
    <meta name="description" content="Magic Port">
    <meta name="keywords" content="Magic Port">
    <meta name="author" content="mesut arıcı">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <!-- Favicon -->


    <!-- Data table CSS -->
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>

    <!-- Custom CSS -->
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/sweetalert.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css"/>
</head>

<body>
<!--Preloader-->
<div class="preloader-it">
    <div class="la-anim-1"></div>
</div>
<!--/Preloader-->
<div class="wrapper  pa-0">

    <!-- Main Content -->
    @yield("content")
    <!-- /Main Content -->

</div>
<!-- /#wrapper -->
<!-- JavaScript -->
<!-- jQuery -->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/jasny-bootstrap.min.js')}}"></script>
<!-- Data table JavaScript -->
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/js/buttons.flash.js') }}"></script>
<script src="{{ asset('assets/js/jszip.min.js') }}"></script>
<script src="{{ asset('assets/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/js/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/js/buttons.print.min.js') }}"></script>
<!-- Slimscroll JavaScript -->
<script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>
<!-- Owl JavaScript -->
<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<!-- Switchery JavaScript -->
<script src="{{asset('assets/js/switchery.min.js')}}"></script>
<!-- Fancy Dropdown JS -->
<script src="{{asset('assets/js/dropdown-bootstrap-extended.js')}}"></script>
<script src="{{asset('assets/js/select2.full.min.js')}}"></script>
<!-- Init JavaScript -->
<script src="{{asset('assets/js/init.js')}}"></script>
<script src="{{asset('assets/js/sweetalert.js')}}"></script>

<script src="{{asset('assets/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/js/autocomplete.js')}}"></script>

@yield("script")
</body>

</html>

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
    <link href="{{ asset('assets/css/editor.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
<!--Preloader-->
<div class="preloader-it">
    <div class="la-anim-1"></div>
</div>
<!--/Preloader-->
<div class="wrapper  theme-1-active pimary-color-blue">
    <!-- Top Menu Items -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="mobile-only-brand pull-left">
            <div class="nav-header pull-left">
                <div class="logo-wrap">
                    <a href="{{route('home')}}">
                        <img class="brand-img" style="height: 25px;" src="{{asset('assets/images/logo.svg')}}"
                             alt="brand"/>
                        <span class="brand-text">Magic Port</span>
                    </a>
                </div>
            </div>
            <a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left"
               href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>

            <a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>
        </div>
        <div id="mobile_only_nav" class="mobile-only-nav pull-right">
            <ul class="nav navbar-right top-nav pull-right">
                <li class="dropdown auth-drp">
                    <a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img
                            src="{{asset('assets/images/user1.png') }}" alt="user_auth"
                            class="user-auth-img img-circle"/></a>
                    <ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX"
                        data-dropdown-out="flipOutX">
                        <li>
                            <a href="{{route('logout')}}"><i class="zmdi zmdi-power"></i><span>Logout</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- /Top Menu Items -->

    <!-- Left Sidebar Menu -->
    <div class="fixed-sidebar-left">
        <ul class="nav navbar-nav side-nav nicescroll-bar">
            <li class="navigation-header">
                <span>Menu</span>
                <i class="zmdi zmdi-more"></i>
            </li>


            <li>
                <a href="{{route('logout')}}">
                    <div class="pull-left">
                        <i class="fa fa-sign-out mr-20"></i><span class="right-nav-text">Logout</span>
                    </div>
                    <div class="pull-right"><i class="fa fa-angle-right"></i></div>
                    <div class="clearfix"></div>
                </a>
            </li>
        </ul>
    </div>
    <!-- /Left Sidebar Menu -->
    <!-- Main Content -->
    <div class="page-wrapper">
        <div class="container-fluid">
            <!-- Title -->
            <div class="row heading-bg">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h5 class="txt-dark">@yield("title")</h5>
                </div>
                <!-- Breadcrumb -->
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="{{route('home')}}">Home</a></li>
                        @yield('backUrl')
                        <li class="active"><span>@yield("title")</span></li>
                    </ol>
                </div>
                <!-- /Breadcrumb -->
            </div>
            <!-- /Title -->
            @yield("content")
            <!-- Footer -->
            <footer class="footer container-fluid pl-30 pr-30">
                <div class="row">
                    <div class="col-sm-12">
                        <p>2024 &copy; Magic Port Corp.</p>
                    </div>
                </div>
            </footer>
            <!-- /Footer -->
        </div>
    </div>
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
<script src="{{asset('assets/js/editor.js')}}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".select2").select2();

    $("#form").submit(function (e) {
        var postData = new FormData(this);
        var formURL = $(this).attr("action");
        $.ajax({
            url: formURL,
            type: "POST",
            data: postData,
            contentType: false,
            processData: false,
            beforeSend: function (data, textStatus, jqXHR) {
                $("#response").html('<div class="alert alert-warning alert-dismissable">\n' +
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' +
                    '<i class="fa fa-spinner fa-spin fa-2x"></i><p class="pull-left">Please wait...</p>' +
                    '<div class="clearfix"></div> </div>');
            },
            success: function (data, textStatus, jqXHR) {
                $("#response").html('');
                if (data.error) {
                    $("#response").html('<div class="alert alert-danger alert-dismissable">\n' +
                        '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                        '<i class="zmdi zmdi-block pr-15 pull-left"></i><p class="pull-left">Opps! ' + data.message + '</p>\n' +
                        '<div class="clearfix"></div></div>');
                } else {
                    swal({
                            title: data.message,
                            type: "success"
                        },
                        function () {
                            if (data.redirect)
                                window.location.href = data.redirect;
                        }
                    );
                }
            },
            error: function (data) {
                swal({
                    title: "Something went wrong",
                    text : data.responseJSON.message,
                    confirmButtonColor: "red",
                });
                return false;
            }
        });
        e.preventDefault(); //STOP default action
    });

    function Destroy(url, id) {
        swal({
            title: "Are you sure?",
            text: "You cannot undo this action.",
            type: "error",
            showCancelButton: true,
            confirmButtonColor: "red",
            confirmButtonText: "Yes, delete!",
            cancelButtonText: "Cancel",
            closeOnConfirm: false
        }, function () {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "DELETE",
                url: url,
                data: {
                    id: id,
                },
                success: function (data, textStatus, jqXHR) {
                    console.log(data);
                    swal({
                            title: "Ok",
                            text: "Record deleted successfully",
                            type: "success"
                        },
                        function () {
                            location.reload();
                        }
                    );

                },
                error: function (data) {
                    swal({
                        title: "Something went wrong!",
                        confirmButtonColor: "red",
                    });
                    return false;
                }
            });

        });
    }
</script>
@yield("script")
</body>

</html>

@extends('layout.web-login')
@section("content")
    <div class="page-wrapper pa-0 ma-0 auth-page">
        <div class="container-fluid">
            <!-- Row -->
            <div class="table-struct full-width full-height">
                <div class="table-cell vertical-align-middle auth-form-wrap">
                    <div class="auth-form  ml-auto mr-auto no-float">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="mb-30">
                                    <div class="logo-wrap text-center">
                                        <img class="brand-img mr-10" style="height:100px"
                                             src="{{asset('assets/images/logo.svg')}}" alt="logo"/>
                                    </div>
                                </div>
                                <div class="form-wrap">
                                    <form action="{{route('sign-in')}}" method="post" name="form" id="form"
                                          enctype="multipart/form-data">
                                        <div class="form-group">@csrf
                                            <label class="control-label mb-10" for="exampleInputEmail_2">Email</label>
                                            <input type="email" class="form-control" required name="email"
                                                   placeholder=" email">
                                        </div>
                                        <div class="form-group">
                                            <label class="pull-left control-label mb-10"
                                                   for="exampleInputpwd_2">password</label>
                                            <input type="password" class="form-control" required name="password"
                                                   placeholder="password ">

                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-primary  btn-rounded"><i
                                                    class="fa fa-sign-in"></i> Login
                                            </button>
                                        </div>
                                    </form>
                                    <div id="response"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Row -->
        </div>

    </div>
@endsection
@section("script")
    <script>
        $("#form").submit(function (e) {
            var postData = new FormData(this);
            var formURL = $(this).attr("action");
            $.ajax({
                url: formURL,
                type: "POST",
                data: postData,
                contentType: false,
                processData: false,
                beforeSend: function (data) {
                    $("#response").html('<div class="alert alert-warning alert-dismissable">\n' +
                        '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' +
                        '<i class="zmdi zmdi-alert-circle-o pr-15 pull-left"></i><p class="pull-left">Please Wait</p>' +
                        '<div class="clearfix"></div> </div>');
                },
                success: function (data) {
                    $("#response").html('<div class="alert alert-success alert-dismissable">\n' +
                        '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' +
                        '<i class="zmdi zmdi-alert-circle-o pr-15 pull-left"></i><p class="pull-left">' + data.message + '</p>' +
                        '<div class="clearfix"></div> </div>');

                    if (data.redirect) {
                        setTimeout(function () {
                            window.location.href = data.redirect;
                        }, 1000);
                    }
                },
                error: function (data) {
                    $("#response").html('<div class="alert alert-danger alert-dismissable">\n' +
                        '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' +
                        '<i class="zmdi zmdi-alert-circle-o pr-15 pull-left"></i><p class="pull-left">' + data.responseJSON.message + '</p>' +
                        '<div class="clearfix"></div> </div>');
                }
            });
            e.preventDefault(); //STOP default action
        });
    </script>
@endsection

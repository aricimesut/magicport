@extends('layout.web-login')
@section("up")
@section("content")
<div class="page-wrapper pa-0 ma-0 error-bg-img">
	<div class="container-fluid">
		<!-- Row -->
		<div class="table-struct full-width full-height">
			<div class="table-cell vertical-align-middle auth-form-wrap">
				<div class="auth-form  ml-auto mr-auto no-float">
					<div class="row">
						<div class="col-sm-12 col-xs-12">
							<div class="mb-30">
								<span class="block error-head text-center txt-primary mb-10">404</span>
								<span class="text-center nonecase-font mb-20 block error-comment">Page Not Found</span>
								<p class="text-center">The URL may be misplaced or the pahe you are looking is no longer available.</p>
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

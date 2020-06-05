@extends('wayshop.layouts.master')
@section('content')

<div class="contact-box-main">
	<div class="container">
		@if(Session::has('flash_message_error'))
                <div class="alert alert-sm alert-danger alert-block" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>{!! session('flash_message_error') !!}</strong>
                </div>
                @endif

                 @if(Session::has('flash_message_success'))
                <div class="alert alert-sm alert-success alert-block" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>{!! session('flash_message_success') !!}</strong>
                </div>
                @endif
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="contact-form-right">
					<h2>Change Password</h2>
					<form action="{{url('/change-password')}}" method="post" id="contactForm registerForm">
						{{csrf_field()}}
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input type="hidden" name="old_pwd" id="old_pwd" class="form-control" placeholder="Enter Your Old Password" required data-error="Please Enter Your Old Password ">
									<div class="help-block-with-errors"></div>
								</div>
							</div>
							
							<div class="col-md-12">
								<div class="form-group">
									<input type="password" name="current_password" id="current_password" class="form-control" placeholder="Enter Your Old Password" required data-error="Please Enter Your Old Password ">
									<div class="help-block-with-errors"></div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="password" name="new_pwd" id="new_pwd" class="form-control" placeholder="Enter New Password" required data-error="Please Enter Your New Password ">
									<div class="help-block-with-errors"></div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="submit-button text-center">
									<button class="btn hvr-hover" id="submit" type="submit">Save</button>
									<div id="msgSubmit" class="h3 text-center hidden"></div>
									<div class="clearfix"></div>
								</div>
								
							</div>
							
						</div>
						
					</form>
					
				</div>
			</div>
			<div class="col-md-3"></div>
			
		</div>
	</div>
	
</div>

@endsection
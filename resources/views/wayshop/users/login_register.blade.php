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
			<div class="col-lg-5 col-sm-12">
				<div class="contact-form-right">
					<h2>New User SignUp!</h2>
					<form action="{{url('/user-register')}}" method="post" id="contactForm registerForm">
						{{csrf_field()}}
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name" required data-error="Please Enter Your Name ">
									<div class="help-block-with-errors"></div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="email" name="email" id="email" class="form-control" placeholder="Enter Your Email" required data-error="Please Enter Your Email ">
									<div class="help-block-with-errors"></div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" required data-error="Please Enter Your Password ">
									<div class="help-block-with-errors"></div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="submit-button text-center">
									<button class="btn hvr-hover" id="submit" type="submit">Sign Up</button>
									<div id="msgSubmit" class="h3 text-center hidden"></div>
									<div class="clearfix"></div>
								</div>
								
							</div>
							
						</div>
						
					</form>
					
				</div>
			</div>
			<div class="col-lg-1 col-sm-12" id="or">
				OR
			</div>
			<div class="col-lg-5 col-sm-12">
				<div class="contact-form-right">
					<h2>Already A Member? Just SignIN!</h2>
					<form action="{{url('/user-login')}}" method="post" id="contactForm LoginForm">
						{{csrf_field()}}
						<div class="row">
							
							<div class="col-md-12">
								<div class="form-group">
									<input type="email" name="email" id="email" class="form-control" placeholder="Enter Your Email" required data-error="Please Enter Your Email ">
									<div class="help-block-with-errors"></div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" required data-error="Please Enter Your Password ">
									<div class="help-block-with-errors"></div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="submit-button text-center">
									<button class="btn hvr-hover" id="submit" type="submit">Login</button>
									<div id="msgSubmit" class="h3 text-center hidden"></div>
									<div class="clearfix"></div>
								</div>
								
							</div>
							
						</div>
						
					</form>
					
				</div>
			</div>
			
		</div>
	</div>
	
</div>

@endsection
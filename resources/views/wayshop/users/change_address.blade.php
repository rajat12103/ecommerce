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
					<h2>Change Address</h2>
					<form action="{{url('/change-address')}}" method="post" id="contactForm registerForm">
						{{csrf_field()}}
						<div class="row">
							
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" name="name" id="name" class="form-control"  value="{{$userDetails->name}}" required data-error="Please Enter Your Name ">
									<div class="help-block-with-errors"></div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" name="address" id="address" class="form-control" @if(!empty($userDetails->address)) value="{{$userDetails->address}}" @else placeholder="Enter Address" @endif required data-error="Please Enter Your Address ">
									<div class="help-block-with-errors"></div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" name="city" id="city" class="form-control" value="{{$userDetails->city}}" required data-error="Please Enter Your City ">
									<div class="help-block-with-errors"></div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" name="state" id="state" class="form-control" value="{{$userDetails->state}}" required data-error="Please Enter Your State ">
									<div class="help-block-with-errors"></div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<select name="country" id="country" class="form-control">
										<option value="1">Select Country</option>
										@foreach($countries as $country)
										<option value="{{$country->country_name}}" @if($country->country_name==$userDetails->country) selected @endif>{{$country->country_name}}</option>
										@endforeach
									</select>
									<div class="help-block-with-errors"></div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" name="pincode" id="pincode" class="form-control" value="{{$userDetails->pincode}}" required data-error="Please Enter Your Pincode ">
									<div class="help-block-with-errors"></div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="number" name="mobile" id="mobile" class="form-control" value="{{$userDetails->mobile}}" required data-error="Please Enter Your Mobile ">
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
@extends('wayshop.layouts.master')
@section("content")

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
                <form action="{{url('/checkout')}}" method="post" id="contactForm registerForm">
						{{csrf_field()}}
		<div class="row">
			<div class="col-lg-6 col-sm-12">
				<div class="contact-form-right">
					<h2>Bill To</h2>
					
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" name="billing_name" id="billing_name" class="form-control" placeholder="Billing Name" value="{{$userDetails->name}}" required data-error="Please Enter Billing Name ">
									<div class="help-block-with-errors"></div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" name="billing_address" id="billing_address" class="form-control" value="{{$userDetails->address}}" placeholder="Billing Address" required data-error="Please Enter Your Billing Address">
									<div class="help-block-with-errors"></div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" name="billing_city" id="billing_city" class="form-control" value="{{$userDetails->city}}" placeholder="Billing City" required data-error="Please Enter Billing City ">
									<div class="help-block-with-errors"></div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" name="billing_state" id="billing_state" class="form-control" value="{{$userDetails->state}}" placeholder="Billing State" required data-error="Please Enter Billing State ">
									<div class="help-block-with-errors"></div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<select name="billing_country" id="billing_country" class="form-control">
										<option value="1">Select Country</option>
										@foreach($countries as $country)
										<option value="{{$country->country_name}}" @if(!empty($userDetails->country) && $country->country_name==$userDetails->country) selected @endif>{{$country->country_name}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" name="billing_pincode" id="billing_pincode" value="{{$userDetails->pincode}}" class="form-control" placeholder="Billing Pincode" required data-error="Please Enter Billing Pincode ">
									<div class="help-block-with-errors"></div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" name="billing_mobile" id="billing_mobile" class="form-control" value="{{$userDetails->mobile}}" placeholder="Billing Mobile" required data-error="Please Enter Billing Mobile ">
									<div class="help-block-with-errors"></div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group" style="margin-left: 30px;">
									<input type="checkbox" class="form-check-input" placeholder="Billing State" id="billtoship">
									<label class="form-check-label" for="billtoship">Shipping Address Same As Billing Address</label>
								</div>
							</div>
							
							
						</div>
						
					
					
				</div>
			</div>
			
			<div class="col-lg-6 col-sm-12">
				<div class="contact-form-right">
					<h2>Ship To</h2>
					
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" name="shipping_name" id="shipping_name" class="form-control" @if(!empty($shippingDetails->name)) value="{{$shippingDetails->name}}" @else placeholder="Shipping Name" @endif required data-error="Please Enter Shipping Name ">
									<div class="help-block-with-errors"></div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" name="shipping_address" id="shipping_address" class="form-control" @if(!empty($shippingDetails->address)) value="{{$shippingDetails->address}}" @else placeholder="Shipping Address" @endif  required data-error="Please Enter Your Shipping Address">
									<div class="help-block-with-errors"></div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" name="shipping_city" id="shipping_city" class="form-control" @if(!empty($shippingDetails->city)) value="{{$shippingDetails->city}}" @else placeholder="Shipping City" @endif  required data-error="Please Enter Shipping City ">
									<div class="help-block-with-errors"></div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" name="shipping_state" id="shipping_state" class="form-control" @if(!empty($shippingDetails->state)) value="{{$shippingDetails->state}}" @else placeholder="Shipping State" @endif  required data-error="Please Enter Shipping State ">
									<div class="help-block-with-errors"></div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<select name="shipping_country" id="shipping_country" class="form-control">
										<option value="1">Select Country</option>
										@foreach($countries as $country)
										<option value="{{$country->country_name}}" @if(!empty($shippingDetails->country) && $country->country_name==$userDetails->country) selected @endif>{{$country->country_name}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" name="shipping_pincode" id="shipping_pincode" class="form-control" @if(!empty($shippingDetails->pincode)) value="{{$shippingDetails->pincode}}" @else placeholder="Shipping Pincode" @endif  required data-error="Please Enter Shipping Pincode ">
									<div class="help-block-with-errors"></div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" name="shipping_mobile" id="shipping_mobile" class="form-control" @if(!empty($shippingDetails->mobile)) value="{{$shippingDetails->mobile}}" @else placeholder="Shipping Mobile" @endif required data-error="Please Enter Shipping Mobile ">
									<div class="help-block-with-errors"></div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="submit-button text-center">
									<button class="btn hvr-hover" id="submit" type="submit">Checkout</button>
									<div id="msgSubmit" class="h3 text-center hidden"></div>
									<div class="clearfix"></div>
								</div>
								
							</div>
							
							
						</div>
						
					
					
				</div>
			
			</div>
			
		</div>
	</form>
	</div>
	
</div>

@endsection
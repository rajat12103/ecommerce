@extends('wayshop.layouts.master')
@section("content")

<div class="contact-box-main">
	<div class="container">
		
		<div class="row">
			<div class="col-lg-6 col-sm-12">
				<div class="contact-form-right">
					<h2>Billng Details</h2>
					
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									{{$userDetails->name}}
									
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									{{$userDetails->address}}
									
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									{{$userDetails->city}}
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									{{$userDetails->state}}
									
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
								{{$userDetails->country}}
									
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									{{$userDetails->pincode}}
									
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									{{$userDetails->mobile}}
									
								</div>
							</div>
							
							
							
						</div>
						
					
					
				</div>
			</div>
			
			<div class="col-lg-6 col-sm-12">
				<div class="contact-form-right">
					<h2>Shipping Details</h2>
					
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									{{$shippingDetails->name}}
									
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									{{$shippingDetails->address}}
									
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									{{$shippingDetails->city}}
									
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									{{$shippingDetails->state}}
									
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									{{$shippingDetails->country}}
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									{{$shippingDetails->pincode}}
									
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									{{$shippingDetails->mobile}}
									
								</div>
							</div>
							
						</div>
						
					
					
				</div>
			
			</div>
			
		</div>
	
	</div>
	
</div>

 <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Images</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach($userCart as $cart)
                                <tr>
                                    <td class="thumbnail-img">
                                        <a href="#">
									<img class="img-fluid" src="{{asset('/uploads/products/'.$cart->image)}}" alt="" />
								</a>
                                    </td>
                                    <td class="name-pr">
                                       {{$cart->product_name}}
                                       <p>{{$cart->product_code}} | {{$cart->size}}</p>
                                    </td>
                                    <td class="price-pr">
                                        <p>{{$cart->price}}</p>
                                    </td>
                                    <td class="quantity-box">
                                        <a href="{{url('/cart/update-quantity/'.$cart->id.'/1')}}" style="font-size: 25px;">+</a>
                                        <input type="text" size="4" value="{{$cart->quantity}}" min="0" step="1" class="c-input-text qty text">
                                        @if($cart->quantity>1)
                                        <a href="{{url('/cart/update-quantity/'.$cart->id.'/-1')}}" style="font-size: 25px;">-</a>
                                        @endif
                                    </td>
                                    <td class="total-pr">
                                        <p>Rs. {{$cart->price*$cart->quantity}}</p>
                                    </td>
                                    <td class="remove-pr">
                                        <a href="{{url('/cart/delete-product/'.$cart->id)}}">
									<i class="fas fa-times"></i>
								</a>
                                    </td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-sm-12">
                   <div class="order-box">
                        <h3>Your Total</h3>
                        <div class="d-flex">
                            <h4>Cart Sub Total</h4>
                            <div class="ml-auto font-weight-bold"> $ 130 </div>
                        </div>
                        <div class="d-flex">
                            <h4>Shipping Cost (+)</h4>
                            <div class="ml-auto font-weight-bold"> Free </div>
                        </div>
                        <hr class="my-1">
                        <div class="d-flex">
                            <h4>Coupon Discount (-)</h4>
                            <div class="ml-auto font-weight-bold"> $ 10 </div>
                        </div>
                        <hr>
                        <div class="d-flex gr-total">
                            <h5>Grand Total</h5>
                            <div class="ml-auto h5"> $ 388 </div>
                        </div>
                        <hr> </div>
                </div>
                
            </div>

            <form>
            	<hr class="mb-4">
            	<div class="title-left">
            		<h3>Payment</h3>
            	</div>
            	<div class="d-block my-3">
            		<div class="custom-control custom-radio">
            			<input id="credit" name="paymentMethod" type="radio" name="" class="custom-control-input" checked>
            			<label class="custom-control-label" for="credit">Cash On Delivery</label>
            		</div>
            		<div class="custom-control custom-radio">
            			<input id="debit" name="paymentMethod" type="radio" name="" class="custom-control-input" required>
            			<label class="custom-control-label" for="debit">Direct Bank Transfer</label>
            		</div>
            	</div>
            </form>

          

        </div>
    </div>
    <!-- End Cart -->

@endsection
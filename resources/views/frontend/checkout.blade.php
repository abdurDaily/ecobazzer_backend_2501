@extends('frontend.layout')
@section('frontend_contents')


<!-- ========== Start billing ========== -->
<section id="billing">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 billing_form">
                <div class="form_head">
                    <h4>Billing Information</h4>
                </div>
                <form action="">
                    <div class="row name_row">
                        <div class="col-lg-4 px-2">
                            <label for="f-name">
                                First name
                            </label>
                            <input type="text" placeholder="Your first name" id="f-name" required>
                        </div>
                        <div class="col-lg-4 px-2">
                            <label for="l-name">
                                Last name
                            </label>
                            <input type="text" placeholder="Your last name" id="l-name" required>
                        </div>
                        <div class="col-lg-4 px-2">
                            <label for="c-name">
                                Company Name <span class="option">(optional)</span>
                            </label>
                            <input type="text" placeholder="Company name" id="c-name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 px-2">
                            <label for="Address">Street Address</label>
                            <input type="text" id="Address" placeholder="Address">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 px-2">
                            <label for="country">
                                Country / Region
                            </label>
                            <select name="" id="" required>
                                <option value="" disabled selected>select</option>
                                <option value="">Bangladesh</option>
                                <option value="">India</option>
                                <option value="">USA</option>
                                <option value="">Pakistan</option>
                                <option value="">China</option>
                            </select>
                        </div>
                        <div class="col-lg-4 px-2">
                            <label for="country">
                                States
                            </label>
                            <select name="" id="" required>
                                <option value="" disabled selected>select</option>
                                <option value="">Chittagong</option>
                                <option value="">Dhaka</option>
                                <option value="">Rangpur</option>
                                <option value="">Barishal</option>
                                <option value="">Sylhet</option>
                            </select>
                        </div>
                        <div class="col-lg-4 px-2">
                            <label for="zip">Zip code</label>
                            <input type="text" placeholder="Zip code" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 px-2">
                            <label for="Email">Email</label>
                            <input type="text" placeholder="Email Address" id="Email" required>
                        </div>
                        <div class="col-lg-6 px-2">
                            <label for="Phone">Phone</label>
                            <input type="text" placeholder="Phone number" id="Phone" required>
                        </div>
                    </div>
                    <div class="check">
                        <input type="checkbox" id="Ship">
                        <label for="Ship">Ship to a different address</label>
                    </div>
                    <div class="additional">
                        <h4>Additional Info</h4>
                        <div class="order">
                            <label for="order">Order Notes (Optional)</label>
                            <input type="text" style="height: 100px;">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4">
                <div class="order-summary">
                    <h3>Order Summary</h3>

                    @php
                    $cart = session('cart', []);
                     $totalAmount = 0;
                    @endphp

                    <div class="total_amount">

                        @forelse ($cart as $data)
                        <div class="row align-items-center">
                            <div class="col-2">
                                <img  class="img-fluid"
                                    src="{{ asset('storage/product_images/' . $data['image']) }}" alt="">
                            </div>
                            <div class="col-8">
                                <p class="mb-0 pb-0">{{ $data['descriptions'] }}</p>
                                <span>Price : {{ $data['price'] }}</span>
                                <span>Qty : {{ $data['qty'] }}</span>
                            </div>
                        </div>
                        @php
                            $totalAmount += $data['price'] * $data['qty']
                        @endphp
                        @empty
                        <p class="text-danger text-center">No data found!</p>
                        @endforelse


                        <p>Subtotal: <span id="checkoutSubtotal">$ {{ $totalAmount }}</span></p>
                        <p>Shipping: <span>Free</span></p>
                        <p>Total: <span id="checkoutTotal">$ {{ $totalAmount }}</span></p>
                    </div>
                    <h4 class="payment_head">Payment Method</h4>
                    <div class="payment_method">
                        <label><input style="width: 15px; height: 15px;" type="radio" name="payment" value="cod">
                            Cash on Delivery</label>
                        <label><input style="width: 15px; height: 15px;" type="radio" name="payment" value="paypal">
                            Paypal</label>
                        <label><input style="width: 15px; height: 15px;" type="radio" name="payment" value="amazon">
                            Amazon Pay</label>
                    </div>
                    <button type="submit" id="placeOrderBtn">Place Order</button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ========== End billing ========== -->

@endsection
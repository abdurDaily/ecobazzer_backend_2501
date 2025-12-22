@extends('frontend.layout')
@section('frontend_contents')

<!-- Notification Toast -->
<div id="toast" class="toast-message"></div>


<!-- ========== Start cart_sidebar ========== -->
<aside class="cart-sidebar" id="cartSidebar">
    <div class="cart-header">
        <h3>Shopping Cart <span>(<b id="header_item">0</b>)</span></h3>
        <button id="closeCart" class="close_btn btn-close"></button>
    </div>
    <div id="cartItems" class="cart-items">
        <!-- Items will be injected here (image, name, price, qty shown as text, remove) -->
    </div>

    <div class="cart-footer">
        <div class="subtotal-row">
            <div>
                <span id="item_number">0</span>
                <span>products</span>
            </div>
            <div>
                <strong id="cartSubtotal">0.00</strong>
            </div>
        </div>

        <div class="cart-actions">
            <a class="checkout" href="checkout.html">Checkout</a>
            <a class="" href="cart.html" id="goToCart" class="btn primary">Go to Cart</a>
        </div>
    </div>
</aside>
<!-- ========== End cart_sidebar ========== -->


<!-- ========== Start banner ========== -->
<section id="banner">
    <div class="container">
        <div class="banner_slide">
            <div class="slider">
                <div class="row align-items-center ">

                    <div class="image col-lg-6 justify-content-between ">
                        <img class="img-fluid" src="{{ asset('front/assets/images/banner/1.png') }}" alt="">
                        <div class="offer">
                            <h4>70%</h4>
                            <p>OFF</p>
                        </div>
                    </div>
                    <div class="contain col-lg-6">
                        <h5>Welcome to shopery</h5>
                        <h4>Fresh & Healthy Organic Food
                        </h4>
                        <p>Free shipping on all your order. we deliver, you enjoy</p>
                        <a href="">Shop now <span>
                                <iconify-icon icon="humbleicons:arrow-right" width="24" height="24"></iconify-icon>
                            </span>
                        </a>
                    </div>

                </div>
            </div>
            <div class="slider">
                <div class="row align-items-center ">

                    <div class="image col-lg-6 justify-content-between ">
                        <img class="img-fluid" src="{{ asset('front/assets/images/banner/2.png') }}" alt="">
                        <!-- <div class="offer">
                                <h4>70%</h4>
                                <p>OFF</p>
                            </div> -->
                    </div>
                    <div class="contain col-lg-6">
                        <h5>Welcome to shopery</h5>
                        <h4>Fresh & Healthy Organic Food
                        </h4>
                        <p>Free shipping on all your order. we deliver, you enjoy</p>
                        <a href="">Shop now <span>
                                <iconify-icon icon="humbleicons:arrow-right" width="24" height="24"></iconify-icon>
                            </span>
                        </a>
                    </div>

                </div>
            </div>
            <div class="slider">
                <div class="row align-items-center ">

                    <div class="image col-lg-6 justify-content-between ">
                        <img class="img-fluid" src="{{ asset('front/assets/images/banner/3.png') }}" alt="">
                        <!-- <div class="offer">
                                <h4>70%</h4>
                                <p>OFF</p>
                            </div> -->
                    </div>
                    <div class="contain col-lg-6">
                        <h5>Welcome to shopery</h5>
                        <h4>Fresh & Healthy Organic Food
                        </h4>
                        <p>Free shipping on all your order. we deliver, you enjoy</p>
                        <a href="">Shop now <span>
                                <iconify-icon icon="humbleicons:arrow-right" width="24" height="24"></iconify-icon>
                            </span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- ========== End banner ========== -->

<!-- ========== Start featured ========== -->
<section id="featured">
    <div class="container">
        <div class="row">
            <div class="featured_box col-lg-3">
                <div class="icon">
                    <span>
                        <iconify-icon icon="la:shipping-fast" width="32" height="32"></iconify-icon>
                    </span>
                </div>

                <h4>Free Shipping</h4>
                <p>Free shipping with discount</p>

            </div>

            <div class="featured_box col-lg-3">
                <div class="icon">
                    <span>
                        <iconify-icon icon="streamline:customer-support-1" width="32" height="32"></iconify-icon>
                    </span>
                </div>

                <h4>Great Support 24/7</h4>
                <p>Instant access to Contact</p>

            </div>
            <div class="featured_box col-lg-3">
                <div class="icon">
                    <span>
                        <iconify-icon icon="streamline-ultimate:shopping-bag-check" width="32" height="32">
                        </iconify-icon>
                    </span>
                </div>

                <h4>100% Sucure Payment</h4>
                <p>We ensure your money is save</p>

            </div>
            <div class="featured_box col-lg-3">
                <div class="icon">
                    <span>
                        <iconify-icon icon="fluent:box-24-regular" width="32" height="32"></iconify-icon>
                    </span>
                </div>

                <h4>Money-Back Guarantee</h4>
                <p>30 days money-back guarantee</p>

            </div>
        </div>
    </div>
</section>
<!-- ========== End featured ========== -->


<!-- ========== Start product ========== -->
<section id="product">
    <div class="container">
        <div class="head">
            <h4>Introducing Our Products</h4>
            <div class="filter_button">
                <button class="category-button" data-filter="all">All</button>
                <button class="category-button" data-filter="vagetable"> Vegetable</button>
                <button class="category-button" data-filter="fruit">Fruit</button>
                <button class="category-button" data-filter="meat">Meat & Fish</button>
            </div>
        </div>

        <div class="row product_boxes">

            @forelse ($products as $product)
            <div class="product filter_body col-lg-3 p-0" data-stock="true" data-id="Green Apple"
                data-name="Green Apple" data-price="14.99" data-img="./assets/images/filter/1.png">
                <div class="filter fruit">
                    <span class="sale">Sale 50%</span>
                    <a href="details.html">
                        <img class="img-fluid" src="{{ 'storage/product_images/' . $product->productImages[0]->image_name }}" alt="">
                    </a>
                    <div class="details">
                        <div class="row justify-content-between align-items-center ">
                            <div class="col-8">
                                <h4 class="m-0"> {{ $product->title }} </h4>
                                <b>$ {{ $product->price }}</b>
                                <del>$ {{ $product->discount_price }} </del>
                                <div class="rate">
                                    <ul>
                                        <li>
                                            <iconify-icon icon="material-symbols-light:star" width="18" height="18">
                                            </iconify-icon>
                                        </li>
                                        <li>
                                            <iconify-icon icon="material-symbols-light:star" width="18" height="18">
                                            </iconify-icon>
                                        </li>
                                        <li>
                                            <iconify-icon icon="material-symbols-light:star" width="18" height="18">
                                            </iconify-icon>
                                        </li>
                                        <li>
                                            <iconify-icon icon="material-symbols-light:star" width="18" height="18">
                                            </iconify-icon>
                                        </li>
                                        <li>
                                            <iconify-icon icon="material-symbols-light:star" width="18" height="18">
                                            </iconify-icon>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-4 bag_icon ">
                                <span class="bag add-to-cart">
                                   <a href="{{ route('frontend.add.to.cart', $product->id) }}"> <iconify-icon icon="teenyicons:bag-outline" width="24" height="24"></iconify-icon></a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <span class="eye">
                        <iconify-icon icon="bi:eye" width="20" height="20"></iconify-icon>
                    </span>
                    <span class="heart add-to-wishlist">
                        <iconify-icon icon="bi:heart" width="20" height="20"></iconify-icon>
                    </span>
                </div>
            </div>
            @empty
            <h4 class="text-center text-danger my-5">No product Found..!</h4>
            @endforelse

        </div>
    </div>
</section>
<!-- ========== End product ========== -->

@endsection
@extends('frontend.layouts.master')

@section('content')

    @if(count($banners)>0)
            <section class="welcome_area">
                <div class="welcome_slides owl-carousel">
                    @foreach ($banners as $banner)
                        <div class="single_slide bg-img" style="background-image: url({{$banner->photo}});">
                            <div class="container h-100">
                                <div class="row h-100 align-items-center">
                                    <div class="col-12 col-md-6">
                                        <div class="welcome_slide_text">
                                            <h2 class="text" style="color:#FFC978; margin-left:100px" data-animation="fadeInUp" data-delay="300ms">{{$banner->title}}</h2>
                                            <!-- <a href="#" class="btn btn-primary" style="background-color:#C92121" data-animation="fadeInUp" data-delay="900ms"></a> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
    @endif

    @if(count($categories)>0)
        <div class="top_catagory_area mt-50 clearfix">
            <div class="container">
                <div class="row">
                    @foreach ($categories as $cat)
                        <div class="col-12 col-md-4">
                            <div class="single_catagory_area mt-50">
                                <a href="{{route('book.category', $cat->slug)}}">
                                    <img src="{{$cat->photo}}" alt="{{$cat->title}}">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <!-- Quick View Modal Area -->
    <div class="modal fade" id="quickview" tabindex="-1" role="dialog" aria-labelledby="quickview" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">
                    <div class="quickview_body">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-lg-5">
                                    <div class="quickview_pro_img">
                                        <img class="first_img" src="frontend/img/product-img/new-1-back.png" alt="">
                                        <img class="hover_img" src="frontend/img/product-img/new-1.png" alt="">
                                        <!-- Product Badge -->
                                        <div class="product_badge">
                                            <span class="badge-new">New</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-7">
                                    <div class="quickview_pro_des">
                                        <h4 class="title">Boutique Silk Dress</h4>
                                        <div class="top_seller_product_rating mb-15">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </div>
                                        <h5 class="price">$120.99 <span>$130</span></h5>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia expedita
                                            quibusdam aspernatur, sapiente consectetur accusantium perspiciatis
                                            praesentium eligendi, in fugiat?</p>
                                        <a href="#">View Full Product Details</a>
                                    </div>
                                    <!-- Add to Cart Form -->
                                    <form class="cart" method="post">
                                        <div class="quantity">
                                            <input type="number" class="qty-text" id="qty" step="1" min="1" max="12"
                                                name="quantity" value="1">
                                        </div>
                                        <button type="submit" name="addtocart" value="5" class="cart-submit">Add to
                                            cart</button>
                                        <!-- Wishlist -->
                                        <div class="modal_pro_wishlist">
                                            <a href="wishlist.html"><i class="icofont-heart"></i></a>
                                        </div>
                                        <!-- Compare -->
                                        <div class="modal_pro_compare">
                                            <a href="compare.html"><i class="icofont-exchange"></i></a>
                                        </div>
                                    </form>
                                    <!-- Share -->
                                    <div class="share_wf mt-30">
                                        <p>Share with friends</p>
                                        <div class="_icon">
                                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quick View Modal Area -->

    @php
        $all_books=\App\Models\Book::where(['status'=>'active'])->orderBy('id', 'DESC')->limit('10')->get();
    @endphp
    @if(count($all_books)>0)
        <section class="new_arrivals_area section_padding_100 clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section_heading new_arrivals">
                            <h5>Все книги</h5>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="new_arrivals_slides owl-carousel">
                            @foreach ($all_books as $item)
                            <div class="single-product-area">
                                    <div class="product_image">
                                        @php
                                            $photo=explode(',',$item->book_cover)
                                        @endphp
                                        <!-- Product Image -->
                                        <img class="normal_img" src="{{$photo[0]}}" alt="">
                                    </div>

                                    <!-- Product Description -->
                                    <div class="product_description">
                                        <!-- Add to cart -->
                                        <div class="product_add_to_cart">
                                            <a href="#"><i class="icofont-shopping-cart"></i></a>
                                        </div>

                                        <a href="{{route('book.detail', $item->slug)}}">{{$item->title}}</a>
                                        <h6 class="product-price">{{$item->price}} ₽</h6>
                                    </div>
                                </div>
                            @endforeach
                                


                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
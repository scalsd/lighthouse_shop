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
                                        <!-- <div class="welcome_slide_text">
                                            <h2 class="text" style="color:#FFC978; margin-left:100px" data-animation="fadeInUp" data-delay="300ms">{{$banner->title}}</h2>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
    @endif

    @if(count($cut_categories)>0)
        <div class="top_catagory_area mt-50 clearfix">
            <div class="container">
                <div class="row">
                    @foreach ($cut_categories as $cat)
                        <div class="col-12 col-md-4">
                            <div class="single_catagory_area mt-50">
                            <a href="{{ route('categories.show', $cat->slug) }}">
                                    <img src="{{$cat->photo}}" alt="{{$cat->title}}">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    

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
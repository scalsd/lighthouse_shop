@extends('frontend.layouts.master')

@section('content')
    
     <div class="breadcumb_area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Главная страница</a></li>
                        <li class="breadcrumb-item" style="color:#7F7F7D">Все книги</li>
                        <li class="breadcrumb-item active">{{$book->title}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="single_product_details_area section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="single_product_thumb">
                        <div id="product_details_slider" class="carousel slide" data-ride="carousel">

                            <div class="carousel-inner">
                                @php
                                    $photos=explode(',',$book->book_cover)
                                @endphp
                                @foreach ( $photos as $key=>$photo)
                                    <div class="carousel-item {{$key==0 ? 'active' : ''}}">
                                        <a class="gallery_img" href="{{$photo}}" title="{{$book->title}}">
                                            <img class="d-block w-100" src="{{$photo}}" alt="{{$book->title}}">
                                        </a>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="single_product_desc">
                        <h4 class="title mb-2">{{$book->title}}</h4>
                        <h4 class="text" style="color:#303030; font-size:14px">{{$book->author->name}}</h4>
                        <div class="short_overview mb-4" style="margin-top:40px;">
                            <h6 style="color:#303030; font-weight: 600;">Описание</h6>
                            <p>{!!html_entity_decode($book->description)!!}</p>
                        </div>
                        <h4 class="price mb-4" style="font_size:20px">{{$book->price}} ₽</h4>

                        <form class="cart clearfix my-5 d-flex flex-wrap align-items-center product_add_to_cart" method="post">
                            <div class="quantity">
                                <input type="number" class="qty-text form-control" id="qty2" step="1" min="1" max="12" name="quantity" value="1">
                            </div>
                            <button type="button" class="btn btn-primary mt-1 mt-md-0 ml-1 ml-md-3 add-to-cart-btn">Добавить в корзину</button>
                            <!-- Добавим скрытые поля с информацией о товаре -->
                            <input type="hidden" class="product-title" value="{{$book->title}}">
                            <input type="hidden" class="product-price" value="{{$book->price}}">
                            <input type="hidden" class="product-image" value="{{$photos[0]}}">
                        </form>

                        <div class="others_info_area mb-3 d-flex flex-wrap">
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                
                </div>
            </div>
        </div>
    </section>
@endsection
<header class="header_area">
    <!-- Main Menu -->
    <div class="bigshop-main-menu" style="background-color: #242424">
        <div class="container" >
            <div class="classy-nav-container breakpoint-off" style="background-color: #242424">
                <nav class="classy-navbar" id="bigshopNav">

                    <!-- Nav Brand -->
                    <a href="{{route('home')}}" class="nav-brand"><img src="{{asset('backend/assets/images/logo.png')}}" alt="logo" width="100px" padding-bottom="10px"></a>


                    <!-- Menu -->
                    <div class="classy-menu">
                        <!-- Close -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav -->
                        <div class="classynav" style="padding-top:7px">
                            <ul>
                                <li><a style="font-family: 'Montserrat', sans-serif; font-weight: 600; font-size: 14px;" href="#">Каталог</a>
                                    <!-- <ul class="dropdown">
                                        <li><a href="#">Shop Grid</a>
                                            <ul class="dropdown">
                                                <li><a href="shop-grid-left-sidebar.html">Shop Grid Left Sidebar</a>
                                                </li>
                                                <li><a href="shop-grid-right-sidebar.html">Shop Grid Right Sidebar</a></li>
                                                <li><a href="shop-grid-top-sidebar.html">Shop Grid Top Sidebar</a></li>
                                                <li><a href="shop-grid-no-sidebar.html">Shop Grid No Sidebar</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Shop List</a>
                                            <ul class="dropdown">
                                                <li><a href="shop-list-left-sidebar.html">Shop List Left Sidebar</a>
                                                </li>
                                                <li><a href="shop-list-right-sidebar.html">Shop List Right
                                                        Sidebar</a></li>
                                                <li><a href="shop-list-top-sidebar.html">Shop List Top Sidebar</a>
                                                </li>
                                                <li><a href="shop-list-no-sidebar.html">Shop List No Sidebar</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="product-details.html">Single Product</a></li>
                                        <li><a href="cart.html">Cart</a></li>
                                        <li><a href="#">Checkout</a>
                                            <ul class="dropdown">
                                                <li><a href="checkout-1.html">Login</a></li>
                                                <li><a href="checkout-2.html">Billing</a></li>
                                                <li><a href="checkout-3.html">Shipping Method</a></li>
                                                <li><a href="checkout-4.html">Payment Method</a></li>
                                                <li><a href="checkout-5.html">Review</a></li>
                                                <li><a href="checkout-complate.html">Complate</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Account Page</a>
                                            <ul class="dropdown">
                                                <li><a href="my-account.html">- Dashboard</a></li>
                                                <li><a href="order-list.html">- Orders</a></li>
                                                <li><a href="downloads.html">- Downloads</a></li>
                                                <li><a href="addresses.html">- Addresses</a></li>
                                                <li><a href="account-details.html">- Account Details</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                        <li><a href="compare.html">Compare</a></li>
                                    </ul> -->
                                </li>
                                
                                <li><a style="font-family: 'Montserrat', sans-serif; font-weight: 600; font-size: 14px;" href="#">Статьи</a>
                                </li>
                                <li><a style="font-family: 'Montserrat', sans-serif; font-weight: 600; font-size: 14px;" href="http://lighthouse.local/admin/book">Административная панель</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="hero_meta_area ml-auto d-flex align-items-center justify-content-end">
                        <div class="search-area">
                            <div class="search-btn"><img src="{{asset('frontend/img/search1.png')}}" style="width: 17px"></img></div>
                            <div class="search-form">
                                <input type="search" class="form-control" placeholder="Поиск">
                                <input type="submit" class="d-none" value="Send">
                            </div>
                        </div>

                        <div class="wishlist-area">
                            <a href="wishlist.html" class="wishlist-btn"><img src="{{asset('frontend/img/heart.png')}}" style="width: 17px"></i></a>
                        </div>

                        <div class="cart-area">
                            <div class="cart--btn"><img src="{{asset('frontend/img/cart.png')}}" style="width: 17px"></i> <span class="cart_quantity">2</span>
                            </div>

                            <div class="cart-dropdown-content">
                                <ul class="cart-list">
                                    <li>
                                        <div class="cart-item-desc">
                                            <a href="#" class="image">
                                                <img src="{{asset('frontend/img/women.jpg')}}" class="cart-thumb" alt="">
                                            </a>
                                            <div>
                                                <a href="#">Маленькие женщины</a>
                                                <p>1x - <span class="price">₽467</span></p>
                                            </div>
                                        </div>
                                        <span class="dropdown-product-remove"><i class="icofont-bin"></i></span>
                                    </li>
                                    <li>
                                        <div class="cart-item-desc">
                                            <a href="#" class="image">
                                                <img src="{{asset('frontend/img/onegin.jpg')}}" class="cart-thumb" alt="">
                                            </a>
                                            <div>
                                                <a href="#">Евгений Онегин</a>
                                                <p>2x - <span class="price">₽231</span></p>
                                            </div>
                                        </div>
                                        <span class="dropdown-product-remove"><i class="icofont-bin"></i></span>
                                    </li>
                                </ul>
                                <div class="cart-pricing my-4">
                                    <ul>
                                        <li>
                                            <span>Итого:</span>
                                            <span>₽698</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="cart-box">
                                    <a href="checkout-1.html" class="btn btn-primary d-block">Оплатить</a>
                                </div>
                            </div>
                        </div>


                        <div class="account-area">
                            <div class="user-thumbnail">
                                <img src="frontend/img/user.png" style="border-radius:0%; width:17px" alt="">
                            </div>
                            <ul class="user-meta-dropdown">
                                <li class="user-title" style="font-family: 'Montserrat', sans-serif; font-weight: 400; font-size: 14px;"><span>Добро пожаловать,</span> <strong style="font-family: 'Montserrat', sans-serif; font-weight: 400; font-size: 14px;">Имя</strong></li>
                                <li><a href="my-account.html">My Account</a></li>
                                <li><a href="order-list.html">Orders List</a></li>
                                <li><a href="wishlist.html">Wishlist</a></li>
                                <!-- @if(Auth::check())
                                    <a href="{{ route('logout') }}" 
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            <i class="icofont-logout"></i>Выйти</a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                @else
                                    <li><a href="login.html"><i class="icofont-login"></i> Login</a></li>
                                @endif -->
                                <li>
                                    <a href="{{ route('logout') }}" 
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        <i class="icofont-logout"></i>Выйти</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>

                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
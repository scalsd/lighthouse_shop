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
                                    <ul class="dropdown" id="categoryDropdown">
                                    @if($categories->isNotEmpty())
                                        @foreach($categories as $category)
                                        <li><a href="{{ route('categories.list', $category->slug) }}">{{ $category->title }}</a></li>
                                        @endforeach
                                    @else
                                        <li><a href="#">Нет категорий</a></li>
                                    @endif
                                    </ul>
                                </li>
                                
                                @if(auth()->check() && auth()->user()->role === 'admin')
                                    <li>
                                        <a style="font-family: 'Montserrat', sans-serif; font-weight: 600; font-size: 14px;" href="http://lighthouse.local/admin/book">
                                            Административная панель
                                        </a>
                                    </li>
                                @endif


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


                        <div class="cart-area">
                            <div class="cart--btn">
                                <img src="{{asset('frontend/img/cart.png')}}" style="width: 17px">
                                <span class="cart_quantity">0</span>
                            </div>

                            <div class="cart-dropdown-content">
                                <!-- Список товаров - сначала пустой -->
                                <ul class="cart-list">
                                </ul>
                                <div class="cart-pricing my-4">
                                    <ul>
                                        <li>
                                            <span>Итого:</span>
                                            <span class="cart-total">₽0</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="cart-box">
                                    <a class="btn btn-primary d-block checkout-btn">Оформить заказ</a>
                                </div>
                            </div>
                        </div>

                             
                        <div class="account-area">
                            <div class="user-thumbnail">
                                <img src="backend\assets\images\sign-in.png" style="border-radius:0%; width:17px" alt="">
                            </div>
                            <ul class="user-meta-dropdown">
                                @if(Auth::check())
                                    <!-- Если пользователь авторизован, кнопка выхода -->
                                    <li>
                                        <a href="{{ route('logout') }}" 
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"
                                            title="Выйти из аккаунта">
                                            <i class="icofont-logout"></i> Выйти
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                @else
                                    <!-- Если пользователь не авторизован, кнопка входа -->
                                    <li>
                                        <a href="{{ route('login') }}" title="Войти в аккаунт">
                                            <i class="icofont-login"></i> Войти
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>

                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
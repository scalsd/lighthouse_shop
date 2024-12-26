<div id="left-sidebar" class="sidebar">
        <div class="sidebar-scroll">
            <div class="user-account">
                <img src="{{asset('backend/assets/images/user.jpg')}}" class="rounded-circle user-photo" alt="User Profile Picture">
                <div class="dropdown">
                <span>Добро пожаловать,</span>
                <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown">
                    <strong>{{ Auth::user()->name }}</strong>
                </a>
                    <!-- <ul class="dropdown-menu dropdown-menu-right account">
                        <li><a href="professors-profile.html"><i class="icon-user"></i>My Profile</a></li>
                        <li><a href="app-inbox.html"><i class="icon-envelope-open"></i>Messages</a></li>
                        <li><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li>
                        <li class="divider"></li>
                        <li><a href="page-login.html"><i class="icon-power"></i>Logout</a></li>
                    </ul> -->
                </div>
            </div>
                
            <div class="tab-content p-l-0 p-r-0">
                <div class="tab-pane active" id="admin">
                    <nav class="sidebar-nav">
                        <ul class="main-menu metismenu"  style="color:#d4d3ce;">
                            <!-- <li class="active"><a href="{{route('admin')}}"><img src="{{asset('backend/assets/images/home-white.png')}}" alt="picture" style="width: 20px; height: 20px;"> <span style="font-family: 'Montserrat', sans-serif; font-weight: 700; font-size: 14px; padding-left: 10px;">Административная панель</span></a></li> -->
                            <li><a href="javascript:void(0);" class="has-arrow"> <img src="{{asset('backend/assets/images/user-white.png')}}" alt="picture" style="width: 20px; height: 20px;"> <span style="font-family: 'Montserrat', sans-serif; font-weight: 700; font-size: 14px; padding-left: 10px;">Управление пользователями</span> </a>
                                <ul>
                                    <li><a href="{{route('user.index')}}">Все пользователи</a></li>
                                    <li><a href="{{route('user.create')}}">Добавить пользователя</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0);" class="has-arrow"> <img src="{{asset('backend/assets/images/pictures-white.png')}}" alt="picture" style="width: 20px; height: 20px;"> <span style="font-family: 'Montserrat', sans-serif; font-weight: 700; font-size: 14px; padding-left: 10px;">Управление баннерами</span> </a>
                                <ul>
                                    <li><a href="{{route('banner.index')}}">Все баннеры</a></li>
                                    <li><a href="{{route('banner.create')}}">Добавить баннер</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0);" class="has-arrow"> <img src="{{asset('backend/assets/images/categories-white.png')}}" alt="picture" style="width: 20px; height: 20px;"> <span style="font-family: 'Montserrat', sans-serif; font-weight: 700; font-size: 14px; padding-left: 10px;">Управление категориями</span> </a>
                                <ul>
                                    <li><a href="{{route('category.index')}}">Все категории</a></li>
                                    <li><a href="{{route('category.create')}}">Добавить категорию</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0);" class="has-arrow"><img src="{{asset('backend/assets/images/books-white.png')}}" alt="picture" style="width: 20px; height: 20px;"> <span style="font-family: 'Montserrat', sans-serif; font-weight: 700; font-size: 14px; padding-left: 10px;">Управление книгами</span> </a>
                                <ul>
                                    <li><a href="{{route('book.index')}}">Все книги</a></li>
                                    <li><a href="{{route('book.create')}}">Добавить книгу</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0);" class="has-arrow"><img src="{{asset('backend/assets/images/star-white.png')}}" alt="picture" style="width: 20px; height: 20px;"> <span style="font-family: 'Montserrat', sans-serif; font-weight: 700; font-size: 14px; padding-left: 10px;">Управление издательствами</span> </a>
                                <ul>
                                    <li><a href="{{route('publishing_house.index')}}">Все издательства</a></li>
                                    <li><a href="{{route('publishing_house.create')}}">Добавить издательство</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0);" class="has-arrow"><img src="{{asset('backend/assets/images/author-white.png')}}" alt="picture" style="width: 20px; height: 20px;"> <span style="font-family: 'Montserrat', sans-serif; font-weight: 700; font-size: 14px; padding-left: 10px;">Управление авторами</span> </a>
                                <ul>
                                    <li><a href="{{route('author.index')}}">Все авторы</a></li>
                                    <li><a href="{{route('author.create')}}">Добавить автора</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0);" class="has-arrow"><img src="{{asset('backend/assets/images/series-white.png')}}" alt="picture" style="width: 20px; height: 20px;"> <span style="font-family: 'Montserrat', sans-serif; font-weight: 700; font-size: 14px; padding-left: 10px;">Управление сериями</span> </a>
                                <ul>
                                    <li><a href="{{route('series.index')}}">Все серии</a></li>
                                    <li><a href="{{route('series.create')}}">Добавить серию</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0);" class="has-arrow"><img src="{{asset('backend/assets/images/orders-white.png')}}" alt="picture" style="width: 20px; height: 20px;"> <span style="font-family: 'Montserrat', sans-serif; font-weight: 700; font-size: 14px; padding-left: 10px;">Управление заказами</span> </a>
                                <ul>
                                    <li><a href="{{route('series.index')}}">Все заказы</a></li>
                                    <li><a href="{{route('series.create')}}">Добавить заказ</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0);" class="has-arrow"><img src="{{asset('backend/assets/images/posts-white.png')}}" alt="picture" style="width: 20px; height: 20px;"> <span style="font-family: 'Montserrat', sans-serif; font-weight: 700; font-size: 14px; padding-left: 10px;">Управление статьями</span> </a>
                                <ul>
                                <li><a href="{{route('post.index')}}">Все статьи</a></li>
                                <li><a href="{{route('post.create')}}">Добавить статью</a></li>
                                </ul>
                            </li>
                            <!-- <li><a href="app-inbox.html"><img src="{{asset('backend/assets/images/settings-white.png')}}" alt="picture" style="width: 20px; height: 20px;"> </i><span style="font-family: 'Montserrat', sans-serif; font-weight: 700; font-size: 14px; padding-left: 10px;">Настройки</span></a></li> -->
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
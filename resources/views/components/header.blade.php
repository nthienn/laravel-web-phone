<header class="header">
    <div class="grid wide">
        <!-- Header navbar -->
        <div class="header__navbar">
            <div class="header__logo">
                <a href="{{ URL('/') }}" class="header__logo-link">
                    <img src="{{ asset('home/images/logo.png') }}" alt="" class="header__logo-img">
                </a>
            </div>

            <ul class="header__navbar-list">
                <li class="header__navbar-item">
                    <a href="{{ URL('/') }}" class="header__navbar-item-link">
                        <i class="fa-solid fa-house header__navbar-icon"></i>
                        Trang chủ
                    </a>
                </li>
                <li class="header__navbar-item">
                    <a href="{{ route('cart') }}" class="header__navbar-item-link">
                        <i class="fa-solid fa-cart-shopping header__navbar-icon"></i>
                        Giỏ hàng
                    </a>
                </li>
                @if (session()->has('id_taikhoan'))
                <li class="header__navbar-item">
                    <a href="#" class="header__navbar-item-link">
                        <i class="fa-solid fa-user header__navbar-icon"></i>
                        {{ session()->get('tenkhachhang') }}
                    </a>
                    <ul class="header__navbar-subnav">
                        <li class="header__subnav-item">
                            <a href="{{ route('user.index') }}" class="header__subnav-item-link">
                            Thông tin cá nhân
                            </a>
                        </li>
                        <li class="header__subnav-item">
                            <a href="{{ route('product.index') }}" class="header__subnav-item-link">
                            Quản lý sản phẩm bán
                            </a>
                        </li>
                        <li class="header__subnav-item">
                            <a href="{{ route('order-seller') }}" class="header__subnav-item-link">
                            Quản lý đơn hàng
                            </a>
                        </li>
                        <li class="header__subnav-item">
                            <a href="{{ route('order-history') }}" class="header__subnav-item-link">
                            Lịch sử đơn hàng
                            </a>
                        </li>
                    </ul>
                </li>               
                <li class="header__navbar-item">
                    <a href="{{ route('user-logout') }}" class="header__navbar-item-link">
                        <i class="fa-solid fa-right-from-bracket header__navbar-icon"></i>
                        Đăng xuất
                    </a>
                </li>
                @else
                <li class="header__navbar-item">
                    <a href="{{ route('user-login') }}" class="header__navbar-item-link">
                        <i class="fa-solid fa-right-to-bracket header__navbar-icon"></i>
                        Đăng nhập
                    </a>
                </li>
                <li class="header__navbar-item">
                    <a href="{{ route('user.create') }}" class="header__navbar-item-link">
                        <i class="fa-solid fa-pen-to-square header__navbar-icon"></i>
                        Đăng ký
                    </a>
                </li>
                @endif
            </ul>
        </div>

        <!-- Header with search -->
        <div class="header-with-search">
            <div class="header__search">
                <form method="GET" action="{{ route('search') }}">
                    <input type="text" class="header__search-input" placeholder="Xin chào, hôm nay bạn cần tìm gì?" name="tukhoa">
                    <button class="header__search-btn" type="submit">
                        <img src="{{ asset('home/images/search.png') }}" class="header__search-img">
                    </button>
                </form>
            </div>
            @if (session()->has('id_taikhoan'))
            <div class="header__post">
                <a href="{{ route('product.create') }}">
                    <span>Đăng tin</span>
                    <img src="{{ asset('home/images/edit.png') }}" alt="" class="header__post-img">
                </a>
            </div>
            @else
            <div class="header__post">
                <a href="{{ route('user-login') }}">
                    <span>Đăng tin</span>
                    <img src="{{ asset('home/images/edit.png') }}" alt="" class="header__post-img">
                </a>
            </div>
            @endif
        </div>
    </div>
</header>
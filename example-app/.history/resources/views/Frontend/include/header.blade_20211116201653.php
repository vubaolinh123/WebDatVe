<header>
    <div class="header-top">
        <div class="header-logo">
            <div class="image">
                <img src="{{ asset('frontend/img/galaxy-logo 1.png') }}" alt="" />
            </div>
        </div>
        <div class="header-search">
            <input type="text" placeholder="Tìm tên phim..." />
            <i class="fas fa-search"></i>
        </div>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-map-marker-alt"></i> Khu vực
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </div>
        <div class="header-login">
            <i class="far fa-user"></i>
            <a href="#">Đăng nhập</a>

        </div>

    </div>
    <div class="header-menu">
        <ul class="menu-level-1">
            <li class="menu-level-1-item"><a href="{{ route('web.home') }}">Trang chủ</a></li>
            <li class="menu-level-1-item"><a href="">Mua vé</a></li>
            <li class="menu-level-1-item"><a href="">Phim</a></li>
            <li class="menu-level-1-item">
                <a href="">điện ảnh</a>
                <ul class="menu-level-2">
                    <li><a href="">Thể loại</a></li>
                    <li><a href="">bình luận</a></li>
                    <li><a href="">blog điện ảnh</a></li>
                </ul>
            </li>
            <li class="menu-level-1-item"><a href="">rạp/giá vé</a></li>
            <li class="menu-level-1-item"><a href="">Hỗ trợ</a></li>
            <li class="menu-level-1-item"><a href="">Thành viên</a></li>
        </ul>
    </div>
</header>

<header>
    <div class="header-top">
        <div class="header-logo">
            <div class="image">
                <a href="{{ route('web.home') }}">
                    <img src="{{ asset('frontend/img/galaxy-logo 1.png') }}" alt="" />
                </a>
            </div>
        </div>
        <div style="position : relative" class="header-search">
            <input type="text" placeholder="Tìm tên phim..." />
            <i class="fas fa-search"></i>
            <div class="show-sr"></div>
        </div>


        <div class=" row">
            <div class="col-xs-4">
                <div class="row">

                    @if (Auth::check())
                        <div class="col-xs-12">
                            <div style="">

                                <div >
                                    <span class="btn btn-dark text-primary" id="name_us"><i class="far fa-user"></i>{{ Auth::user()->name }}</span>
                                </div>
                                <a style="color:white;font-size:10px;background:rgb(132, 132, 132) ;padding:3px; border-radius:10px;
                margin-left: 20px;
            " href="logout">Đăng xuất</a>
                            </div>
                        </div>
                    @else
                        <div class="col-xs-12">
                            <div style="display: flex;justify-content: center;align-items: center;">

                                <i class="far fa-user"></i>
                                <a href="login">Đăng nhập</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-xs-4">
                <div>
                    {{--  --}}
                    <a href=" {{ route('web.ordreFilm') }}">
                        <i class="icofont-fax"></i>
                        Hóa đơn
                    </a>
                </div>
            </div>
            <div class="dropdown col-sm-4">
                <button style="padding: 0" class="btn btn-secondary dropdown-toggle" type="button"
                    id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-map-marker-alt"></i>
                    @foreach ($citys as $city)
                        @if (Session::get('cityAddress') == $city->code)
                            {{ $city->name }}
                        @endif
                    @endforeach
                </button>
                <ul style="height:400px ; overflow:auto" class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    @foreach ($citys as $city)
                        <li><a class="dropdown-item"
                                href="{{ route('web.getCityAddress', ['code' => $city->code]) }}">{{ $city->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>













    </div>
    <div class="header-menu">
        <ul class="menu-level-1">
            <li class="menu-level-1-item"><a href="{{ route('web.home') }}">Trang chủ</a></li>
            <li class="menu-level-1-item"><a href="">Mua vé</a></li>
            <li class="menu-level-1-item"><a href="">Phim</a></li>
            {{-- <li class="menu-level-1-item">
                <a href="">điện ảnh</a>
                <ul class="menu-level-2">
                    <li><a href="">Thể loại</a></li>
                    <li><a href="">bình luận</a></li>
                    <li><a href="">blog điện ảnh</a></li>
                </ul>
            </li> --}}
        </ul>
    </div>
</header>

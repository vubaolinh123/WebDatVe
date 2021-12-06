{{-- <li class="nav-label first">Main Menu</li> --}}
<li>
    <a class="has-arrow" href="/admin" aria-expanded="false">
        <span class="nav-text">Trang chủ</span>
    </a>

</li>
<li>
    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
        <span class="nav-text">Quản lý hóa đơn vé khách hàng </span>
    </a>
    <ul aria-expanded="false">
        <li><a href="{{ route('admin.receipt.list') }}">Quản lý hóa đơn vé khách hàng </a></li>
        {{-- <li><a href="{{ route('cinema') }}">Quản lý rạp phim </a></li> --}}
    </ul>
</li>
@hasAdmin('admin')
    <li>
        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
            <span class="nav-text">Quản lý cụm rạp phim , rạp phim </span>
        </a>
        <ul aria-expanded="false">
            <li><a href="{{ route('cinema.cluster') }}">Quản lý cụm rạp phim </a></li>
            <li><a href="{{ route('cinema') }}">Quản lý rạp phim </a></li>
        </ul>
    </li>
    <li>
        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
            <span class="nav-text">Quản lý thể loại phim</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="{{ route('admin.typefilm.list') }}">Danh sách</a></li>
            <li><a href="{{ route('admin.typefilm.addForm') }}">Thêm </a></li>
        </ul>
    </li>
    <li>
        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
            <span class="nav-text">Quản lý phim</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="{{ route('admin.film.list') }}">Danh sách</a></li>
            <li><a href="{{ route('admin.film.addForm') }}">Thêm </a></li>
        </ul>
    </li>
    <li>
        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
            <span class="nav-text">Quản lý phòng chiếu</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="{{ route('admin.cinemaroom.list') }}">Danh sách</a></li>
            <li><a href="{{ route('admin.cinemaroom.addForm') }}">Thêm </a></li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <span class="nav-text">Quản lý ghế</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.chair.list') }}">Danh sách</a></li>
                    {{-- <li><a href="{{ route('admin.chair.addForm') }}">Thêm </a></li> --}}
                </ul>
            </li>
        </ul>

    </li>

    <li>
        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
            <span class="nav-text">Quản lý loại ghế</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="{{ route('admin.typechair.list') }}">Danh sách</a></li>
            <li><a href="{{ route('admin.typechair.addForm') }}">Thêm </a></li>
        </ul>
    </li>
@endhasAdmin

<li>
    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
        <span class="nav-text">Quản lý thời gian chiếu phim</span>
    </a>
    <ul aria-expanded="false">
        <li><a href="{{ route('admin.timeshowfilm.list') }}">Danh sách</a></li>
        <li><a href="{{ route('admin.timeshowfilm.add') }}">Thêm </a></li>
    </ul>
</li>

<li>
    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
        <span class="nav-text">Quản lý blog</span>
    </a>
    <ul aria-expanded="false">
        <li><a href="{{ route('admin.blog.list') }}">Danh sách</a></li>
        <li><a href="{{ route('admin.blog.add') }}">Thêm </a></li>
    </ul>
</li>
<li>
    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
        <span class="nav-text">Quản lý thể loại blog</span>
    </a>
    <ul aria-expanded="false">
        <li><a href="{{ route('admin.type_blog.list') }}">Danh sách</a></li>
        <li><a href="{{ route('admin.type_blog.add') }}">Thêm </a></li>
    </ul>
</li>
<li>
    <a class="has-arrow"  >
        <span class="nav-text">Quản lý vé</span>
    </a>
    <ul aria-expanded="false">
        <li><a href="{{ route('admin.typechair.list') }}">Danh sách</a></li>
        <li><a href="{{ route('admin.typechair.addForm') }}">Thêm </a></li>
    </ul>
</li>
<li>
    <a class="has-arrow" href="{{ route('admin.comment.start.cinema') }}">Quản lý bình luận đánh giá </a>
</li>
<li>
    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
        <span class="nav-text">Quản lý Đồ Ăn</span>
    </a>
    <ul aria-expanded="false">
        <li><a href="{{ route('admin.food.list') }}">Danh sách</a></li>
        <li><a href="{{ route('admin.food.add') }}">Thêm </a></li>
    </ul>
</li>


<li>
    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
        <span class="nav-text">Quản lý Loại Đồ Ăn</span>
    </a>
    <ul aria-expanded="false">
        <li><a href="{{ route('admin.type_food.list') }}">Danh sách</a></li>
        <li><a href="{{ route('admin.type_food.add') }}">Thêm </a></li>
    </ul>
</li>


<li>
    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
        <span class="nav-text">Quản lý Size Đồ Ăn</span>
    </a>
    <ul aria-expanded="false">
        <li><a href="{{ route('admin.size_food.list') }}">Danh sách</a></li>
        <li><a href="{{ route('admin.size_food.add') }}">Thêm </a></li>
    </ul>
</li>


  <li class="nav-label">Apps</li>
<li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon icon-app-store"></i><span
            class="nav-text">Apps</span></a>
    <ul aria-expanded="false">
        <li><a href="./app-profile.html">Profile</a></li>
        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Email</a>
            <ul aria-expanded="false">
                <li><a href="./email-compose.html">Compose</a></li>
                <li><a href="./email-inbox.html">Inbox</a></li>
                <li><a href="./email-read.html">Read</a></li>
            </ul>
        </li>
        <li><a href="./app-calender.html">Calendar</a></li>
    </ul>
</li>
<li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon icon-chart-bar-33"></i><span
            class="nav-text">Charts</span></a>
    <ul aria-expanded="false">
        <li><a href="./chart-flot.html">Flot</a></li>
        <li><a href="./chart-morris.html">Morris</a></li>
        <li><a href="./chart-chartjs.html">Chartjs</a></li>
        <li><a href="./chart-chartist.html">Chartist</a></li>
        <li><a href="./chart-sparkline.html">Sparkline</a></li>
        <li><a href="./chart-peity.html">Peity</a></li>
    </ul>
</li>
@hasAdmin('admin')
<li>
    <a class="has-arrow" href="{{ route('admin.manage.user') }}" >
        <span class="nav-text">Quản lý tài khoản</span>
    </a>
</li>
<li>
    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
        <span class="nav-text">Quản lý tin tức</span>
    </a>
    <ul aria-expanded="false">
        <li><a href="{{ route('admin.news.list') }}">Danh sách</a></li>
        <li><a href="{{ route('admin.news.add') }}">Thêm </a></li>

    </ul>
</li>
@endhasAdmin

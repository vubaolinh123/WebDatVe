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
@hasAdmin
<li>
    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
        <span class="nav-text">Quản lý cụm rạp phim , rạp phim </span>
    </a>
    <ul aria-expanded="false">
        <li><a href="{{ route('cinema.cluster') }}">Quản lý cụm rạp phim </a></li>
        <li><a href="{{ route('cinema') }}">Quản lý rạp phim </a></li>
    </ul>
</li>
@endhasAdmin
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

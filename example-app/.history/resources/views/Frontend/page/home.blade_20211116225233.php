@extends('Frontend.layout_web')
@section('conten.web')
    <div class="slideshow">


    </div>




    {{-- <div class="category-film">
        <div class="title-film">
            <div class="title-item">
                <a href="#">phim đang chiếu</a>
            </div>
            <div class="title-item">
                <a href="#">phim sắp chiếu</a>
            </div>
        </div>

        <div class="film">
            <div class="container-fluid">
                <div class="row">
                    @foreach ($filmHomeDeleteds as $filmHomeDeleted)
                        <div class="col-xs-2">
                            <div class="item-film">
                                <a href="{{ route('web.detailFim') }}">
                                    <div class="film_img"
                                        style="background-image: url({{ asset("$URL_IMG_FILM/$filmHomeDeleted->avatar") }})">
                                    </div>
                                </a>
                                <div class="text-film">
                                    <a href="#"><button>Mua vé</button></a>
                                </div>
                                <p class="text-black">THE CONJURING: THE DEVIL MADE ME DO IT
                                </p>
                                <p class="text-gray">THE CONJURING: MA XUI QUỶ KHIẾN
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

        </div>


    </div> --}}
    <div class="container pt-4">

        <!-- Tab links -->
        <div class="tabs">
            <button class="tablinks active" data-electronic="filmHomeDeleted0s">Phim đang chiếu</button>
            <button class="tablinks" data-electronic="filmHomeDeleted1s">Phim sắp chiếu</button>
        </div>

        <!-- Tab content -->
        <div style="margin-top: 30px" class="wrapper_tabcontent ">
            <div id="filmHomeDeleted0s" class="px-36 tabcontent active">
                <div class="container-fluid">
                    <div class="row">

                        @foreach ($filmHomeDeleted0s as $filmHomeDeleted0)
                            <div class="col-xs-2 mb-5">
                                <div class="item-film">
                                    <a href="{{ route('web.detailFim', [$filmHomeDeleted0->id_film]) }}">
                                        <div class="film_img"
                                            style="background-image: url({{ asset("$URL_IMG_FILM/$filmHomeDeleted0->avatar") }})">
                                        </div>
                                    </a>

                                    <p class="text-black">
                                        {{ $filmHomeDeleted0->name }}
                                    </p>
                                    <a href="#" class="text-gray">
                                        {{ $filmHomeDeleted0->nameTypeFilm }}
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
                <div class="view-more">
                    <button>Xem thêm <i class="fas fa-arrow-right"></i></button>
                </div>
            </div>


            <div id="filmHomeDeleted1s" class="px-36 tabcontent ">
                <div class="container-fluid">
                    <div class="row">

                        @foreach ($filmHomeDeleted1s as $filmHomeDeleted1)
                            <div class="col-xs-2 mb-5">
                                <div class="item-film">
                                    <a href="{{ route('web.detailFim', [$filmHomeDeleted1->id_film]) }}">
                                        <div class="film_img"
                                            style="background-image: url({{ asset("$URL_IMG_FILM/$filmHomeDeleted1->avatar") }})">
                                        </div>
                                        <p class="text-black">
                                            {{ $filmHomeDeleted1->name }}
                                        </p>
                                        <a href="#" class="text-gray">
                                            {{ $filmHomeDeleted0->nameTypeFilm }}
                                        </a>
                                    </a>

                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
                <div class="view-more">
                    <button>Xem thêm <i class="fas fa-arrow-right"></i></button>
                </div>
            </div>

        </div>
    </div>



    <div class="blog-comment">
        <div class="comment-film">
            <div class="title-film">
                <div class="title-item">
                    <a href="#">Bình luận phim</a>
                </div>
            </div>
            <div class="comment">
                <div class="comment-film">
                    <div class="item-comment">
                        <div class="image-item-comment">
                            <img src="{{ asset('frontend/img/Thiên thần hộ mệnh.png') }}" alt="">
                        </div>
                        <div class="text-comment">
                            <div class="title-comment">
                                <a href="#">[Review] Thiên Thần Hộ Mệnh: Victor Vũ Và Nỗ Lực Trẻ Hóa "Vũ Trụ Bùa
                                    Ngải"</a>
                            </div>
                            <div class="like">
                                <img src="{{ asset('frontend/img/like.png') }}" alt="">
                                <img src="{{ asset('frontend/img/view.png') }}" alt="">
                                <i style="color: gold" class="fas fa-star"></i> 8.7/10(882)
                            </div>
                            <div class="text">
                                <p><b>Thiên Thần Hộ Mệnh</b> phức tạp, nhiều twist và rõ nhất là trẻ hơn!</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="comment-film">

                    <div class="item-comment">
                        <div class="image-item-comment">
                            <img src="{{ asset('frontend/img/Thiên thần hộ mệnh.png') }}" alt="">
                        </div>
                        <div class="text-comment">
                            <div class="title-comment">
                                <a href="#">[Review] Thiên Thần Hộ Mệnh: Victor Vũ Và Nỗ Lực Trẻ Hóa "Vũ Trụ Bùa
                                    Ngải"</a>
                            </div>
                            <div class="like">
                                <img src="{{ asset('frontend/img/like.png') }}" alt="">
                                <img src="{{ asset('frontend/img/view.png') }}" alt="">
                                <i style="color: gold" class="fas fa-star"></i> 8.7/10(882)
                            </div>
                            <div class="text">
                                <p><b>Thiên Thần Hộ Mệnh</b> phức tạp, nhiều twist và rõ nhất là trẻ hơn!</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="comment-film">

                    <div class="item-comment">
                        <div class="image-item-comment">
                            <img src="{{ asset('frontend/img/Thiên thần hộ mệnh.png') }}" alt="">
                        </div>
                        <div class="text-comment">
                            <div class="title-comment">
                                <a href="#">[Review] Thiên Thần Hộ Mệnh: Victor Vũ Và Nỗ Lực Trẻ Hóa "Vũ Trụ Bùa
                                    Ngải"</a>
                            </div>
                            <div class="like">
                                <img src="{{ asset('frontend/img/like.png') }}" alt="">
                                <img src="{{ asset('frontend/img/view.png') }}" alt="">
                                <i style="color: gold" class="fas fa-star"></i> 8.7/10(882)
                            </div>
                            <div class="text">
                                <p><b>Thiên Thần Hộ Mệnh</b> phức tạp, nhiều twist và rõ nhất là trẻ hơn!</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="comment-film">

                    <div class="item-comment">
                        <div class="image-item-comment">
                            <img src="{{ asset('frontend/img/Thiên thần hộ mệnh.png') }}" alt="">
                        </div>
                        <div class="text-comment">
                            <div class="title-comment">
                                <a href="#">[Review] Thiên Thần Hộ Mệnh: Victor Vũ Và Nỗ Lực Trẻ Hóa "Vũ Trụ Bùa
                                    Ngải"</a>
                            </div>
                            <div class="like">
                                <img src="{{ asset('frontend/img/like.png') }}" alt="">
                                <img src="{{ asset('frontend/img/view.png') }}" alt="">
                                <i style="color: gold" class="fas fa-star"></i> 8.7/10(882)
                            </div>
                            <div class="text">
                                <p><b>Thiên Thần Hộ Mệnh</b> phức tạp, nhiều twist và rõ nhất là trẻ hơn!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="blog-film">
            <div class="title-film">
                <div class="title-item">
                    <a href="#">Bình luận phim</a>
                </div>
            </div>
            <div class="blog">
                <div class="blog-film">

                    <div class="item-comment">
                        <div class="image-item-comment">
                            <img src="{{ asset('frontend/img/Thiên thần hộ mệnh.png') }}" alt="">
                        </div>
                        <div class="text-comment">
                            <div class="title-comment">
                                <a href="#">[Review] Thiên Thần Hộ Mệnh: Victor Vũ Và Nỗ Lực Trẻ Hóa "Vũ Trụ Bùa
                                    Ngải"</a>
                            </div>
                            <div class="like">
                                <img src="{{ asset('frontend/img/like.png') }}" alt="">
                                <img src="{{ asset('frontend/img/view.png') }}" alt="">
                            </div>
                            <div class="text">
                                <p><b>Thiên Thần Hộ Mệnh</b> phức tạp, nhiều twist và rõ nhất là trẻ hơn!</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blog-film">

                    <div class="item-comment">
                        <div class="image-item-comment">
                            <img src="{{ asset('frontend/img/Thiên thần hộ mệnh.png') }}" alt="">
                        </div>
                        <div class="text-comment">
                            <div class="title-comment">
                                <a href="#">[Review] Thiên Thần Hộ Mệnh: Victor Vũ Và Nỗ Lực Trẻ Hóa "Vũ Trụ Bùa
                                    Ngải"</a>
                            </div>
                            <div class="like">
                                <img src="{{ asset('frontend/img/like.png') }}" alt="">
                                <img src="{{ asset('frontend/img/view.png') }}" alt="">
                            </div>
                            <div class="text">
                                <p><b>Thiên Thần Hộ Mệnh</b> phức tạp, nhiều twist và rõ nhất là trẻ hơn!</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blog-film">

                    <div class="item-comment">
                        <div class="image-item-comment">
                            <img src="{{ asset('frontend/img/Thiên thần hộ mệnh.png') }}" alt="">
                        </div>
                        <div class="text-comment">
                            <div class="title-comment">
                                <a href="#">[Review] Thiên Thần Hộ Mệnh: Victor Vũ Và Nỗ Lực Trẻ Hóa "Vũ Trụ Bùa
                                    Ngải"</a>
                            </div>
                            <div class="like">
                                <img src="{{ asset('frontend/img/like.png') }}" alt="">
                                <img src="{{ asset('frontend/img/view.png') }}" alt="">
                            </div>
                            <div class="text">
                                <p><b>Thiên Thần Hộ Mệnh</b> phức tạp, nhiều twist và rõ nhất là trẻ hơn!</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blog-film">

                    <div class="item-comment">
                        <div class="image-item-comment">
                            <img src="{{ asset('frontend/img/Thiên thần hộ mệnh.png') }}" alt="">
                        </div>
                        <div class="text-comment">
                            <div class="title-comment">
                                <a href="#">[Review] Thiên Thần Hộ Mệnh: Victor Vũ Và Nỗ Lực Trẻ Hóa "Vũ Trụ Bùa
                                    Ngải"</a>
                            </div>
                            <div class="like">
                                <img src="{{ asset('frontend/img/like.png') }}" alt="">
                                <img src="{{ asset('frontend/img/view.png') }}" alt="">
                            </div>
                            <div class="text">
                                <p><b>Thiên Thần Hộ Mệnh</b> phức tạp, nhiều twist và rõ nhất là trẻ hơn!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="discout">
        <div class="title-film">
            <div class="title-item">
                <a href="#">Tin khuyến mãi</a>
            </div>
        </div>
        <div class="item-discout">
            <div class="item-discout-film">
                <img src="{{ asset('frontend/img/discount.png') }}" alt="">
                <div class="text-discount">
                    <div class="text-detail">
                        <p class="title-discount">Ngày thành viên</p>
                        <p>Bước sang năm mới, Galaxy dành tặng các Stars thêm một ngày tràn đầy “yêu thương” – Milo Day.
                        </p>
                    </div>
                    <div class="view-more-discount">
                        <button>Chi tiết</button>
                    </div>
                </div>
            </div>
            <div class="item-discout-film">
                <img src="{{ asset('frontend/img/discount.png') }}" alt="">
                <div class="text-discount">
                    <div class="text-detail">
                        <p class="title-discount">Ngày thành viên</p>
                        <p>Bước sang năm mới, Galaxy dành tặng các Stars thêm một ngày tràn đầy “yêu thương” – Milo Day.
                        </p>
                    </div>
                    <div class="view-more-discount">
                        <button>Chi tiết</button>
                    </div>
                </div>
            </div>
            <div class="item-discout-film">
                <img src="{{ asset('frontend/img/discount.png') }}" alt="">
                <div class="text-discount">
                    <div class="text-detail">
                        <p class="title-discount">Ngày thành viên</p>
                        <p>Bước sang năm mới, Galaxy dành tặng các Stars thêm một ngày tràn đầy “yêu thương” – Milo Day.
                        </p>
                    </div>
                    <div class="view-more-discount">
                        <button>Chi tiết</button>
                    </div>
                </div>
            </div>
            <div class="item-discout-film">
                <img src="{{ asset('frontend/img/discount.png') }}" alt="">
                <div class="text-discount">
                    <div class="text-detail">
                        <p class="title-discount">Ngày thành viên</p>
                        <p>Bước sang năm mới, Galaxy dành tặng các Stars thêm một ngày tràn đầy “yêu thương” – Milo Day.
                        </p>
                    </div>
                    <div class="view-more-discount">
                        <button>Chi tiết</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

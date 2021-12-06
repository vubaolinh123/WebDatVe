@extends('Frontend.layout_web')
@section('conten.web')
    <div class="slideshow">


    </div>





    <div style="padding: 0 32px" class="pt-4">

        <!-- Tab links -->
        <div class="tabs">
            <button class="tablinks active" data-electronic="filmHomeDeleted0s">Phim đang chiếu</button>
            <button class="tablinks" data-electronic="filmHomeDeleted1s">Phim sắp chiếu</button>
        </div>

        <!-- Tab content -->
        <div style="margin-top: 30px" class="wrapper_tabcontent ">
            <div id="filmHomeDeleted0s" class="tabcontent active">
                <div class="row">
                    @if (count($filmHomeDeleted0s) > 0)
                        @foreach ($filmHomeDeleted0s as $filmHomeDeleted0)
                            <div class="col-xs-2 mb-5">
                                <div class="item-film">
                                    <a style="position: relative"
                                        href="{{ route('web.detailFim', ['id_film' => $filmHomeDeleted0->id_film, 'slug' => \Str::slug($filmHomeDeleted0->name)]) }}">
                                        <div data-id="{{ $filmHomeDeleted0->id_film }}"
                                            class="film_img film_img_{{ $filmHomeDeleted0->id_film }}"
                                            style="background-image: url({{ asset("$URL_IMG_FILM/$filmHomeDeleted0->avatar") }})">
                                        </div>
                                        @if ($filmHomeDeleted0->trailer)

                                            <iframe class="i-f-h frame_{{ $filmHomeDeleted0->id_film }}"
                                                style="display: none" width="100%" height="300"
                                                src="https://www.youtube.com/embed/{{ $filmHomeDeleted0->trailer }}"
                                                title="YouTube video player" frameborder="0"
                                                allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen autoplay=1></iframe>
                                        @else
                                            <div class="i-f-h frame_{{ $filmHomeDeleted0->id_film }}"
                                                style="display: none" width="100%" height="300">No trailer</div>
                                        @endif
                                        <a class="i-f-l links_{{ $filmHomeDeleted0->id_film }}"
                                            href="{{ route('web.detailFim', ['id_film' => $filmHomeDeleted0->id_film, 'slug' => \Str::slug($filmHomeDeleted0->name)]) }}"
                                            style="position: absolute ;
                                                            top : 0 ;
                                                            left : 0 ;
                                                            right : 0 ;
                                                            text-align: center ;
                                                            text-decoration: none ;
                                                            display : none ;
                                                            padding : 10px 10px ;
                                                            background-image : url({{ asset("$URL_IMG_FILM/$filmHomeDeleted0->avatar") }}) ;
                                                            color : white ;
                                                            font-weight : bold ;
                                                            cursor: pointer;
                                                            border-radius : 10px
                                                            ">Mua vé</a>
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
                    @else
                        <h3> Rất tiếc không có phim cho bạn !</h3>
                    @endif
                </div>

                {{-- <div class="view-more">
                    <button>Xem thêm <i class="fas fa-arrow-right"></i></button>
                </div> --}}
            </div>


            <div id="filmHomeDeleted1s" class=" tabcontent ">
                <div class="row">

                    @foreach ($filmHomeDeleted1s as $filmHomeDeleted1)
                        <div class="col-xs-2 mb-5">
                            <div class="item-film">
                                <a
                                    href="{{ route('web.detailFim', ['id_film' => $filmHomeDeleted1->id_film, 'slug' => \Str::slug($filmHomeDeleted1->name)]) }}">
                                    <div class="film_img"
                                        style="background-image: url({{ asset("$URL_IMG_FILM/$filmHomeDeleted1->avatar") }})">
                                    </div>
                                    <p class="text-black">
                                        {{ $filmHomeDeleted1->name }}
                                    </p>
                                    <a href="#" class="text-gray">
                                        {{ $filmHomeDeleted1->nameTypeFilm }}
                                    </a>
                                </a>
                                </a>

                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="view-more">
                    <button>Xem thêm <i class="fas fa-arrow-right"></i></button>
                </div>
            </div>

        </div>
    </div>

    <div style="padding: 0 32px" class="cinema-area">
        <div class="tabs">
            <h2 class="tablinks active">Các rạp </h2>
        </div>
        @foreach ($clusterCinema as $cluster)
            @foreach ($cluster->cinema as $item)
            <div style="padding:20px" class="row">
                <div class="col-sm-1">
                    <img style="width:100px ; height : 100px ; border-radius:50%"  src="{{ URL::to('storage/' . $item->image) }}" alt="">
                </div>
                <div class="col-sm-10">
                    <h3>
                        {{ $item -> name }}
                    </h2>
                </div>
            </div>
            @endforeach
        @endforeach
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

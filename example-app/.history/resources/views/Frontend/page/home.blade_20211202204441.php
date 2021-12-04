@extends('Frontend.layout_web')
@section('conten.web')
<style>
    a{


    }
</style>
    <div style="height:600px ; width : 100% ; position: relative;" class="">

        <div style="background : black ; " class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach ($filmHomeDeleted0s as $filmHomeDeleted0)
                    <div style="width: 60% ; height : 500px ; overflow: hidden;border-radius : 20px;  box-shadow: 1px 1px 25px rgb(250, 250, 250) ;  position: relative;"
                        class="swiper-slide">
                        <img class="s-i-g showImgSli_{{ $filmHomeDeleted0->id_film }}" style="height:100% ; width : 40% ; top : 0 ; left:0; position: absolute;"
                            src="{{ asset("$URL_IMG_FILM/$filmHomeDeleted0->avatar") }}" />

                            <iframe class="h-i-f showVido_{{ $filmHomeDeleted0->id_film }}"  style="display: none;height:100% ; width : 40% ; top : 0 ; left:0; position: absolute;" class="i-f-h  {{ $filmHomeDeleted0->id_film }}"

                                src="https://www.youtube.com/embed/{{ $filmHomeDeleted0->trailer }}"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen autoplay=1></iframe>


                        <img style="height:100% ; width : 60% ; top : 0  ; opacity : .3; right:0; position: absolute;"
                            src="{{ asset("$URL_IMG_FILM/$filmHomeDeleted0->avatar") }}" />
                        <div
                            style="z-index:3;transform: translate(-75% , -50%); top : 50%  ;  left : 25%; position: absolute;">

                           <button data-id="{{   $filmHomeDeleted0->id_film }}" class="btn-hv btn-click-slide" style="width : 100px">
                                <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="play-circle"
                                class="svg-inline--fa fa-play-circle fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512">
                                <path fill="white"
                                    d="M371.7 238l-176-107c-15.8-8.8-35.7 2.5-35.7 21v208c0 18.4 19.8 29.8 35.7 21l176-101c16.4-9.1 16.4-32.8 0-42zM504 256C504 119 393 8 256 8S8 119 8 256s111 248 248 248 248-111 248-248zm-448 0c0-110.5 89.5-200 200-200s200 89.5 200 200-89.5 200-200 200S56 366.5 56 256z">
                                </path>
                            </svg>
                           </button>
                        </div>
                        <div style="
                                color : white ;
                                text-transform:  uppercase;
                                height:100% ;
                                width : 40% ;
                                top : 20% ;
                                right:10%;
                                position: absolute;">
                            <h2 style=" font-size: 50px ;
                                    font-weight: bold;">{{ $filmHomeDeleted0->name }}</h2>
                            <p>{{ $filmHomeDeleted0->nameTypeFilm }}</p>
                            <p>Thời gian : {{ date('h:i', strtotime($filmHomeDeleted0->time)) }}</p>
                            <small style="color : rgb(175, 175, 175)">
                                {{ $filmHomeDeleted0->cast }}
                            </small>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
        <div
            style=" position:absolute;
            width : 70% ;
            height : 100px ; background : rgb(255, 255, 255) ;
            left: 50%;
            transform:  translate(-50% , -50%);
            bottom: -100px ; z-index:3 ; border-radius : 10px ; padding :10px ; display : grid ;    grid-template-columns: 1fr 1fr 1fr 1fr 100px"
        >

            <div>
               <label for=""> Phim</label>
                <select class="  form-control" name="" id="">
                    <option value="">ABC</option>
                    <option value="">ABC</option>
                </select>
            </div>

            <div>
              <label for="">  Rap</label>
                <select class="  form-control" name="" id="">
                    <option value="">ABC</option>
                    <option value="">ABC</option>
                </select>
            </div>
            <div>
               <label for=""> Ngay xem</label>
                <select class="  form-control" name="" id="">
                    <option value="">ABC</option>
                    <option value="">ABC</option>
                </select>
            </div>
            <div>
                <label for="">Xuat chieu</label>
                <select class="  form-control" name="" id="">
                    <option value="">ABC</option>
                    <option value="">ABC</option>
                </select>
            </div>
            <div>         <button class="btn m-5 btn-primary">Mua ve</button>           </div>
            {{-- <div>
                <select class="  form-control" name="" id="">
                    <option value="">ABC</option>
                    <option value="">ABC</option>
                </select>
            </div> --}}
        </div>
    </div>

<br>
<br>
<br>
<br>

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

    <div style="padding: 0 32px ; margin : 0 auto ; width : 90%" class="cinema-area">
        <div class="tabs">
            <h2 class="tablinks active">Các rạp </h2>
        </div>
        @foreach ($clusterCinema as $cluster)
            @foreach ($cluster->cinema as $item)
                <a href="{{ route('web.show.cinema', ['id' => $item->id, 'slug' => \Str::slug($item->name)]) }}"
                    style="padding:20px ; margin : 0 auto" class="row">
                    <div class="col-sm-1">
                        <img style="width:60px ; height : 60px ; border-radius:50%"
                            src="{{ URL::to('storage/' . $item->image) }}" alt="">
                    </div>
                    <div class="col-sm-10">
                        <h3>
                            {{ $item->name }}
                        </h3>
                    </div>
                </a>
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

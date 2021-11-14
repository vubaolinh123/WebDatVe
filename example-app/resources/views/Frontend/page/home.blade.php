@extends('Frontend.layout_web')
@section('conten.web')
    <div class="slideshow">


    </div>

    <div class="category-film">
        <div class="title-film">
            <div class="title-item">
                <a href="#">phim đang chiếu</a>
            </div>
            <div class="title-item">
                <a href="#">phim đang chiếu</a>
            </div>
        </div>

        <div class="film">
            <div class="content">
                <div class="item-film">
                    <a href="{{ route('web.detailFim') }}">
                        <img src="{{ asset('frontend/img/image 1.png') }}" alt="">
                    </a>
                    <div class="text-film">
                        <a href="#"><button>Mua vé</button></a>
                    </div>
                    <p class="text-black">THE CONJURING: THE DEVIL MADE ME DO IT
                    </p>
                    <p class="text-gray">THE CONJURING: MA XUI QUỶ KHIẾN
                    </p>
                </div>
                <div class="item-film">
                    <a href="{{ route('web.detailFim') }}">
                        <img src="{{ asset('frontend/img/image 1.png') }}" alt="">
                    </a>
                    <p class="text-black">THE CONJURING: THE DEVIL MADE ME DO IT
                    </p>
                    <p class="text-gray">THE CONJURING: MA XUI QUỶ KHIẾN
                    </p>
                </div>
                <div class="item-film">
                    <a href="{{ route('web.detailFim') }}">
                        <img src="{{ asset('frontend/img/image 1.png') }}" alt="">
                    </a>
                    <p class="text-black">THE CONJURING: THE DEVIL MADE ME DO IT
                    </p>
                    <p class="text-gray">THE CONJURING: MA XUI QUỶ KHIẾN
                    </p>
                </div>
                <div class="item-film">
                    <a href="{{ route('web.detailFim') }}">
                        <img src="{{ asset('frontend/img/image 1.png') }}" alt="">
                    </a>
                    <p class="text-black">THE CONJURING: THE DEVIL MADE ME DO IT
                    </p>
                    <p class="text-gray">THE CONJURING: MA XUI QUỶ KHIẾN
                    </p>
                </div>
                <div class="item-film">
                    <a href="{{ route('web.detailFim') }}">
                        <img src="{{ asset('frontend/img/image 1.png') }}" alt="">
                    </a>
                    <p class="text-black">THE CONJURING: THE DEVIL MADE ME DO IT
                    </p>
                    <p class="text-gray">THE CONJURING: MA XUI QUỶ KHIẾN
                    </p>
                </div>
            </div>

            <div class="view-more">
                <button>Xem thêm <i class="fas fa-arrow-right"></i></button>
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

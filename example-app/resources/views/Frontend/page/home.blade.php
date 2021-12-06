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

                    @foreach ($filmHomeDeleted0s as $filmHomeDeleted0)
                        <div class="col-xs-2 mb-5">
                            <div class="item-film">
                                <a
                                    href="{{ route('web.detailFim', ['id_film' => $filmHomeDeleted0->id_film, 'slug' => \Str::slug($filmHomeDeleted0->name)]) }}">
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

                <div class="view-more">
                    <button>Xem thêm <i class="fas fa-arrow-right"></i></button>
                </div>
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
                                        {{ $filmHomeDeleted0->nameTypeFilm }}
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

    <div class="blog-container">
        <div class="row">
            @foreach ($typeBlogs as $typeBlog)
                <div class="col-xs-6 mb-5">
                    <div class="blog-item">

                        <div class="title-film">
                            <div class="title-item">
                                <a href="#">{{ $typeBlog->name }}</a>
                            </div>
                        </div>
                        <div class="comment-conten">
                            @foreach ($typeBlog->blogss as $blog)
                                <div class="item-comment ">
                                    <a href="{{ route('web.detailBlog', ['id_blog' => $blog->id_blog]) }}">
                                        <div style="background-image: url({{ asset("$URL_IMG_BLOG/$blog->mainimg_blog") }})"
                                            class="item-comment_image">
                                        </div>
                                    </a>
                                    <div class="item-comment_conten">
                                        <div class="title-comment">
                                            <a href="{{ route('web.detailBlog', ['id_blog' => $blog->id_blog]) }}">
                                                {!! $blog->title_blog !!}
                                            </a>
                                        </div>
                                        <div id="fb-root"></div>
                                        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0"
                                                                                nonce="J9qJac5o"></script>
                                        <div class="fb-like"
                                            data-href="https://developers.facebook.com/docs/plugins/" data-width=""
                                            data-layout="standard" data-action="like" data-size="small" data-share="true">
                                        </div>
                                        <div class="text">
                                            {!! $blog->conten_blog !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            @endforeach
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
            @foreach ($news as $new)
            <div class="item-discout-film">
                <img style="width:100%" src="{{ asset("$URL_IMG_BLOG/$new->image_news") }}" alt="">
                <div class="text-discount">
                    <div class="text-detail">
                        <p class="title-discount">{!! $new->title_news !!}</p>
                        <p> {!! Str::limit($new->content_news, 100) !!}</p>
                    </div>
                    <div class="view-more-discount">
                        <a href="{{ route('web.detail_news', ['id_news'=>$new->id_news]) }}">Chi tiet</a>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>

@endsection

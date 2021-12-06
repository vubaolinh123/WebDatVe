@extends('Frontend.layout_web')
@section('conten.web')

    <div class="container">
        <div class="row">
            <div class="col-xs-8 ">
                <div class="title_blog my-16">

                    {!! $news->title_news !!}

                </div>
                <div class="conten_blog my-16">

                    {!! $news->content_news !!}

                </div>
            </div>
            <div class="col-xs-4 ">
                <div class="">
                    <h2 class="text-xl mt-6">NHẬN KHUYẾN MÃI</h2>
                    <form action="" class="border-black border p-6 my-8">
                        <input type="email" placeholder="Email" class="p-2 w-full border mb-3" required>
                        <input type="submit" class="bg-cam block text-white px-3 py-2 w-full cursor-pointer"
                            value="Đăng Ký">
                    </form>
                    <div class="film">
                        <h2 class="text-3xl">PHIM ĐANG CHIẾU</h2>
                        @foreach ($filmHomeDeleted0s as $filmHomeDeleted0)
                            <div class="film_item my-4">
                                <a
                                    href="{{ route('web.detailFim', ['id_film' => $filmHomeDeleted0->id_film, 'slug' => \Str::slug($filmHomeDeleted0->name)]) }}">

                                    <div class="group"
                                        style="background-image: url({{ asset("$URL_IMG_FILM/$filmHomeDeleted0->avatar") }})">

                                    </div>
                                    <h3 class="">{{ $filmHomeDeleted0->name }}</h3>
                                </a>

                            </div>
                        @endforeach
                    </div>

                    <div class="text-right">
                        <a href="#"
                            class="inline-block my-10 cam border px-7 py-4 border-cam hover:text-white hover:bg-camx">XEM
                            THÊM</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
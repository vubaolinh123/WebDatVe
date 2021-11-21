@extends('Frontend.layout_web')
@section('conten.web')

    <!-- Main Chi Tiết Phim -->
    <div class="py-8 px-36">
        <h2 class="py-4">Trang chủ > Phim > <span class="font-bold">{{ $film->name }}</span></h2>
        <!-- Wrapper -->
        <div class="">
            <div class="grid grid-cols-3 gap-10">
                <!-- Thông Tin Chi Tiết Phim  -->
                <div class="col-span-2">
                    <div class="grid grid-cols-3 gap-7 ">
                        <div class="">
                            <img src="{{ asset("$URL_IMG_FILM/$film->avatar") }}" alt="">
                        </div>
                        <div class="col-span-2 ">
                            <h1 class="text-3xl">{{ $film->name }}</h1>
                            <div class="my-3">
                                <i class="fas fa-star cam text-2xl"></i>
                                <span class="inline-block mx-3 text-2xl">10.0/10</span>
                                <a href="#" class="bg-cam text-gray-100 px-2 py-1 mx-2 inline-block text-xl">Đánh
                                    giá</a>
                            </div>
                            <div class="">
                                <span class="text-white bg-cam inline-block px-1 py-1 text-2xl">C18</span>
                                <i class="far fa-clock inline-block mx-2 text-2xl"></i>
                                <span class="text-2xl"> {{ date('H:i:s', strtotime($film->time)) }}</span>
                            </div>
                            <div class="my-16">
                                <span class="text-gray-500 block text-xl">Thể loại:
                                    <span class="text-black">
                                        @foreach ($type_films as $type_film)
                                            @if ($film->film_type_id == $type_film->id_film_type)
                                                {{ $type_film->name }}
                                            @endif
                                        @endforeach
                                        {{-- {{ $type_film->name }} --}}
                                    </span>
                                </span>
                                <span class="text-gray-500 block text-xl">Quốc gia:
                                    <span class="text-black">{{ $film->nation }}</span>
                                </span>

                                <span class="text-gray-500 block text-xl">Nhà SX:
                                    <span class="text-black">
                                        {{ $film->producer }}
                                    </span>
                                </span>
                                <span class="text-gray-500 block text-xl">Ngày chiếu:
                                    <span class="text-black">
                                        {{ date('d / m / Y ', strtotime($film->premiere_date)) }}
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- NỘI DUNG PHIM  -->
                    <div class="">
                        <span class="text-xl my-5 block font-bold">NỘI DUNG PHIM</span>
                        <div>{!! $film->summary !!}</div>
                    </div>
                    <!-- END NỘI DUNG PHIM -->
                    <!-- LỊCH CHIẾU  -->
                    <div class="py-5">
                        <span class="text-xl my-5 block font-bold">LỊCH CHIẾU</span>
                        <div class="grid grid-cols-3 gap-5">
                            <div class="">
                                <select name="select-ca-nuoc" id="select_city" class="w-full py-2 px-2 border-black border">

                                    @foreach ($citys as $city)
                                        <option @if (Session::get('cityAddress') == $city->code)
                                            {{ 'selected' }}
                                            @endif value="{{ $city->code }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if (count($cinemaOfFilms) == 0)
                                <p style="font-weight: bold" class="btn bg-dark" value="">Phim hiện tại không có rạp!</p>
                            @else
                                <div class="">
                                    <input type="date" value="{{ $_GET['date'] ?? '' }}" id="date_change"
                                        class="w-full py-2 px-2 border-black border">
                                </div>
                                <div class="">
                                    <select name="select-ca-rap" id="" class="w-full py-2 px-2 border-black border">
                                        <option value="">Tất Cả Rạp</option>
                                        @foreach ($cinemaOfFilms as $cinemaOfFilm)
                                            <option value="{{ $cinemaOfFilm->id }}">{{ $cinemaOfFilm->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            @endif
                        </div>
                    </div>
                    <!-- END LỊCH CHIẾU -->
                    <!-- CÁC RẠP ĐANG CHIẾU -->
                    <div class="">
                        @if (count($cinemaOfFilms) == 0)
                            <img width="100%"
                                src="https://i1.wp.com/www.huratips.com/wp-content/uploads/2019/04/empty-cart.png?fit=603%2C288&ssl=1"
                                alt="">
                        @else
                            @foreach ($cinemaOfFilms as $cinemaOfFilm)
                                <div class="py-5">
                                    <span
                                        class="inline-block bg-camx text-white px-3 py-2">{{ $cinemaOfFilm->name }}</span>
                                    <div class="px-5 py-6 border border-black">
                                        @foreach ($cinemaRooms as $cinemaRoom)
                                            @if ($cinemaRoom->cinema_id == $cinemaOfFilm->id)
                                                <div class="mb-12 m-2">
                                                    <span class="inline-block mr-5"> Phòng :
                                                        {{ $cinemaRoom->id_cinema_room }}</span>
                                                    @foreach ($cinemaRoom->show_time as $time)
                                                        @if ($film->id_film == $time->film_id)
                                                            <a href="{{ route('web.book', ['id' => $cinemaRoom->id_cinema_room]) }}"
                                                                class="inline-block border border-cam px-2 py-1 mr-3 hover:text-white hover:bg-camx cursor-pointer">
                                                                Thời gian
                                                                {{ date('H:i', strtotime($time->start_time)) }}
                                                            </a>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <!-- END CÁC RẠP ĐANG CHIẾU -->
                </div>
                <!-- END THÔNG TIN CHI TIẾT PHIM  -->
                <!-- DANH SÁCH PHIM BÊN CẠNH  -->
                <div class="">
                    <h2 class="text-xl mt-6">NHẬN KHUYẾN MÃI</h2>
                    <form action="" class="border-black border p-6 my-8">
                        <input type="email" placeholder="Email" class="p-2 w-full border mb-3" required>
                        <input type="submit" class="bg-cam block text-white px-3 py-2 w-full cursor-pointer"
                            value="Đăng Ký">
                    </form>
                    <h2 class="text-xl">PHIM ĐANG CHIẾU</h2>
                    <div class="my-4">
                        <div class="group">
                            <img src="{{ asset('frontend/img/movie1.png') }}" alt="" class="">
                        </div>
                        <span class="text-base">THE CONJURING: THE DEVIL MADE ME DO IT</span>
                        <span class="text-gray-400 block text-sm">THE CONJURING: MA XUI QUỶ KHIẾN
                        </span>
                    </div>
                    <div class="my-4">
                        <img src="{{ asset('frontend/img/movie1.png') }}" alt="" class="">
                        <span class="text-base">THE CONJURING: THE DEVIL MADE ME DO IT</span>
                        <span class="text-gray-400 block text-sm">THE CONJURING: MA XUI QUỶ KHIẾN
                        </span>
                    </div>
                    <div class="my-4">
                        <img src="{{ asset('frontend/img/movie1.png') }}" alt="" class="">
                        <span class="text-base">THE CONJURING: THE DEVIL MADE ME DO IT</span>
                        <span class="text-gray-400 block text-sm">THE CONJURING: MA XUI QUỶ KHIẾN
                        </span>
                    </div>
                    <div class="text-right">
                        <a href="#"
                            class="inline-block my-10 cam border px-7 py-4 border-cam hover:text-white hover:bg-camx">XEM
                            THÊM</a>
                    </div>
                </div>
                <!-- END DANH SÁCH PHIM BÊN CẠNH -->
            </div>
        </div>
        <!-- END Wrapper  -->
    </div>
    <!-- END Main Chi Tiết Phim  -->
@endsection

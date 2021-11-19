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
                                <select name="select-ca-nuoc" id="" class="w-full py-2 px-2 border-black border">
                                    <option value="">Cả Nước</option>
                                    @foreach ($clusterCinemas as $clusterCinema)
                                        <option value="{{ $clusterCinema->id }}">{{ $clusterCinema->name }}</option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="">
                                <input type="date" class="w-full py-2 px-2 border-black border">
                            </div>
                            <div class="">
                                <select name="select-ca-rap" id="" class="w-full py-2 px-2 border-black border">
                                    <option value="">Tất Cả Rạp</option>
                                    @foreach ($cinemas as $cinema)
                                        <option value="{{ $cinema->id_cinema }}">{{ $cinema->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- END LỊCH CHIẾU -->
                    <!-- CÁC RẠP ĐANG CHIẾU -->
                    <div class="">
                        @php
                            $arr = [];
                        @endphp
                        @foreach ($showtimes as $showtime)
                            @if (in_array($showtime->cinema_id, $arr))
                            @else
                                <?php array_push($arr, $showtime->cinema_id); ?>
                                <div class="py-5">
                                    <span class="inline-block bg-camx text-white px-3 py-2">{{ $showtime->name }}</span>
                                    <div class="px-5 py-6 border border-black">
                                        <div class="mb-8">
                                            <span class="inline-block mr-5">2D PHỤ ĐỀ</span>
                                            @php
                                                // $countcinema_id = array_count_values($showtimes);
                                                // echo '<pre>';
                                                // print_r(array_count_values($countcinema_id));
                                                // echo '</pre>';
                                                // die();
                                            @endphp
                                            @if ($showtimes)

                                                @foreach ($showtimes as $showtime)
                                                    <span
                                                        class="inline-block border border-cam px-2 py-1 mr-3 hover:text-white hover:bg-camx cursor-pointer">
                                                        {{ date('H:i', strtotime($showtime->start_time)) }}
                                                    </span>
                                                @endforeach
                                            @else
                                                <span
                                                    class="inline-block border border-cam px-2 py-1 mr-3 hover:text-white hover:bg-camx cursor-pointer">
                                                    {{ date('H:i', strtotime($showtime->start_time)) }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
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

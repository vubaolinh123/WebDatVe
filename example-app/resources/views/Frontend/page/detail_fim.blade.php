@extends('Frontend.layout_web')
@section('conten.web')

    <!-- Main Chi Tiết Phim -->
    <div class="py-8 px-36">
        <h2 class="py-4">Trang chủ > Phim > <span class="font-bold">Space Jam: A New Legacy</span></h2>
        <!-- Wrapper -->
        <div class="">
            <div class="grid grid-cols-3 gap-10">
                <!-- Thông Tin Chi Tiết Phim  -->
                <div class="col-span-2">
                    <div class="grid grid-cols-3 gap-7 ">
                        <div class="">
                            <img src="{{ asset('frontend/img/movie.png') }}" alt="">
                        </div>
                        <div class="col-span-2 py-4">
                            <h2 class="text-3xl">Space Jam: A New Legacy</h2>
                            <div class="my-3">
                                <i class="fas fa-star cam text-2xl"></i>
                                <span class="inline-block mx-3 text-2xl">10.0/10</span>
                                <a href="#" class="bg-cam text-gray-100 px-2 py-1 mx-2 inline-block text-xl">Đánh
                                    giá</a>
                            </div>
                            <div class="">
                                <span class="text-white bg-cam inline-block px-1 py-1 text-2xl">C18</span>
                                <i class="far fa-clock inline-block mx-2 text-2xl"></i>
                                <span class="text-2xl">129p</span>
                            </div>
                            <div class="my-16">
                                <span class="text-gray-500 block text-xl">Thể loại: <span class="text-black">Kinh
                                        dị, Ly
                                        Kì</span></span>
                                <span class="text-gray-500 block text-xl">Quốc gia: <span
                                        class="text-black">Đức</span></span>
                                <span class="text-gray-500 block text-xl">Đạo diễn: <span class="text-black">Mike P.
                                        Nelson
                                    </span></span>
                                <span class="text-gray-500 block text-xl">Nhà SX: <span class="text-black">Constantin
                                        Film</span></span>
                                <span class="text-gray-500 block text-xl">Ngày: <span class="text-black"> 29/10/2021
                                    </span></span>
                            </div>
                        </div>
                    </div>
                    <!-- NỘI DUNG PHIM  -->
                    <div class="">
                        <span class="text-xl my-5 block font-bold">NỘI DUNG PHIM</span>
                        <span class="text-base"><strong>The Conjuring: The Devil Made Me Do It</strong> tiếp tục kể
                            về
                            một
                            vụ án có
                            thật từng làm chấn
                            động thế giới.</span>
                        <span class="text-base block my-3">Arne đã sát hại Alan Bono, một quản lý cũi nhốt động vật có
                            mối quan
                            hệ thân thiết với anh ta. Tuy nhiên, kẻ sát nhân và những người thân khẳng định rằng
                            "chính ma quỷ đã dẫn dắt làm việc này"</span>
                        <span class="text-base">Phim mới The Conjuring: The Devil Made Me Do It ra mắt tại các rạp
                            chiếu
                            phim từ 05.11.2021.</span>
                    </div>
                    <!-- END NỘI DUNG PHIM -->
                    <!-- LỊCH CHIẾU  -->
                    <div class="py-5">
                        <span class="text-xl my-5 block font-bold">LỊCH CHIẾU</span>
                        <div class="grid grid-cols-3 gap-5">
                            <div class="">
                                <select name="select-ca-nuoc" id="" class="w-full py-2 px-2 border-black border">
                                    <option value="">Cả Nước</option>
                                    <option value="">TEST1</option>
                                    <option value="">TEST2</option>
                                    <option value="">TEST3</option>
                                </select>
                            </div>
                            <div class="">
                                <input type="date" class="w-full py-2 px-2 border-black border">
                            </div>
                            <div class="">
                                <select name="select-ca-rap" id="" class="w-full py-2 px-2 border-black border">
                                    <option value="">Tất Cả Rạp</option>
                                    <option value="">TEST1</option>
                                    <option value="">TEST2</option>
                                    <option value="">TEST3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- END LỊCH CHIẾU -->
                    <!-- CÁC RẠP ĐANG CHIẾU -->
                    <div class="">
                        <div class="py-5">
                            <span class="inline-block bg-camx text-white px-3 py-2">Galaxy Hà Nội</span>
                            <div class="px-5 py-6 border border-black">
                                <div class="mb-8">
                                    <span class="inline-block mr-5">2D PHỤ ĐỀ</span>
                                    <span
                                        class="inline-block border border-cam px-2 py-1 mr-3 hover:text-white hover:bg-camx cursor-pointer">19:00</span>
                                    <span
                                        class="inline-block border border-cam px-2 py-1 mr-3 hover:text-white hover:bg-camx
                                    cursor-pointer">22:30</span>
                                </div>
                                <div class="mb-8">
                                    <span class="inline-block mr-5">3D PHỤ ĐỀ</span>
                                    <span
                                        class="inline-block border border-cam px-2 py-1 mr-3 hover:text-white hover:bg-camx
                                    cursor-pointer">19:00</span>
                                    <span
                                        class="inline-block border border-cam px-2 py-1 mr-3 hover:text-white hover:bg-camx
                                    cursor-pointer">22:30</span>
                                </div>
                            </div>
                        </div>
                        <div class="py-5">
                            <span class="inline-block bg-camx text-white px-3 py-2">Galaxy Hồ Chí Minh</span>
                            <div class="px-5 py-6 border border-black">
                                <div class="mb-8">
                                    <span class="inline-block mr-5">2D PHỤ ĐỀ</span>
                                    <span
                                        class="inline-block border border-cam px-2 py-1 mr-3 hover:text-white hover:bg-camx cursor-pointer">19:00</span>
                                    <span
                                        class="inline-block border border-cam px-2 py-1 mr-3 hover:text-white hover:bg-camx
                                    cursor-pointer">22:30</span>
                                </div>
                                <div class="mb-8">
                                    <span class="inline-block mr-5">3D PHỤ ĐỀ</span>
                                    <span
                                        class="inline-block border border-cam px-2 py-1 mr-3 hover:text-white hover:bg-camx
                                    cursor-pointer">19:00</span>
                                    <span
                                        class="inline-block border border-cam px-2 py-1 mr-3 hover:text-white hover:bg-camx
                                    cursor-pointer">22:30</span>
                                </div>
                            </div>
                        </div>
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

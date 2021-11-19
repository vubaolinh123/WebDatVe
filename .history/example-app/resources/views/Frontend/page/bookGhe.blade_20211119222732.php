<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/custom.css">
    <link rel="stylesheet" href="../css/book.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Document</title>
</head>

<body>
    <style>
        .cinema-selected::before {
            background-color: #7dc71d;
        }

        .cinema-unavailable::before {
            background-color: #e11c01;
        }

        .cinema-normal::before {
            opacity: 1;
            background-color: rgba(156, 163, 175);
        }

        .cinema-area::before {
            background-color: #0cbfca;
        }

        .seat-cinema span::before {
            content: "";
            display: inline-block;
            width: 10px;
            height: 10px;
            margin-right: 5px;
        }

        h-600px {
            height: 600px;
        }

    </style>
    <div class="container">
        <div class="main overflow-auto">
            <h2 class="text-white text-3xl my-2">CHỌN GHẾ</h2>
            <div class="w-full h-600px bg-white px-5 py-10">
                <div class="w-10/12 my-0 mx-auto ">
                    <div class="grid grid-cols-10 gap-y-3 gap-x-5">
                        <!-- ROW 1  -->
                        @for ($j = 0; $j < $show_time->cinema_room->quantity_col; $j++)
                            <div class="border border-black text-center">{{ $arr[$j] }}</div>
                            <div class="col-span-10">
                                <!-- CÁC HÀNG TỪ 1 - 12 -->
                                <div class="grid grid-cols-12 gap-x-1">
                                    @for ($i = 1; $i <= $show_time->cinema_room->quantity_row; $i++)
                                        <div class="border border-black text-center bg-gray-400">{{ $i }}
                                        </div>
                                    @endfor
                                </div>
                                <!-- END 1 - 12 -->
                            </div>
                            <div class="border border-black text-center">{{ $arr[$j] }}</div>
                        @endfor
                        <!-- ROW 2 -->
                        {{-- <div class="border border-black text-center">B</div> --}}
                        {{-- <div class="col-span-10">
                            <!-- CÁC HÀNG TỪ 1 - 12 -->
                            <div class="grid grid-cols-12 gap-x-1">
                                <div class="border border-black text-center bg-gray-400">1</div>
                                <div class="border border-black text-center bg-gray-400">2</div>
                                <div class="border border-black text-center bg-gray-400">3</div>
                                <div class="border border-black text-center bg-gray-400">4</div>
                                <div class="border border-black text-center bg-gray-400">5</div>
                                <div class="border border-black text-center bg-gray-400">6</div>
                                <div class="border border-black text-center bg-gray-400">7</div>
                                <div class="border border-black text-center bg-gray-400">8</div>
                                <div class="border border-black text-center bg-gray-400">9</div>
                                <div class="border border-black text-center bg-gray-400">10</div>
                                <div class="border border-black text-center bg-gray-400">11</div>
                                <div class="border border-black text-center bg-gray-400">12</div>
                            </div>
                            <!-- END 1 - 12 -->
                        </div>
                        <div class="border border-black text-center">B</div>
                        <!-- ROW 3  -->
                        <div class="border border-black text-center">C</div>
                        <div class="col-span-10">
                            <!-- CÁC HÀNG TỪ 1 - 12 -->
                            <div class="grid grid-cols-12 gap-x-1">
                                <div class="border border-black text-center bg-gray-400">1</div>
                                <div class="border border-black text-center bg-gray-400">2</div>
                                <div class="border border-black text-center bg-gray-400">3</div>
                                <div class="border border-black text-center bg-gray-400">4</div>
                                <div class="border border-black text-center bg-gray-400">5</div>
                                <div class="border border-black text-center bg-gray-400">6</div>
                                <div class="border border-black text-center bg-gray-400">7</div>
                                <div class="border border-black text-center bg-gray-400">8</div>
                                <div class="border border-black text-center bg-gray-400">9</div>
                                <div class="border border-black text-center bg-gray-400">10</div>
                                <div class="border border-black text-center bg-gray-400">11</div>
                                <div class="border border-black text-center bg-gray-400">12</div>
                            </div>
                            <!-- END 1 - 12 -->
                        </div>
                        <div class="border border-black text-center">C</div>
                        <!-- ROW 4 -->
                        <div class="border border-black text-center">D</div>
                        <div class="col-span-10">
                            <!-- CÁC HÀNG TỪ 1 - 12 -->
                            <div class="grid grid-cols-12 gap-x-1">
                                <div class="border border-black text-center bg-gray-400">1</div>
                                <div class="border border-black text-center bg-gray-400">2</div>
                                <div class="border border-black text-center bg-gray-400">3</div>
                                <div class="border border-black text-center bg-gray-400">4</div>
                                <div class="border border-black text-center bg-gray-400">5</div>
                                <div class="border border-black text-center bg-gray-400">6</div>
                                <div class="border border-black text-center bg-gray-400">7</div>
                                <div class="border border-black text-center bg-gray-400">8</div>
                                <div class="border border-black text-center bg-gray-400">9</div>
                                <div class="border border-black text-center bg-gray-400">10</div>
                                <div class="border border-black text-center bg-gray-400">11</div>
                                <div class="border border-black text-center bg-gray-400">12</div>
                            </div>
                            <!-- END 1 - 12 -->
                        </div>
                        <div class="border border-black text-center">D</div>
                        <!-- ROW 5 -->
                        <div class="border border-black text-center">E</div>
                        <div class="col-span-10">
                            <!-- CÁC HÀNG TỪ 1 - 12 -->
                            <div class="grid grid-cols-12 gap-x-1">
                                <div class="border border-black text-center bg-gray-400">1</div>
                                <div class="border border-black text-center bg-gray-400">2</div>
                                <div class="border border-black text-center bg-gray-400">3</div>
                                <div class="border border-black text-center bg-gray-400">4</div>
                                <div class="border border-black text-center bg-gray-400">5</div>
                                <div class="border border-black text-center bg-gray-400">6</div>
                                <div class="border border-black text-center bg-gray-400">7</div>
                                <div class="border border-black text-center bg-gray-400">8</div>
                                <div class="border border-black text-center bg-gray-400">9</div>
                                <div class="border border-black text-center bg-gray-400">10</div>
                                <div class="border border-black text-center bg-gray-400">11</div>
                                <div class="border border-black text-center bg-gray-400">12</div>
                            </div>
                            <!-- END 1 - 12 -->
                        </div>
                        <div class="border border-black text-center">E</div>
                        <!-- ROW 6 -->
                        <div class="border border-black text-center">F</div>
                        <div class="col-span-10">
                            <!-- CÁC HÀNG TỪ 1 - 12 -->
                            <div class="grid grid-cols-12 gap-x-1">
                                <div class="border border-black text-center bg-gray-400">1</div>
                                <div class="border border-black text-center bg-gray-400">2</div>
                                <div class="border border-black text-center bg-gray-400">3</div>
                                <div class="border border-black text-center bg-gray-400">4</div>
                                <div class="border border-black text-center bg-gray-400">5</div>
                                <div class="border border-black text-center bg-gray-400">6</div>
                                <div class="border border-black text-center bg-gray-400">7</div>
                                <div class="border border-black text-center bg-gray-400">8</div>
                                <div class="border border-black text-center bg-gray-400">9</div>
                                <div class="border border-black text-center bg-gray-400">10</div>
                                <div class="border border-black text-center bg-gray-400">11</div>
                                <div class="border border-black text-center bg-gray-400">12</div>
                            </div>
                            <!-- END 1 - 12 -->
                        </div>
                        <div class="border border-black text-center">F</div>
                        <!-- ROW 7 -->
                        <div class="border border-black text-center">G</div>
                        <div class="col-span-10">
                            <!-- CÁC HÀNG TỪ 1 - 12 -->
                            <div class="grid grid-cols-12 gap-x-1">
                                <div class="border border-black text-center bg-gray-400">1</div>
                                <div class="border border-black text-center bg-gray-400">2</div>
                                <div class="border border-black text-center bg-gray-400">3</div>
                                <div class="border border-black text-center bg-gray-400">4</div>
                                <div class="border border-black text-center bg-gray-400">5</div>
                                <div class="border border-black text-center bg-gray-400">6</div>
                                <div class="border border-black text-center bg-gray-400">7</div>
                                <div class="border border-black text-center bg-gray-400">8</div>
                                <div class="border border-black text-center bg-gray-400">9</div>
                                <div class="border border-black text-center bg-gray-400">10</div>
                                <div class="border border-black text-center bg-gray-400">11</div>
                                <div class="border border-black text-center bg-gray-400">12</div>
                            </div>
                            <!-- END 1 - 12 -->
                        </div>
                        <div class="border border-black text-center">G</div>
                        <!-- ROW 8 -->
                        <div class="border border-black text-center">H</div>
                        <div class="col-span-10">
                            <!-- CÁC HÀNG TỪ 1 - 12 -->
                            <div class="grid grid-cols-12 gap-x-1">
                                <div class="border border-black text-center bg-gray-400">1</div>
                                <div class="border border-black text-center bg-gray-400">2</div>
                                <div class="border border-black text-center bg-gray-400">3</div>
                                <div class="border border-black text-center bg-gray-400">4</div>
                                <div class="border border-black text-center bg-gray-400">5</div>
                                <div class="border border-black text-center bg-gray-400">6</div>
                                <div class="border border-black text-center bg-gray-400">7</div>
                                <div class="border border-black text-center bg-gray-400">8</div>
                                <div class="border border-black text-center bg-gray-400">9</div>
                                <div class="border border-black text-center bg-gray-400">10</div>
                                <div class="border border-black text-center bg-gray-400">11</div>
                                <div class="border border-black text-center bg-gray-400">12</div>
                            </div>
                            <!-- END 1 - 12 -->
                        </div>
                        <div class="border border-black text-center">H</div>
                        <!-- ROW 9 -->
                        <div class="border border-black text-center">I</div>
                        <div class="col-span-10">
                            <!-- CÁC HÀNG TỪ 1 - 12 -->
                            <div class="grid grid-cols-12 gap-x-1">
                                <div class="border border-black text-center bg-gray-400">1</div>
                                <div class="border border-black text-center bg-gray-400">2</div>
                                <div class="border border-black text-center bg-gray-400">3</div>
                                <div class="border border-black text-center bg-gray-400">4</div>
                                <div class="border border-black text-center bg-gray-400">5</div>
                                <div class="border border-black text-center bg-gray-400">6</div>
                                <div class="border border-black text-center bg-gray-400">7</div>
                                <div class="border border-black text-center bg-gray-400">8</div>
                                <div class="border border-black text-center bg-gray-400">9</div>
                                <div class="border border-black text-center bg-gray-400">10</div>
                                <div class="border border-black text-center bg-gray-400">11</div>
                                <div class="border border-black text-center bg-gray-400">12</div>
                            </div>
                            <!-- END 1 - 12 -->
                        </div>
                        <div class="border border-black text-center">I</div>
                        <!-- ROW 10 -->
                        <div class="border border-black text-center">J</div>
                        <div class="col-span-10">
                            <!-- CÁC HÀNG TỪ 1 - 12 -->
                            <div class="grid grid-cols-12 gap-x-1">
                                <div class="border border-black text-center bg-gray-400">1</div>
                                <div class="border border-black text-center bg-gray-400">2</div>
                                <div class="border border-black text-center bg-gray-400">3</div>
                                <div class="border border-black text-center bg-gray-400">4</div>
                                <div class="border border-black text-center bg-gray-400">5</div>
                                <div class="border border-black text-center bg-gray-400">6</div>
                                <div class="border border-black text-center bg-gray-400">7</div>
                                <div class="border border-black text-center bg-gray-400">8</div>
                                <div class="border border-black text-center bg-gray-400">9</div>
                                <div class="border border-black text-center bg-gray-400">10</div>
                                <div class="border border-black text-center bg-gray-400">11</div>
                                <div class="border border-black text-center bg-gray-400">12</div>
                            </div>
                            <!-- END 1 - 12 -->
                        </div>
                        <div class="border border-black text-center">J</div>
                        <!-- ROW 11 -->
                        <div class="border border-black text-center">K</div>
                        <div class="col-span-10">
                            <!-- CÁC HÀNG TỪ 1 - 12 -->
                            <div class="grid grid-cols-12 gap-x-1">
                                <div class="border border-black text-center bg-gray-400">1</div>
                                <div class="border border-black text-center bg-gray-400">2</div>
                                <div class="border border-black text-center bg-gray-400">3</div>
                                <div class="border border-black text-center bg-gray-400">4</div>
                                <div class="border border-black text-center bg-gray-400">5</div>
                                <div class="border border-black text-center bg-gray-400">6</div>
                                <div class="border border-black text-center bg-gray-400">7</div>
                                <div class="border border-black text-center bg-gray-400">8</div>
                                <div class="border border-black text-center bg-gray-400">9</div>
                                <div class="border border-black text-center bg-gray-400">10</div>
                                <div class="border border-black text-center bg-gray-400">11</div>
                                <div class="border border-black text-center bg-gray-400">12</div>
                            </div>
                            <!-- END 1 - 12 -->
                        </div>
                        <div class="border border-black text-center">K</div> --}}
                    </div>
                    <!-- END ROW  -->
                    <!-- Màn HÌNH  -->
                    <div class="text-center my-5 px-24">
                        <span class="border-b-4 border-black block">Màn Hình</span>
                    </div>
                    <!-- END MÀN HÌNH  -->
                    <div class="text-center my-14 seat-cinema">
                        <span class="mr-5 cinema-selected">Ghế Đang Chọn</span>
                        <span class="mr-5 cinema-unavailable">Ghế Đã Bán</span>
                        <span class="mr-5 cinema-normal">Có Thể Chọn</span>
                        <span class="mr-5 cinema-area">Không Thể Chọn</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-left">
            <div class="detail-film">
                <div class="box-detail">
                    <div class="img-film">
                        <img src="./img/movie2.png" alt="">
                        <p class="text-bold">MALIGNANT</p>
                        <p class="text-regulary">Hiện thân tà ác</p>
                    </div>
                    <div class="ticket-icon">
                        <i class="icon-c18"></i>
                        <span style="color:red;">(*) Phim chỉ dành cho khán giả từ 18 tuổi trở lên</span>
                    </div>
                    <div class="ticket-info">
                        <p><b>Rạp : </b>Galaxy Hanoi</p>
                        <p><b>Suất chiếu : </b>20:00 | Thứ hai, 15/11/2021</p>
                        <p><b>Combo : </b>Galaxy Hanoi</p>
                        <p><b>Ghế : </b>Galaxy Hanoi</p>
                    </div>
                    <div class="ticket-price-total">
                        <p class="total-text">Tổng: <span class="money"><label
                                    id="tongtien3"></label></span></p>
                    </div>
                    <div class="view-more">
                        <button>Tiếp tục <i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

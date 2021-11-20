@extends('Frontend.layout_web')
@section('css.web')

    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/custom.css">
    <link rel="stylesheet" href="../css/book.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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

@endsection
@section('conten.web')
    <div class="conten m-10">
        <div class="row ">


            <div class="col-xs-8">
                <div class="main overflow-auto">
                    <h2 class="text-white text-3xl my-2">CHỌN GHẾ</h2>
                    <div class="w-full h-600px bg-white px-5 py-10">
                        <div class="w-10/12 my-0 mx-auto ">
                            <div class="grid grid-cols-12 gap-y-3 gap-x-5">
                                <!-- ROW 1  -->
                                @for ($j = 0; $j < $show_time->cinema_room->quantity_col; $j++)
                                    <div class="border border-black text-center">{{ $arr[$j] }}</div>
                                    <div class="col-span-10">
                                        <!-- CÁC HÀNG TỪ 1 - 12 -->
                                        <div class="grid grid-cols-{{ $show_time->cinema_room->quantity_row }} gap-x-1">
                                            @for ($i = 1; $i <= $show_time->cinema_room->quantity_row; $i++)

                                                <div
                                                    class="border border-black text-center bg-@php
                                            if ($i >=  $show_time->cinema_room->vip_row_start&&
                                                $i <= $show_time->cinema_room->vip_row_end&&
                                                $j >=  $show_time->cinema_room->vip_col_start&&
                                                $j <= $show_time->cinema_room->vip_col_end
                                                ) {
                                              echo 'red';
                                            }else {
                                                echo 'gray';
                                            }
                                        @endphp-400">
                                                    {{ $i }}
                                                </div>

                                            @endfor
                                        </div>
                                        <!-- END 1 - 12 -->
                                    </div>
                                    <div class="border border-black text-center">{{ $arr[$j] }}</div>
                                @endfor
                            </div>
                            <!-- END ROW  -->
                            <!-- Màn HÌNH  -->
                            <div class="text-center my-5 px-24">
                                <span class="border-b-4 border-black block">Màn Hình</span>
                            </div>
                            <!-- END MÀN HÌNH  -->
                            <div class="text-center my-14 seat-cinema">
                                <span class="mr-5 cinema-selected">Ghế Đang Chọn</span>
                                <span class="mr-5 cinema-unavailable">Ghế VIP</span>
                                <span class="mr-5 cinema-normal">Có Thể Chọn</span>
                                <span class="mr-5 cinema-area">Không Thể Chọn</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-4">
                <div class="main-left">
                    <div class="detail-film">
                        <div class="box-detail">
                            <div class="img-film">
                                <img style="height:350px !important" height="100"
                                    src="{{ asset("$URL_IMG_FILM/" . $show_time->film->avatar) }} " alt="">
                                <p class="text-bold">{{ $show_time->film->name }}</p>
                                <p class="text-regulary">{{ $show_time->film->cast }}</p>
                            </div>
                            {{-- <div class="ticket-icon">
                    <i class="icon-c18"></i>
                    <span style="color:red;">(*) Phim chỉ dành cho khán giả từ 18 tuổi trở lên</span>
                </div> --}}
                            <div class="ticket-info">
                                <p><b>Rạp : </b>{{ $show_time->cinema_room->cinema->cluster_cinema->name }} -
                                    {{ $show_time->cinema_room->cinema->name }}</p>
                                <p><b>Suất chiếu : </b>{{ date('h:i', strtotime($show_time->start_time)) }} | Ngày
                                    :
                                    {{ $show_time->show_date }} </p>
                            </div>
                            <div class="ticket-price-total">
                                <p class="total-text">Ghế : <span class="money"><label
                                            id="tongtien3"></label></span>
                                </p>
                            </div>
                            <div class="view-more">
                                <button>Tiếp tục <i class="fas fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('javascrip.web')

@endsection

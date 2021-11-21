<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/custom.css">
    <link rel="stylesheet" href="../css/book.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
            <h2 class="text-white text-3xl my-2">CHỌN GHẾ
                @php
                    $countVip = 0;
                    $countNomal = 0;
                    if (session()->has('book1')) {
                        foreach (session()->get('book1') as $key => $value) {
                            if ($key == 'ticket') {
                                foreach ($value as $k => $v) {
                                    $ticket = \App\Models\Ticket::where('id_price_ticket', $k)->first();
                                    ($ticket -> status == 1) ? $countVip = $v : $countNormal = $v ;
                                    echo '<br><small  style="font-size:12px;background-color:rgb(255, 187, 0) ; border-radius:10px ; padding:3px"> Bạn có ' . $v . ' lượt chọn ' .$ticket-> name .'</small>';
                                }
                            }
                        }
                    }
                @endphp
            </h2>
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

                                        <button data-chair="{{ $arr[$j] }}{{ $i }}"
                                            style="cursor:pointer" data-vip="@php
                                                if ($i >= $show_time->cinema_room->vip_row_start && $i <= $show_time->cinema_room->vip_row_end && $j >= $show_time->cinema_room->vip_col_start && $j <= $show_time->cinema_room->vip_col_end) {
                                                    echo 1;
                                                } else {
                                                    echo 0;
                                                }
                                            @endphp"
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
                                            @endphp-400">{{ $i }}
                                        </button>

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
                        <p><b>Suất chiếu : </b>{{ date('h:i', strtotime($show_time->start_time)) }} | Ngày :
                            {{ $show_time->show_date }} </p>
                    </div>
                    <div id="show_book" class="ticket-price-total"></div>
                    <div class="view-more">
                        <button>Tiếp tục <i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            render();
            let countVip = {{ $countVip }};
            let countNormal = {{ $countNormal }};
            alert(countVip);
            function render() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: ("{{ route('web.render_book_show') }}"),
                    method: "GET",
                    success: function(data) {
                        $('#show_book').html(data);
                    }
                })
            }
        })
    </script>
</body>

</html>

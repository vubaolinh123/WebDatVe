@extends('Frontend.layout_web')
@section('conten.web')
    <style>
        .bg {
            width: 100%;
            height: 500px;
            background-image: url("{{ URL::to('storage/' . $cinema->image) }}");
            background-size: 100%;
            background-repeat: no-repeat;
            /* opacity: .3; */

            position: relative;
        }

        .bg-white {
            width: 100%;
            height: 500px;
            background: white;
            opacity: .6;
        }

        .cont {
            position: absolute;
            width: 60%;
            /* height: 100px; */
            /* background-color : black ; */
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%)
        }

    </style>
    <div class="bg">
        <div class="bg-white"></div>
        <div class="cont row">
            <div class="col-sm-4">
                <img style="width : 300px ; height : 300px" width="300" height="400"
                    src="{{ URL::to('storage/' . $cinema->image) }}" alt="">
            </div>
            <div class="col-sm-4">
                <h2>{{ $cinema->name }}</h2>
                <p>{{ $cinema->address }}</p>
                <small>{{ $cinema->cinema_open }} - {{ $cinema->cinema_close }}</small>
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-2">Đánh giá </div>
        </div>
    </div>

    <br>
    <div class=" container-fluid">
        <div>

            <ul class="nav nav-tabs  text-center">
                <li class="active"><a data-toggle="tab" href="#home">Lịch chiếu</a></li>
                <li><a data-toggle="tab" href="#menu1">Thông tin </a></li>
                <li><a data-toggle="tab" href="#menu2">Đánh giá</a></li>
            </ul>

            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">

                    <div class="row">
                        <div style="padding: 0 140px ; margin : 0 auto ; width : 100%" class="cinema-area">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="tab-content">

                                        @foreach ($cinema->cluster_cinema->cinema as $k => $item)

                                            <div class="row p-3">
                                                <div class="col-sm-2">
                                                    <img style="width:80px ; height : 80px ;"
                                                        src="{{ URL::to('storage/' . $item->image) }}" alt="">
                                                </div>
                                                <div class="col-sm-10">
                                                    <a data-toggle="tab"
                                                        href="#me-{{ $k + 1 }}">{{ $item->name }}</a>
                                                    <p style="color: blue"> Giờ mở cửa :
                                                        {{ $item->cinema_open }} </p>
                                                    <small>{{ $item->address }}</small> <br>
                                                    <a href="{{ route('web.show.cinema', ['id' => $item->id, 'slug' => \Str::slug($item->name)]) }}"
                                                        class="text-danger">[ Xem chi tiết ]</a>
                                                </div>
                                            </div>

                                        @endforeach

                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="tab-content">
                                        {{-- @foreach ($clusterCinema as $key => $cluster) --}}
                                        @foreach ($cinema->cluster_cinema->cinema as $k => $item)
                                            <div id="me-{{ $k + 1 }}"
                                                class="tab-pane fade m-3 @if ($item->id == $cinema->id)  {{ 'in active' }} @endif ">
                                                @foreach ($item->cinema_room as $cinema_room)
                                                    @foreach ($cinema_room->show_time as $showtime)
                                                        @if ($showtime->show_date >= \Carbon\Carbon::now('Asia/Ho_Chi_Minh')->toDateString())
                                                            <h3>{{ $showtime->film->name }}</h3>
                                                            <p>Phòng số : {{ $cinema_room->id_cinema_room }} </p>
                                                            <p> <a href="{{ route('web.book', ['id' => $cinema_room->id_cinema_room]) }}"
                                                                    class="btn btn-warning">{{ $showtime->start_time }} :
                                                                    <small>{{ $showtime->time_ends }}</small></a>

                                                            </p>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </div>
                                        @endforeach
                                        {{-- @endforeach --}}
                                    </div>
                                </div>
                            </div>

                        </div>

                        {{--  --}}
                    </div>

                </div>
                <div id="menu1" class="tab-pane fade">
                    <div class="row p-4">
                        <div class="col-sm-6">

                            <p>Địa điểm : {{  $cinema -> address }}</p>
                            <p>Điện thoại : {{  $cinema -> phone }}</p>
                            <p>Email : {{  $cinema -> email }}</p>
                            <p>Phòng chiếu : @foreach ($cinema -> cinema_room as $item)
                                {{ $item -> id_cinema_room }}
                                @endforeach</p>
                            <p>Giờ mở cửa  : {{  $cinema -> cinema_open }} : {{  $cinema -> cinema_close }}</p>
                        </div>
                        <div class="col-sm-6">
                            <p>Giới thiệu : </p>
                            <p>{{ $cinema -> detail }}</p>
                        </div>
                    </div>

                </div>
                <div id="menu2" class="tab-pane fade text-center">
                    <div class="row p-3">
                        <div class="col-sm-2">

                        </div>
                        <div class="col-sm-4">
                            <label for="">   {{ auth()->user()->name }}</label>
                            <input type="text" class="form-control" placeholder="Nhận xét cho rạp nhé !">
                        </div>
                        <div class="col-sm-4">
                            <button>1</button>
                            <button>2</button>
                            <button>3</button>
                            <button>4</button>
                            <button>5</button>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>

                </div>
            </div>

        </div>
    </div>

@endsection

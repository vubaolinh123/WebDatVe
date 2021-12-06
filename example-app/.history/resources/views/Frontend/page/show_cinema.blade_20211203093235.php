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
    <div class="text-center container-fluid">
        <div>

            <ul class="nav nav-tabs  text-center">
                <li class="active"><a data-toggle="tab" href="#home">Lịch chiếu</a></li>
                <li><a data-toggle="tab" href="#menu1">Thông tin </a></li>
                <li><a data-toggle="tab" href="#menu2">Đánh giá</a></li>
            </ul>

            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">

                    <div class="row">
                        {{-- <div class="col-sm-3"></div>
                        <div class="col-sm-9">
                            <div class="tt_film row">
                                <div class="col-sm-3">
                                    <img  src="" alt="">
                                </div>
                                <div class="col-sm-9">
                                    Name
                                </div>
                            </div>
                        </div> --}}

                        <div style="padding: 0 140px ; margin : 0 auto ; width : 100%" class="cinema-area">
                            {{-- <div class="tabs">
                                <h2 class="tablinks active">Các rạp </h2>
                            </div> --}}

                            <div class="row">
                                {{-- <div class="col-sm-2">
                                    <ul class="nav nav-pills nav-stacked">


                                        @foreach ($clusterCinema as $key => $cluster)

                                            <a data-toggle="pill" class="@if ($key + 1 == 1) {{ 'active' }} @endif"
                                                href="#menu{{ $key + 1 }}"
                                                style=" display: grid ;  grid-template-columns:  70px 1fr ; gap :10px ; margin:20px">
                                                <div>
                                                    <img style="width:60px ; height : 60px ; border-radius:50%"
                                                        src="{{ URL::to('images/cinema/' . $cluster->logo) }}" alt="">
                                                </div>
                                                <div>
                                                    <h3>
                                                        {{ $cluster->name }}
                                                    </h3>
                                                </div>
                                            </a>

                                        @endforeach
                                    </ul>
                                </div> --}}
                                <div class="col-sm-5">
                                    <div class="tab-content">
                                        {{-- @foreach ($clusterCinema as $key => $cluster)
                                            <div id="menu{{ $key + 1 }}"
                                                class="tab-pane fade @if ($key + 1 == 1)  {{ 'in active' }}   @endif">
                                                @if (count($cluster->cinema) > 0) --}}
                                                    @foreach ($cinema->cluster_cinema->cinema as $k => $item)

                                                        <div class="row p-3">
                                                            <div class="col-sm-2">
                                                                <img style="width:80px ; height : 80px ;"
                                                                    src="{{ URL::to('storage/' . $item->image) }}"
                                                                    alt="">
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
                                                {{-- @else
                                                    <div class="row">
                                                        <h4 class="alert "
                                                            style="background-color:  black ; padding : 20px ; color:white">
                                                            Hiện tại cụm rạp này chưa có rạp , bạn có thể xem rạp khác!
                                                        </h4>
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach --}}

                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="tab-content">
                                        @foreach ($clusterCinema as $key => $cluster)
                                            @foreach ($cluster->cinema as $k => $item)
                                                <div id="me-{{ $k + 1 }}" class="tab-pane fade m-3  ">
                                                    @foreach ($item->cinema_room as $cinema_room)
                                                        @foreach ($cinema_room->show_time as $showtime)
                                                            @if ($showtime->show_date >= \Carbon\Carbon::now('Asia/Ho_Chi_Minh')->toDateString())
                                                                <h3>{{ $showtime->film->name }}</h3>
                                                                <p>Phòng số : {{ $cinema_room->id_cinema_room }} </p>
                                                                <p> <button
                                                                        class="btn btn-warning">{{ $showtime->start_time }}</button>
                                                                    : <button
                                                                        class="btn btn-warning">{{ $showtime->time_ends }}</button>
                                                                </p>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </div>
                                            @endforeach
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                        </div>

                        {{--  --}}
                    </div>

                </div>
                <div id="menu1" class="tab-pane fade">
                    <h3>Menu 1</h3>
                    <p>Some content in menu 1.</p>
                </div>
                <div id="menu2" class="tab-pane fade">
                    <h3>Menu 2</h3>
                    <p>Some content in menu 2.</p>
                </div>
            </div>

        </div>
    </div>

@endsection

@extends('Frontend.layout_web')
@section('conten.web')
    <style>
        .bg{
            width:100%;
            height: 500px;
            background-image:url("{{ URL::to('storage/' .$cinema -> image) }}");
            background-size: 100% ;
            background-repeat:  no-repeat;
            /* opacity: .3; */

            position: relative;
        }
        .bg-white{
            width:100%;
            height: 500px;
            background : white;
            opacity: .6;
        }
        .cont{
            position : absolute ;
            width:60% ;
            /* height: 100px; */
            /* background-color : black ; */
            top : 50%;
            left: 50%;
            transform : translate(-50% , -50%)
        }
    </style>
    <div class="bg">
        <div class="bg-white"></div>
        <div class="cont row">
            <div class="col-sm-4">
                <img style="width : 300px ; height : 300px" width="300" height="400" src="{{ URL::to('storage/' .$cinema -> image) }}" alt="">
            </div>
            <div class="col-sm-4">
                <h2>{{ $cinema -> name }}</h2>
                <p>{{ $cinema -> address }}</p>
                <small>{{ $cinema -> cinema_open }} - {{  $cinema -> cinema_close }}</small>
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
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9">
                            <div class="tt_film row">
                                <div class="col-sm-3">
                                    <img  src="" alt="">
                                </div>
                                <div class="col-sm-9">
                                    Name
                                </div>
                            </div>
                        </div>
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

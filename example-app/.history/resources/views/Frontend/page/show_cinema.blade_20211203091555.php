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
            <div class="col-sm-3">
                <img style="width : 300px ; height : 300px" width="300" height="400" src="{{ URL::to('storage/' .$cinema -> image) }}" alt="">
            </div>
            <div class="col-sm-3">
                <h2>{{ $cinema -> name }}</h2>
                <p>{{ $cinema -> address }}</p>
                <small>{{ $cinema -> cinema_open }}</small>
            </div>
        </div>
    </div>

    Show

@endsection

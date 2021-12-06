@extends('Frontend.layout_web')
@section('conten.web')
    <style>
        .bg{
            width:100%;
            height: 500px;
            background-image:url("{{ URL::to('storage/' .$cinema -> image) }}");
        }
    </style>
    <div class="bg">

    </div>

    Show

@endsection

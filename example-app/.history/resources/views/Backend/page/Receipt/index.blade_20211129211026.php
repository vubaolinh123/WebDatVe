@extends('Backend.layout_admin')
@section('conten.admin')
<div class="row">

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h2>Danh sách hóa đơn đã mua vé </h2>
            </div>
            <style>
                .now{
                    transition: all .6s;
                }
            </style>
            <div class="m-3 p-2">
                <input id="sr-li-re" type="text" class="form-control" placeholder="Tìm kiếm ...">
                <br>
                <button data-type="now" class="btn btn-primary now">Hôm nay</button>
                <button data-type="sevent-day" class="btn btn-primary now">7 ngày trước</button>
                <button data-type="month" class="btn btn-primary now">Tháng này</button>
                <button data-type="all" style="background: red" class="btn btn-primary now">Tất cả</button>
                <hr>
                @foreach ($showtimes as $time)
                    <label for="">{{ $time -> cinema_room -> cinema -> name }} -- open :
                        {{ $time -> id_showtime }} -- time
                        {{ date('h:i', strtotime( $time -> start_time))  }}
                    </label>
                    <input class="checkD" name="checkBox" value="{{ $time -> id_showtime }}" type="checkbox">
                    <br>
                @endforeach
            </div>
             <div id="render-list"></div>
        </div>
    </div>
</div>

@endsection

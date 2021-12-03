@extends('Backend.layout_admin')
@section('conten.admin')
    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="">Sửa thời gian chiếu phim</h2>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form id="add_showdate"
                            action="{{ route('admin.timeshowfilm.saveedit', ['id_showtime' => $showtime->id_showtime]) }}"
                            method="POST">


                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Thời gian bắt đầu chiếu phim</label>
                                        <div class="input-group clockpicker" data-placement="bottom" data-align="top"
                                            data-autoclose="true">
                                            <input id="start_time" name="start_time" type="text" class="form-control"
                                                value="{{ $showtime->start_time }}">
                                            {{-- <span class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-clock-o"></i>
                                                </span>
                                            </span> --}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Thời gian kết thúc chiếu phim</label>
                                        <div class="input-group clockpicker" data-placement="bottom" data-align="top"
                                            data-autoclose="true">
                                            <input id="time_ends" name="time_ends" type="text" class="form-control"
                                                value="{{ $showtime->time_ends }}">
                                            <span class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-clock-o"></i>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <div style="border: 1px solid; color: black;padding: 20px;    user-select: none;"
                                        class="form-group">
                                        <label for="">Ngày giờ hiện tại</label>
                                        <div class="form-group">
                                            <input readonly="true" max="" type="date" name="" id="today"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input readonly="true" type="text" name="" id="time" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Ngày chiếu</label>
                                        <input value="{{ $showtime->show_date }}" type="date" min="" name="show_date"
                                            id="show_date" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Phim</label>
                                        <select class="form-control" name="film_id" id="">
                                            <option value="">Chọn phim</option>
                                            {{ $showtime->film_id }}
                                            @foreach ($films as $film)
                                                <option {{ $showtime->film_id == $film->id_film ? 'selected' : '' }}
                                                    value="{{ $film->id_film }}">{{ $film->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Thuộc phòng</label>
                                        <select class="form-control" name="cinema_room_id" id="">
                                            <option value="">Chọn phòng</option>
                                            @foreach ($cinemarooms as $cinemaroom)
                                                <option
                                                    {{ $showtime->cinema_room_id == $cinemaroom->id_cinema_room ? 'selected' : '' }}
                                                    value="{{ $cinemaroom->id_cinema_room }}">
                                                    Phòng: {{ $cinemaroom->id_cinema_room }} | Có
                                                    {{ $cinemaroom->quantity_row }} hàng |
                                                    {{ $cinemaroom->quantity_col }} dãy
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Lưu</button>
                            <a href="{{ route('admin.timeshowfilm.list') }}" class="btn btn-dark">Quay lại</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascrip.backend')
    <script>
        $(document).ready(function() {
            $("#add_showdate").validate({
                onkeyup: false,
                rules: {
                    start_time: {
                        required: true,
                    },
                    time_ends: {
                        required: true,
                    },
                    show_date: {
                        required: true,
                        date: true,
                        dateFormat: true,
                    },
                    film_id: {
                        required: true,
                    },
                    cinema_room_id: {
                        required: true,
                    },

                },
                messages: {
                    start_time: {
                        required: 'Chưa chọn thời gian bắt đầu chiếu !!!',
                    },
                    time_ends: {
                        required: 'Chưa chọn thời gian kết thúc chiếu !!!',
                    },
                    show_date: {
                        required: 'Bạn chưa chọn ngày chiếu !!!',
                        date: 'Phải là ngày tháng !!!',
                        dateFormat: 'Phải là ngày tháng !!!',
                    },
                    film_id: {
                        required: 'Chưa chọn phim !!!',
                    },
                    cinema_room_id: {
                        required: 'Chưa chọn phòng !!!',
                    },

                }
            });
        });
    </script>
    <script>
        var timeNow = new Date(Date.now());
        // var formatted = timeNow.getHours() + ":" + timeNow.getMinutes() + ":" + timeNow.getSeconds();
        var timeFormatted = timeNow.getHours() + ":" + timeNow.getMinutes();
        // alert(timeFormatted);
        $('#time').val(timeFormatted);
        $(document).ready(function() {
            var now = new Date();
            var month = (now.getMonth() + 1);
            var day = now.getDate();
            if (month < 10)
                month = "0" + month;
            if (day < 10)
                day = "0" + day;
            var today = now.getFullYear() + '-' + month + '-' + day;
            $('#today').val(today);
            $('#show_date').prop('min', function() {
                return today;
            })
        });

        // $(document).ready(function() {
        //     $('#time_ends').change(function() {
        //         var st = $('#start_time').val(); // start time Format: '9:00 PM'
        //         var et = $('#time_ends').val(); // end time   Format: '11:00 AM' 

        //         //how do i compare time
        //         if (st > et) {
        //             alert('end time always greater then start time');
        //         }
        //     });
        // });
    </script>


@endsection

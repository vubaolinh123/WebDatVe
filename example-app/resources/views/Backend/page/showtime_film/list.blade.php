@extends('Backend.layout_admin')
@section('conten.admin')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h2>Danh sách thời gian chiếu phim</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tableData" class="table table-hover">
                            <thead class="thead-primary">
                                <tr>
                                    <th scope="col">#</th>
                                    <th style="width:130px">Ảnh phim</th>
                                    <th scope="col">Tên phim</th>
                                    <th scope="col">Ngày chiếu</th>
                                    <th scope="col">Thời gian bắt đầu</th>
                                    <th scope="col">Thời gian kết thúc</th>
                                    <th scope="col">Thuộc phòng</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $stt = 1;
                                @endphp
                                @foreach ($showtimeFilms as $showtimeFilm)
                                    <tr>
                                        <th>{{ $stt++ }}</th>
                                        <th>
                                            <img style="width:100%"
                                                src="{{ asset("$URL_IMG_FILM/$showtimeFilm->imgFilm") }}" alt="">
                                        </th>
                                        <th>{{ $showtimeFilm->nameFilm }}</th>
                                        <th>{{ date('d-m-Y ', strtotime($showtimeFilm->show_date)) }}</th>
                                        <th>{{ date('H:i', strtotime($showtimeFilm->start_time)) }}</th>
                                        <th>{{ date('H:i', strtotime($showtimeFilm->time_ends)) }}</th>
                                        <th>{{ $showtimeFilm->cinema_room_id }}</th>
                                        <th>
                                            <a href="{{ route('admin.timeshowfilm.edit', ['id_showtime' => $showtimeFilm->id_showtime]) }}"
                                                class="btn btn-rounded btn-primary">Sửa</a>

                                            <a href="{{ route('admin.timeshowfilm.destroy', ['id_showtime' => $showtimeFilm->id_showtime]) }}"
                                                class="btn btn-rounded btn-danger">Xóa</a>
                                        </th>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascrip.backend')

@endsection

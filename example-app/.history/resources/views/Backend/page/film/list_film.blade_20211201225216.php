@extends('Backend.layout_admin')
@section('conten.admin')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h2>Danh sách phim</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-primary">
                                <tr>
                                    <th>#</th>
                                    <th>Tên phim </th>
                                    <th style="width:130px">Avata </th>
                                    <th style="width:130px">Trailer </th>
                                    <th>Thời lượng</th>
                                    <th>Ngày chiếu</th>
                                    <th>Thể loại</th>
                                    <th>Tình trạng </th>
                                    <th>Trạng thái</th>
                                    <th colspan="2">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($films as $stt => $film)

                                    <tr>
                                        <th>{{ $stt++ }}</th>
                                    <th style="width:130px">Avata </th>
                                    <td>{{ $film->name }}

                                        <iframe     style="display: none" width="100%" height="300"
                                            src="https://www.youtube.com/embed/{{ $film -> trailer }}"
                                            title="YouTube video player" frameborder="0"
                                            allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen
                                            autoplay=1
                                            ></iframe>

                                    </td>
                                        <td>
                                            <img style="width:100%" src="{{ asset("$URL_IMG_FILM/$film->avatar") }}"
                                                alt="">
                                        </td>
                                        <td>{{ $film->time }}</td>
                                        <td>{{ date('d-m-Y ', strtotime($film->premiere_date)) }}</td>
                                        <td>
                                            @foreach ($typeFilms as $typeFilm)
                                                @if ($film->film_type_id == $typeFilm->id_film_type)
                                                    {{ $typeFilm->name }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @if ($film->deleted == 0)
                                                <button type="button" class="btn btn-rounded btn-outline-primary">
                                                    Đang chiếu
                                                </button>
                                            @else
                                                <button type="button" class="btn btn-rounded btn-outline-info">
                                                    Sắp chiếu
                                                </button>
                                            @endif

                                        </td>
                                        <td>
                                            {{ $film->status == 0 ? 'Hiện' : 'Ẩn' }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.film.editForm', [$film->id_film]) }}"
                                                class="btn btn-rounded btn-success">Sửa</a>

                                            <a href="{{ route('admin.film.delete', [$film->id_film]) }}"
                                                class="btn btn-rounded btn-danger">Xóa</a>
                                        </td>
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

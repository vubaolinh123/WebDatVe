@extends('Backend.layout_admin')
@section('conten.admin')
    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="">Thêm phim</h2>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('admin.film.addSave') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xl-9">
                                    <div class="form-group">
                                        <label for="">Tên phim</label>
                                        <input name="name" type="text" class="form-control  " placeholder="Tên phim">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Ngôn ngữ</label>
                                        <input name="language" type="text" class="form-control  " placeholder="Tên phim">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Quốc gia</label>
                                        <input name="nation" type="text" class="form-control  " placeholder="Tên phim">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nhà sản xuất</label>
                                        <input name="producer" type="text" class="form-control  " placeholder="Tên phim">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Diễn viên</label>
                                        <textarea name="cast" id="" style="width:100%" rows="5"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tóm tắt phim </label> <br>
                                        <textarea class="summernote" name="summary" id="" style="width:100%"
                                            rows="10"></textarea>
                                    </div>
                                </div>

                                <div class="col-xl-3">
                                    <div class="form-group">
                                        <label for="">Avata phim</label>
                                        <input type="file" name="avatar" class="form-control  ">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Thời lượng phim</label>
                                        <div class="input-group clockpicker" data-placement="bottom" data-align="top"
                                            data-autoclose="true">
                                            <input name="time" type="text" class="form-control" value="13:14"> <span
                                                class="input-group-append"><span class="input-group-text"><i
                                                        class="fa fa-clock-o"></i></span></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Ngày chiếu phim</label>

                                        <input name="premiere_date" type="date" class="form-control"
                                            placeholder="2017-06-04" id="mdate">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Thuộc thể loại phim</label>
                                        <select class="form-control" name="film_type_id" id="">
                                            @foreach ($typeFilms as $typeFilm)

                                                <option value="{{ $typeFilm->id_film_type }}">{{ $typeFilm->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Tình trạng phim</label>
                                        <select class="form-control" name="deleted" id="">
                                            <option value="0">Đang chiếu</option>
                                            <option value="1">Sắp chiếu</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Trạng thái phim</label>
                                        <select class="form-control" name="status" id="">
                                            <option value="0">Hiện</option>
                                            <option value="1">Ẩn</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Mã code trailer youtube</label>
                                       <input name="trailer" placeholder="Trailer code" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Lưu</button>
                            <a class="btn btn-dark">Quay lại</a>
                        </form>
                    </div>
                </div>
            </div>




        </div>
    </div>
@endsection

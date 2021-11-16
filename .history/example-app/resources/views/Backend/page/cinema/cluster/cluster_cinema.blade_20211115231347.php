@extends('Backend.layout_admin')
@section('conten.admin')
<div class="row">
    <div class="col-xl-12 col-xxl-12">
        <div class="card">
            <div class="card-header">
                <h2 class="">Quản lý cụm rạp phim </h2>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xl-9">
                                <div class="form-group">
                                    <label for="">Tên rạp</label>
                                    <input  name="name" type="text" class="form-control  "
                                        placeholder="Tên phim">
                                </div>
                            </div>

                            <div class="col-xl-3">
                                <div class="form-group">
                                    <label for="">Logo rạp </label>
                                    <input type="file" name="avatar" class="form-control">
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="form-group">
                                    <label for="">Thuộc thể loại phim</label>
                                    <select class="form-control" name="film_type_id" id="">

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Trạng thái phim</label>
                                    <select class="form-control" name="status" id="">
                                        {{-- <option {{ $film->status == 0 ? 'selected' : '' }} value="0">Hiện</option>
                                        <option {{ $film->status == 1 ? 'selected' : '' }} value="1">Ẩn</option> --}}
                                    </select>
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

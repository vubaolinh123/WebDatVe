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
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xl-9">
                                    <div class="form-group">
                                        <label for="">Tên rạp</label>
                                        <input name="name" type="text" class="form-control  " placeholder="Tên rạp">
                                    </div>
                                </div>

                                <div class="col-xl-3">
                                    <div class="form-group">
                                        <label for="">Logo rạp </label>
                                        <img style="max-width:200px ; max-height : 200px ; border-radius:50%" id="showImg">
                                        <input type="file" name="logo" id="" class="form-control" onchange="onChangeImg(this)">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label for="">Thuộc khu vực</label>
                                        <select class="form-control" name="film_type_id" id="">
                                            @foreach ($citys as $city)
                                                <option value="{{ $city->code }}">{{ $city->name }}</option>
                                            @endforeach
                                        </select>
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

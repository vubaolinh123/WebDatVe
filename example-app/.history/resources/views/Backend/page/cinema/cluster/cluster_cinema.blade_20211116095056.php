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
                        <form action="{{ route('cinema.cluster.create') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xl-9">
                                    <div class="form-group">
                                        <label for="">Tên rạp</label>
                                        <input name="name" type="text" class="form-control  " placeholder="Tên rạp">
                                        <x-error field="name" class="text-danger" />
                                    </div>
                                </div>
                                <div class="col-xl-3">
                                    <div class="form-group">
                                        <label for="">Logo rạp </label>
                                        <br>
                                        <img style="display:none;width:200px ; height : 200px ; border-radius:50%"
                                            id="showImg">
                                        <input type="file" name="logo" id="" class="form-control"
                                            onchange="onChangeImg(this)">
                                        <x-error field="logo" class="text-danger" />
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label for="">Thuộc khu vực</label>
                                        <select class="form-control" name="city_id" id="">
                                            @foreach ($citys as $city)
                                                <option value="{{ $city->code }}">{{ $city->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="p-3">
                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                    <a href="{{ route('admin.dashboard') }}" class="btn btn-dark">Quay lại</a>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-xxl-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Rạp </th>
                        <th scope="col">Logo rạp</th>
                        <th scope="col">Khu vực</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cluster_cinemas as $key => $cluster_cinema)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $cluster_cinema -> name }}</td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
                {!! $cluster_cinema -> links() !!}
            </table>
        </div>
    </div>
@endsection

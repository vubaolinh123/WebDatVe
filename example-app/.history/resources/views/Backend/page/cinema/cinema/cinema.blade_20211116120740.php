@extends('Backend.layout_admin')
@section('conten.admin')
    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="">Quản lý rạp phim </h2>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-xxl-12">
            {!! $cinemas->links() !!}
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Cụm rạp  </th>
                        <th scope="col">Rạp </th>
                        <th scope="col">Ảnh </th>
                        <th scope="col">Địa chỉ cụ thể</th>
                        <th scope="col">Quận / Huyện </th>
                        <th scope="col">Chi tiết </th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Email</th>
                        <th scope="col">Giờ mở cửa</th>
                        <th scope="col">Giờ đóng cửa </th>
                        <th scope="col"  colspan="2">

                            <div>
                                <button type="button" class="btn btn-primary btn-rounded" data-toggle="modal"
                                    data-target=".bd-example-modal-lg">Thêm mới</button>

                                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            {{--  --}}
                                            <div class="card-body">
                                                <div class="basic-form">
                                                    <form action="{{ route('cinema.create') }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-xl-12">
                                                                <div class="form-group">
                                                                    <label for="">Thuộc cụm rạp</label>
                                                                    <select class="form-control" name="city_id" id="">
                                                                        @foreach ($citys as $city)
                                                                            <option value="{{ $city->code }}">
                                                                                {{ $city->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-9">
                                                                <div class="form-group">
                                                                    <label for="">Tên rạp</label>
                                                                    <input name="name" type="text" class="form-control  "
                                                                        placeholder="Tên rạp">
                                                                    <x-error field="name" class="text-danger" />
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-3">
                                                                <div class="form-group">
                                                                    <label for="">Logo rạp </label>
                                                                    <br>
                                                                    <img style="display:none;width:200px ; height : 200px ; border-radius:50%"
                                                                        id="showImg">
                                                                    <input type="file" name="logo" id=""
                                                                        class="form-control" onchange="onChangeImg(this)">
                                                                    <x-error field="logo" class="text-danger" />
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12">
                                                                <div class="form-group">
                                                                    <label for="">Thuộc khu vực</label>
                                                                    <select class="form-control" name="city_id" id="">
                                                                        @foreach ($citys as $city)
                                                                            <option value="{{ $city->code }}">
                                                                                {{ $city->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="p-3">
                                                                <button type="submit" class="btn btn-primary">Lưu</button>

                                                                <button type="button" class="btn btn-info"
                                                                    data-dismiss="modal">Quay
                                                                    lại</button>
                                                            </div>
                                                    </form>
                                                </div>
                                            </div>
                                            {{--  --}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cinemas as $key => $cinema)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>
                                {{-- Updated --}}
                                <div>
                                    <button type="button" class="btn btn-success btn-rounded" data-toggle="modal"
                                        data-target=".bd-example-modal-lg-{{ $cluster_cinema->id }}"> Sửa</button>

                                    <div class="modal fade bd-example-modal-lg-{{ $cluster_cinema->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                {{--  --}}
                                                <div class="card-body">
                                                    <div class="basic-form">
                                                        {{-- <form action="{{ route('cinema.cluster.updated' , ['id' => $cluster_cinema -> id]) }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            @method('put')
                                                            <div class="row">
                                                                <div class="col-xl-9">
                                                                    <div class="form-group">
                                                                        <label for="">Tên rạp</label>
                                                                        <input value="{{ $cluster_cinema->name }}"
                                                                            name="name" type="text" class="form-control  "
                                                                            placeholder="Tên rạp">
                                                                        <x-error field="name" class="text-danger" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-3">
                                                                    <div class="form-group">
                                                                        <label for="">Logo rạp </label>
                                                                        <br>
                                                                        <img style=" width:150px ; height : 150px ; border-radius:50%"
                                                                            class="showImg_2_{{ $cluster_cinema->id }}"
                                                                            src="{{ URL::to('images/cinema/' . $cluster_cinema->logo) }}">
                                                                        <input type="hidden" name="logo_hidden" value="{{ $cluster_cinema->logo }}" >
                                                                        <input type="file" name="logo" id=""
                                                                            data-id="{{ $cluster_cinema->id }}"
                                                                            class="form-control"
                                                                            onchange="onChangeImg_2(this)">
                                                                        <x-error field="logo" class="text-danger" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-12">
                                                                    <div class="form-group">
                                                                        <label for="">Thuộc khu vực</label>
                                                                        <select class="form-control" name="city_id" id="">
                                                                            @foreach ($citys as $city)
                                                                                <option
                                                                                    @if ($cluster_cinema-> city_id == $city -> code )
                                                                                        {{ 'selected' }}
                                                                                    @endif
                                                                                    value="{{ $city->code }}">
                                                                                    {{ $city->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="p-3">
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Lưu</button>

                                                                    <button type="button" class="btn btn-info"
                                                                        data-dismiss="modal">Quay
                                                                        lại</button>
                                                                </div>
                                                        </form> --}}
                                                    </div>
                                                </div>
                                                {{--  --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Update --}}
                            </td>
                            <td>
                                {{-- <form action="{{ route('cinema.cluster.delete', ['id' => $cluster_cinema->id]) }}"
                                    method="post">
                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirm(' Bạn có có chắc chắn không')"
                                            type="submit"
                                            class="btn btn-danger btn-rounded">
                                            Xóa
                                    </button>
                                </form> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            {!! $cinemas->links() !!}
        </div>
    </div>
@endsection

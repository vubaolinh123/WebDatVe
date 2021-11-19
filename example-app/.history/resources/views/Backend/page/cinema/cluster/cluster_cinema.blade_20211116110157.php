@extends('Backend.layout_admin')
@section('conten.admin')
    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="">Quản lý cụm rạp phim </h2>
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
                        <th scope="col" colspan="2">

                            <div>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target=".bd-example-modal-lg">Thêm mới</button>

                                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            {{--  --}}
                                            <div class="card-body">
                                                <div class="basic-form">
                                                    <form action="{{ route('cinema.cluster.create') }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">
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
                    @foreach ($cluster_cinemas as $key => $cluster_cinema)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $cluster_cinema->name }}</td>
                            <td>
                                <img width="200" height="200"
                                    src="{{ URL::to('images/cinema/' . $cluster_cinema->logo) }}" alt="">
                            </td>
                            <td>
                                @foreach ($citys as $city)
                                    @if ($city->code == $cluster_cinema->city_id)
                                        {{ $city->name }}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                {{-- Updated --}}
                                <div>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target=".bd-example-modal-lg-{{ $cluster_cinema->id }}">Chỉnh sửa</button>

                                    <div class="modal fade bd-example-modal-lg-{{ $cluster_cinema->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                {{--  --}}
                                                <div class="card-body">
                                                    <div class="basic-form">
                                                        <form action="{{ route('cinema.cluster.create') }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
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
                                                                                <option value="{{ $city->code }}">
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
                                                        </form>
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
                                <form action="{{ route('cinema.cluster.delete', ['id' => $cluster_cinema->id]) }}"
                                    method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Xóa</i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                {!! $cluster_cinemas->links() !!}
            </table>
        </div>
    </div>
@endsection

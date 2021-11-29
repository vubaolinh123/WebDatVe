@extends('Backend.layout_admin')
@section('conten.admin')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h2>Danh sách ghế vip từng phòng</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="thead-primary">
                            <tr>
                                <th scope="col">Phòng số</th>
                                <th scope="col">Rạp</th>
                                <th scope="col">Số lượng dãy</th>
                                <th scope="col">Số lượng hàng</th>
                                <th scope="col">Cột bắt đầu dãy ghế vip </th>
                                <th scope="col">Cột kết thúc dãy ghế vip </th>
                                <th scope="col">Cột bắt đầu hàng ghế vip </th>
                                <th scope="col">Cột kết thúc hàng ghế vip </th>

                                <th colspan="2">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $stt = 1;
                            @endphp
                            @foreach ($cinemarooms as $cinemaroom)
                                <tr>
                                    <th>{{ $stt++ }}</th>
                                    <th>{{ $cinemaroom->cinema->name }}</th>
                                    <td>{{ $cinemaroom->quantity_row }}</td>
                                    <td>{{ $cinemaroom->quantity_col }}</td>

                                    <td>
                                        <select class="form-control" >
                                            <option value="">Chọn cột bắt đầu dãy ghế vip</option>
                                            @for ($i = 1; $i <= $cinemaroom->quantity_row; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" >
                                            <option value="">Chọn cột bắt đầu dãy ghế vip</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" >
                                            <option value="">Chọn cột bắt đầu dãy ghế vip</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" >
                                            <option value="">Chọn cột bắt đầu dãy ghế vip</option>
                                        </select>
                                    </td>
                                    {{-- <td>{{ $cinemaroom->vip_col_start }}</td>
                                    <td>{{ $cinemaroom->vip_col_end }}</td>
                                    <td>{{ $cinemaroom->vip_row_start }}</td>
                                    <td>{{ $cinemaroom->vip_row_end }}</td> --}}

                                    <td>
                                        <a href="#" class="btn btn-rounded btn-success">Sửa</a>

                                        <a href="#" class="btn btn-rounded btn-danger">Xóa</a>
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

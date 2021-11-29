@extends('Backend.layout_admin')
@section('conten.admin')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h2>Danh sách phòng chiếu</h2>
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
                                    <th scope="col">Ngày thêm</th>
                                    <th scope="col">Ngày sửa</th>
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
                                        <td>{{ date('d-m-Y H:i:s', strtotime($cinemaroom->created_at)) }}</td>
                                        <td>{{ date('d-m-Y H:i:s', strtotime($cinemaroom->updated_at)) }}</td>
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

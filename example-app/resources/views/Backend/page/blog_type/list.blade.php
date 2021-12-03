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
                                    <th scope="col">Tên thể loại</th>
                                    <th scope="col">Ngày thêm</th>
                                    <th scope="col">Ngày sửa</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $stt = 1;
                                @endphp
                                @foreach ($type_Blogs as $type_Blog)
                                    <tr>
                                        <th>{{ $stt++ }}</th>
                                        <th>{{ $type_Blog->name }}</th>
                                        <th>{{ date('d-m-Y H:i:s', strtotime($type_Blog->created_at)) }}</th>
                                        <th>{{ date('d-m-Y H:i:s', strtotime($type_Blog->updated_at)) }}</th>
                                        <th>
                                            <a href="{{ route('admin.type_blog.edit', ['id_type_blog' => $type_Blog->id_type_blog]) }}"
                                                class="btn btn-rounded btn-primary">Sửa</a>

                                            <a href="{{ route('admin.type_blog.destroy', ['id_type_blog' => $type_Blog->id_type_blog]) }}"
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

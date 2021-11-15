@extends('Backend.layout_admin')
@section('conten.admin')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Heading With Background</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-primary">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên thể loại</th>
                                    <th scope="col">Ngày thêm</th>
                                    <th scope="col">Ngày sửa</th>
                                    <th colspan="2">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($typefilm as $stt => $typefilmItem)

                                    <tr>
                                        <th>{{ $stt++ }}</th>
                                        <td>{{ $typefilmItem->name }}</td>
                                        <td>{{ date('d-m-Y H:i:s', strtotime($typefilmItem->created_at)) }}</td>
                                        <td>{{ date('d-m-Y H:i:s', strtotime($typefilmItem->updated_at)) }}</td>
                                        <td>
                                            <a href="{{ route('admin.typefilm.editForm', [$typefilmItem->id_film_type]) }}"
                                                class="btn btn-rounded btn-success">Sửa</a>

                                            <a href="{{ route('admin.typefilm.delete', [$typefilmItem->id_film_type]) }}"
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

@extends('Backend.layout_admin')
@section('conten.admin')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h2>Danh sách Loại đồ ăn</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-primary">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên Loại Đồ Ăn</th>
                                    <th scope="col">Ngày thêm</th>
                                    <th scope="col">Ngày sửa</th>
                                    <th colspan="2">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($TypeFoodAll as $stt => $food)

                                    <tr>
                                        <th>{{ $stt++ }}</th>
                                        <td>{{ $food->name }}</td>
                                        <td>{{ date('d-m-Y H:i:s', strtotime($food->created_at)) }}</td>
                                        <td>{{ date('d-m-Y H:i:s', strtotime($food->updated_at)) }}</td>
                                        <td>
                                             <a href="{{ route("admin.type_food.edit",['id'=>$food->id_type_food]) }}" class="btn btn-rounded btn-success">Sửa</a>
                                            <form action="{{ route("admin.type_food.delete",['id'=>$food->id_type_food]) }}" method="post">
                                                @csrf
                                                @method("delete")
                                                <button class="btn btn-rounded btn-danger" type="submit">Xóa</button>
                                            </form>
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

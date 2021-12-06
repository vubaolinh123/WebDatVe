@extends('Backend.layout_admin')
@section('conten.admin')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h2>Danh sách đồ ăn</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-primary">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên Đồ Ăn</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Loại Đồ Ăn</th>
                                    <th scope="col">Size Đồ Ăn</th>
                                    <th scope="col">Ngày thêm</th>
                                    <th scope="col">Ngày sửa</th>
                                    <th colspan="2">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($FoodsAll as $stt => $food)

                                    <tr>
                                        <th>{{ $stt++ }}</th>
                                        <td>{{ $food->name }}</td>
                                        <td>{{ number_format($food->price, 0, ',', '.') }} VND</td>
                                        <td>
                                            @foreach ($TypeAll as $stt => $typefood)
                                                @if($typefood->id_type_food == $food->type_food_id)
                                                    {{ $typefood->name }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($SizeAll as $stt => $sizefood)
                                                @if($sizefood->id_size_food == $food->size_food_id)
                                                    {{ $sizefood->name }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{ date('d-m-Y H:i:s', strtotime($food->created_at)) }}</td>
                                        <td>{{ date('d-m-Y H:i:s', strtotime($food->updated_at)) }}</td>
                                        <td>
                                            <a href="{{route("admin.food.edit",$food->id_food) }}" class="btn btn-rounded btn-success">Sửa</a>

                                            <form action="{{ route("admin.food.delete",['id'=>$food->id_food]) }}" method="post">
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

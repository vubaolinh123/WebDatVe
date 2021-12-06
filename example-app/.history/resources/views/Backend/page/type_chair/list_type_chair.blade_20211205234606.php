@extends('Backend.layout_admin')
@section('conten.admin')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h2>Danh sách loại ghế</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-primary">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên loại</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Loại vé </th>
                                    <th scope="col">Ngày thêm</th>
                                    <th scope="col">Ngày sửa</th>
                                    <th colspan="2">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($typeChairs as $stt => $typeChair)

                                    <tr>
                                        <th>{{ $stt++ }}</th>
                                        <td>{{ $typeChair->name }}</td>
                                        <td>{{ number_format($typeChair->unit_price, 0, ',', '.') }} VND</td>
                                        <td>
                                            @if ($typeChair -> status == 1)
                                                {{ 'VIP' }}
                                            @else
                                                {{ 'Normal' }}
                                            @endif
                                        </td>
                                        <td>{{ date('d-m-Y H:i:s', strtotime($typeChair->created_at)) }}</td>
                                        <td>{{ date('d-m-Y H:i:s', strtotime($typeChair->updated_at)) }}</td>
                                        <td>
                                            {{-- <a href="#" class="btn btn-rounded btn-success">Sửa</a> --}}

                                            <form action="{{ route('admin.typechair.delete' , [ 'typeChair' =>$typeChair -> id_price_ticket ]) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-rounded btn-danger">Xóa</button>
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

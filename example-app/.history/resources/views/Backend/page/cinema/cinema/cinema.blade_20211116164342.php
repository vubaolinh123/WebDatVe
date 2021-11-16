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
                        <th scope="col">Cụm rạp </th>
                        <th scope="col">Rạp </th>
                        <th scope="col">Ảnh </th>
                        <th scope="col">Địa chỉ cụ thể</th>
                        <th scope="col">Quận / Huyện </th>
                        <th scope="col">Chi tiết </th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Email</th>
                        <th scope="col">Giờ mở cửa</th>
                        <th scope="col">Giờ đóng cửa </th>
                        <th scope="col" colspan="2">
                            <a href={{ route('cinema.create') }} class="btn btn-primary btn-rounded">Thêm mới</a>

                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cinemas as $key => $cinema)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>
                                {{ $cinema->cluster_cinema->name }}
                            </td>
                            <td>{{ $cinema->name }}</td>
                            <td><img width="100" src="{{ URL::to('storage/' . $cinema->image) }}" alt=""></td>
                            <td>{{ $cinema->address }}</td>
                            <td>
                                @foreach ($districts as $item)
                                    @if ($cinema->district_id == $item->code)
                                        {{ $item->name }}
                                    @endif
                                @endforeach
                            </td>
                            <td>{{ $cinema->detail }}</td>
                            <td>{{ $cinema->phone }}</td>
                            <td>{{ $cinema->email }}</td>
                            <td>{{ $cinema->cinema_open }}</td>
                            <td>{{ $cinema->cinema_close }}</td>
                            <td>
                                <a href="{{ route() }}" class="btn btn-success btn-rounded" data-toggle="modal"
                                    data-target=".bd-example-modal-lg-"> Sửa</a>
                            </td>
                            <td>
                                <form action="{{ route('cinema.delete', ['id' => $cinema->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirm(' Bạn có có chắc chắn không')" type="submit"
                                        class="btn btn-danger btn-rounded">
                                        Xóa
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            {!! $cinemas->links() !!}
        </div>
    </div>
@endsection

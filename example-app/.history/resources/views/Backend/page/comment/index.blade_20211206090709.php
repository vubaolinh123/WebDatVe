@extends('Backend.layout_admin')
@section('conten.admin')
    <div>
        <h2>Danh sách bình luận</h2>
        <div class="m-3">
            <h3>Tìm kiếm :</h3>
            <input value="{{ $_GET['name'] ?? '' }}" id="input-sr-name-start-cinema" type="text" placeholder="Tìm kiếm tên phim ..." class="form-control">
            <br><button  id="sr-name-start-cinema" class="btn btn-primary">Tìm kiếm </button>
        </div>
        <div  class="m-3">
            <h3>Lọc :</h3>
            @for ($i = 1; $i <= 5; $i++)
                <button class="click-start btn btn-primary" data-value={{ $i }}>{{ $i }} Sao</button>
            @endfor
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Người bình luận</th>
                    <th>Rạp phim</th>
                    <th>Nội dung</th>
                    <th>Số sao</th>
                    <th>Thời gian </th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comment_starts as $item)
                    <tr>
                        <td>{{ $item -> user -> name }}</td>
                        <td>{{ $item -> cinema -> name }}</td>
                        <td>{{ $item -> content }}</td>
                        <td>{{ $item -> start }}</td>
                        <td>{{ $item -> created_at -> diffForHumans() }}</td>
                        <td>
                            <form action="{{ route('admin.delete.comment.start.cinema' , ['startCinema' => $item -> id]) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button onclick="return confirm('Bạn có chắc muốn xóa bình luận này chứ !')" class="btn btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if (!isset($_GET['name']))

            {!!  $comment_starts -> links() ?? '' !!}
        @endif
    </div>
@endsection

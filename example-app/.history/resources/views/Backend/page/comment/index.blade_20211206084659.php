@extends('Backend.layout_admin')
@section('conten.admin')
    <div>
        <h2>Danh sách bình luận</h2>
        {{-- @dd($_GET['id']) --}}
        <div class="m-3">
            <h3>Tìm kiếm :</h3>
            <input type="text" placeholder="Tìm kiếm tên phim ..." class="form-control">
        </div>
        <div  class="m-3">
            <h3>Lọc :</h3>
            @for ($i = 1; $i <= 5; $i++)
                <button class="btn btn-primary" data-value={{ $i }}>{{ $i }} Sao</button>
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
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!!  $comment_starts -> links()  !!}
    </div>
@endsection

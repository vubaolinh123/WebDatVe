@extends('Backend.layout_admin')
@section('conten.admin')
    <div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Người bình luận</th>
                    <th>Nội dung</th>
                    <th>Số sao</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comment_starts as $item)
                    <tr>
                        <td>{{ $item -> user -> name }}</td>
                        <td>{{ $item -> content }}</td>
                        <td>{{ $item -> start }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!!  $comment_starts -> links()  !!}
    </div>
@endsection

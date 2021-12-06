@extends('Backend.layout_admin')
@section('conten.admin')
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Tài khoản </th>
                <th>Tên khách hàng </th>
                <th> Quyền cộng tác viên </th>
                <th> Quyền admin  </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user -> email }}</td>
                    <td> {{ $user -> name }}</td>
                    <td><input checked @if ($user -> hasRole('auth'))
                        {{ 'checked' }}
                    @endif type="checkbox"></td>
                    <td><input @if ($user -> hasRole('admin'))
                        {{ 'checked' }}
                    @endif type="checkbox"></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@extends('Backend.layout_admin')
@section('conten.admin')
    @foreach ($users as $user)
        @if ($user -> hasRole('boss'))
            <p class="alert alert-success"> Người kiểm duyệt  <strong>{{ $user -> name }}</strong> </p>
        @endif
    @endforeach
    <div class="m-3 p-3">
        <input type="text" placeholder="Tìm kiếm người dùng" class="form-control">
    </div>
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
            <tr>
                <td>{{ $me -> email }}</td>
                        <td> {{ $me -> name }}</td>
                        <td><input class="checkBox" disable data-role="auth" name="checkbox" value="{{ $me -> id }}"  @if ($me -> hasRole('auth'))
                            {{ 'checked' }}
                        @endif type="checkbox"></td>
                        <td><input class="checkBox" disable data-role="admin" name="checkbox" value="{{ $me -> id }}" @if ($me -> hasRole('admin'))
                            {{ 'checked' }}
                        @endif type="checkbox"></td>
            </tr>
            @foreach ($users as $user)
                @if ($user -> id != auth() -> user() ->id || !($user -> hasRole('boss')))
                    <tr>
                        <td>{{ $user -> email }}</td>
                        <td> {{ $user -> name }}</td>
                        <td><input class="checkBox" data-role="auth" name="checkbox" value="{{ $user -> id }}"  @if ($user -> hasRole('auth'))
                            {{ 'checked' }}
                        @endif type="checkbox"></td>
                        <td><input class="checkBox" data-role="admin" name="checkbox" value="{{ $user -> id }}" @if ($user -> hasRole('admin'))
                            {{ 'checked' }}
                        @endif type="checkbox"></td>
                    </tr>
                @endif
                @endforeach
            </tbody>
        </table>
        {!! $users -> links() !!}
@endsection

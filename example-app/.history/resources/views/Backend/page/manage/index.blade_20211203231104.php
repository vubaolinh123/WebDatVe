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
            <tr>
                <td></td>
                <td></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
            </tr>
        </tbody>
    </table>
@endsection

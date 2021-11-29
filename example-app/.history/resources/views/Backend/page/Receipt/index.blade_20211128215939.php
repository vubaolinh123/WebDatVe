@extends('Backend.layout_admin')
@section('conten.admin')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h2>Danh sách hóa đơn đã mua vé </h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="thead-primary">
                            <tr>
                                <th scope="col">Mã hóa đơn </th>
                                <th scope="col">Người mua hàng </th>
                                <th scope="col">Số tiền đã thanh toán </th>
                                <th scope="col">Ngày mua hàng </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($receipts as $receipt)
                               <tr>

                                    <td>{!! $receipt -> id_receipt !!}</td>
                                    <td>{!! $receipt -> user -> name !!} #{!! $receipt -> user -> email !!}</td>
                                    <td>{!! number_format( $receipt -> total) !!}  VND </td>
                                    <td>{{ $receipt -> date_pay }} @if ($receipt -> date_pay < \Carbon\Carbon::now('Asia/Ho_Chi_Minh'))
                                        <span class="alert alert-danger">{{ 'Đã hết hạn' }}</span>
                                    @else
                                        <select name="" class="form-control" id="">
                                            <option value=""> Cộng tác viên chọn  </option>
                                            <option value="1">Xác nhận khách hàng đã đến xem phim </option>
                                            <option value="2">Khách hàng gặp vấn đề </option>
                                        </select>
                                    @endif</td>
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

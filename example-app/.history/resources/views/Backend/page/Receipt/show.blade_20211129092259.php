@extends('Backend.layout_admin')
@section('conten.admin')
<div class="row">
    <div class="bg-success p-3 text-light rounded-2xl col-sm-12"  >
        <h1 >Mã hóa đơn : {{ $receipt -> id_receipt }}</h1>
        <p>Khách hàng :  {{ $receipt -> user -> name }}</p>
        <p>Email khách hàng :  {{ $receipt -> user -> email }}</p>
        <p>Ngày đặt  :  {{ $receipt -> date_pay }}</p>
        <p>Tổng tiền  :  {{ number_format($receipt -> total) }} .VND <i class="badge badge-pill badge-success">Đã thanh toán</i></p>
        <p>Tình trạng :
            @if ($receipt -> user_view_success == 1)
                <a href="#" class="badge badge-primary">Khách hàng đã xác nhận xem phim</a>
            @elseif ($receipt -> user_view_success == 2)
                <a href="#" class="badge badge-warning">Khách hàng gặp vấn đề</a>
            @elseif ($receipt -> user_view_success == 3)
                <a href="#" class="badge badge-info">Khách hàng đang xác nhận</a>
            @else
                 <a href="#" class="badge badge-danger">Đã hết hạn !</a>
            @endif
        </p>
    </div>
</div>

@endsection

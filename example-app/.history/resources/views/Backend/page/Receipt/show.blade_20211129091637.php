@extends('Backend.layout_admin')
@section('conten.admin')
<div class="row">
    <div class="bg-success p-3 text-light rounded-2xl col-sm-12"  >
        <h1 >Mã hóa đơn : {{ $receipt -> id_receipt }}</h1>
        <p>Khách hàng :  {{ $receipt -> user -> name }}</p>
        <p>Email khách hàng :  {{ $receipt -> user -> email }}</p>
        <p>Ngày đặt  :  {{ $receipt -> date_pay }}</p>
        <p>Tổng tiền  :  {{ $receipt -> total }}</p>
    </div>
</div>

@endsection

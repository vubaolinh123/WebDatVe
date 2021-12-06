@extends('Backend.layout_admin')
@section('conten.admin')
<div class="row">
    <div class="bg-success text-light rounded-2xl col-sm-12"  >
        <h1 >Mã hóa đơn : {{ $receipt -> id_receipt }}</h1>
        <p>Khách hàng :  {{ $receipt -> user -> name }}</p>
        <p>Email khách hàng :  {{ $receipt -> user -> email }}</p>
    </div>
</div>

@endsection

@extends('Backend.layout_admin')
@section('conten.admin')
<div class="row">
    <div class="bg-success p-3 m-2 text-light rounded-2xl" class="col-sm-12">
        <h1 >Mã hóa đơn : {{ $receipt -> id_receipt }}</h1>
        <p>Khách hàng :  {{ $receipt -> user -> name }}</p>
    </div>
</div>

@endsection

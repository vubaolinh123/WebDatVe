@extends('Backend.layout_admin')
@section('conten.admin')
<div class="row">
    <div class="col-sm-12">
        <h1 class="bg-success p-3 m-2">Mã hóa đơn : {{ $receipt -> id_receipt }}</h1>
    </div>
</div>

@endsection

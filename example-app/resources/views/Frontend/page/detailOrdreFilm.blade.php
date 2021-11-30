@extends('Frontend.layout_web')
@section('conten.web')
    <div class="container">
        <h1 style="text-align: center">Chi tiết phim</h1>

        {{-- // foreach ($receiptDetails as $receiptDetail) {
        // if (in_array($receiptDetail->id_receipt_detail, $receiptDetail->ticket_id, $arr));
        // }; --}}

        @php
            $arr = [];
        @endphp
        @foreach ($receiptDetails as $receiptDetail)
            <h4>Mã ghế : {{ $receiptDetail->chair_code }}</h4>
        @endforeach
    </div>
@endsection

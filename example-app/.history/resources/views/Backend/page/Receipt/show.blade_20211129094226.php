@extends('Backend.layout_admin')
@section('conten.admin')
<div class="row">
    <a href="{{ route('admin.receipt.list') }}" class="btn btn-outline-primary m-3">Back</a>
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
            @elseif($receipt -> date_pay < \Carbon\Carbon::now('Asia/Ho_Chi_Minh'))
                <a href="#" class="badge badge-danger">Đã hết hạn !</a>
            @else
                 <a href="#" class="badge badge-success">Chưa xác nhận </a>
            @endif
        </p>
    </div>
    <div class="  col-sm-6"  >
        <div class="m-2">
            <h2>Đồ ăn</h2>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>
                            Tên loại
                        </th>
                        <th>
                            Giá loại
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($receipt -> receipt_food as $receipt_food)
                        <tr>
                            <td>
                                {{ $receipt_food -> foods -> name }}
                            </td>
                            <td>
                                {{ number_format($receipt_food -> foods -> price) }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="  col-sm-6"  >
        <div class="m-2">
            <h2>Vé </h2>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>
                            Số ghế
                        </th>
                        <th>
                            Loại ghế
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($receipt -> receipt_food as $receipt_food)
                        <tr>
                            <td>
                                {{ $receipt_food -> foods -> name }}
                            </td>
                            <td>
                                {{ number_format($receipt_food -> foods -> price) }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

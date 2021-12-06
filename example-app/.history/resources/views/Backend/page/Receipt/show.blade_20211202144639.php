@extends('Backend.layout_admin')
@section('conten.admin')
    <div class="row">
        <a href="{{ route('admin.receipt.list') }}" class="btn btn-outline-primary m-3">Back</a>
        <div style="margin-bottom : 20px ; border-radius : 20px ; box-shadow:2px 2px 20px #85ff00,2px 2px 20px black"
            class="bg-success p-3 text-light rounded-2xl col-sm-12">
            <h1>Mã hóa đơn : {{ $receipt->id_receipt }}</h1>
            <p>Khách hàng : {{ $receipt->user->name }}</p>
            <p>Email khách hàng : {{ $receipt->user->email }}</p>
            <p>Ngày đặt : {{ $receipt->date_pay }}</p>
            <p>Tổng tiền : {{ number_format($receipt->total) }} .VND <i class="badge badge-pill badge-success">Đã thanh
                    toán</i></p>
            <p>Tình trạng :
                @if ($receipt->user_view_success == 1)
                    <a href="#" class="badge badge-primary">Khách hàng đã xác nhận xem phim</a>
                @elseif ($receipt -> user_view_success == 2)
                    <a href="#" class="badge badge-warning">Khách hàng gặp vấn đề</a>
                    <br>
                    <br>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Hoàn tiền</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <textarea name="" class="form-control textarea" id="textarea_pass" placeholder="Lý do hoàn tiền" id="" cols="30" rows="10"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                                    <button type="button" onclick="resToPay({{ $receipt->id_receipt }})"  data-id="{{ $receipt->id_receipt }}"  id="res_del" class="btn btn-primary">Hoàn tiền</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--  --}}

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                       >Hoàn trả tiền</button>
                    <button data-id="{{ $receipt->id_receipt }}" id="reset_receipt" class="btn btn-danger">Khách hàng có
                        hành vi gian lận , thẻ sẽ về trạng thái ban đầu</button>
                @elseif ($receipt -> user_view_success == 3)
                    <a href="#" class="badge badge-info">Khách hàng đang xác nhận</a>
                @elseif($receipt ->showtime -> show_date <= \Carbon\Carbon::now('Asia/Ho_Chi_Minh')->toDateString()
                        && $receipt ->showtime -> start_time < \Carbon\Carbon::now('Asia/Ho_Chi_Minh')->toTimeString())
                            <a href="#" class="badge badge-danger">Đã hết hạn !</a>
                        @else
                            <a href="#" class="badge badge-success">Chưa xác nhận </a>
                @endif
            </p>
        </div>
        <div class="  col-sm-6">
            <div style=" border-radius : 20px ; box-shadow:2px 2px 20px #85ff00,2px 2px 20px black"
                class="bg-success p-3 m-2">
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
                        @foreach ($receipt->receipt_food as $receipt_food)
                            <tr>
                                <td>
                                    {{ $receipt_food->foods->name }}
                                </td>
                                <td>
                                    {{ number_format($receipt_food->foods->price) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="  col-sm-6">
            <div style=" border-radius : 20px ; box-shadow:2px 2px 20px #85ff00,2px 2px 20px black"
                class="bg-success p-3 m-2">
                <h2>Vé & ghế </h2>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>
                                Số ghế
                            </th>
                            <th>
                                Loại ghế
                            </th>
                            <th>
                                Giá ghế
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($receipt->receipt_detail as $receipt_detail)
                            <tr>
                                <td>
                                    {{ $receipt_detail->chair_code }}
                                </td>
                                <td>
                                    {{ $receipt_detail->ticket->name }}
                                </td>
                                <td>
                                    {{ number_format($receipt_detail->ticket->unit_price) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

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
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($receipts as $receipt)
                               <tr>
                                    <td>{!! $receipt -> id_receipt !!}</td>
                                    <td>{!! $receipt -> user -> name !!} #{!! $receipt -> user -> email !!}</td>
                                    <td>{!! number_format( $receipt -> total) !!}  .VND </td>
                                    <td>{{ $receipt ->showtime -> show_date  }}
                                    @if ($receipt -> user_view_success == 2)
                                        <span class="alert alert-info">{{ 'Khách hàng gặp vấn đề ' }}</span>
                                    @elseif($receipt -> user_view_success == 3)
                                        <span class="alert alert-secondary">{{ 'Khách hàng đang xác nhận ... ' }}</span>
                                    @elseif($receipt -> user_view_success == 1)
                                        <span class="alert alert-success">{{ 'Khách hàng đã đến xem phim' }}</span>
                                    @elseif($receipt ->showtime -> show_date < \Carbon\Carbon::now('Asia/Ho_Chi_Minh')->toDateString())
                                        <span class="alert alert-danger">{{ 'Đã hết hạn' }}</span>
                                        <form
                                            method="POST"
                                            action="{{ route('receipt.delete' , ['id' => $receipt -> id_receipt ]) }}">
                                            @csrf
                                            @method('delete')
                                            <button onclick="return confirm('Are you sure !')" class="btn btn-danger">Xóa</button>
                                        </form>
                                    @else
                                        <select data-id="{!! $receipt -> id_receipt !!}" name="" class="form-control receipt_success " id="">
                                            <option  > Cộng tác viên chọn  </option>
                                            <option value="1">Xác nhận khách hàng đã đến xem phim </option>
                                            <option value="2">Khách hàng gặp vấn đề </option>
                                        </select>
                                    @endif</td>
                                    <td><a href="{{ route('admin.receipt.show' , ['id' => $receipt -> id_receipt ]) }}" class="btn btn-primary">Xem chi tiết</a></td>
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

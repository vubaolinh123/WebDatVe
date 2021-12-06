@extends('Backend.layout_admin')

@section('conten.admin')
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="stat-widget-two card-body">
                    <div class="stat-content">
                        <div class="stat-text">Số ghế/đồ ăn đã được đặt</div>
                        <div class="stat-digit"> {{ $countBuy }} / {{ $countChair }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="stat-widget-two card-body">
                    <div class="stat-content">
                        <div class="stat-text">Lợi nhuận hôm nay</div>
                        <div class="stat-digit"> {{  number_format($sumPriceOneDay) }} .VND</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="stat-widget-two card-body">
                    <div class="stat-content">
                        <div class="stat-text">Lợi nhuận thánh này</div>
                        <div class="stat-digit"> {{ number_format($sumPriceMonth) }} .VND</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="stat-widget-two card-body">
                    <div class="stat-content">
                        <div class="stat-text">Tổng lợi nhuận</div>
                        <div class="stat-digit"> {{ number_format($sumPrice) }} .VND</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">


        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">New Orders</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên rạp</th>
                                    <th>Phòng </th>
                                    <th>quantity</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($arrRender  as $k =>  $v)
                                    <tr>
                                        <td>
                                            {{ $k + 1 }}
                                        </td>
                                        <td>{{ $v -> cinema_room -> cinema -> name  }}</td>
                                        <td>{{ $v -> id_showtime  }}</td>
                                        <td>{{ count($v -> receipt_details)}}</td>
                                        <td><span class="badge badge-success">Done</span></td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Địa điểm</h4>
                </div>
                <div class="card-body">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1835.9993542384136!2d106.63472016117058!3d10.846604874036151!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529809630bdb9%3A0x21c165d4ca1c1e42!2zR2FsYXh5IENpbmVtYSBOZ3V54buFbiBWxINuIFF1w6E!5e0!3m2!1svi!2s!4v1638365286261!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>

@endsection
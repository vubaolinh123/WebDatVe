@extends('Backend.layout_admin')

@section('conten.admin')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <div id="chart_div"></div>
    <script type="text/javascript">
        google.charts.load('current', {
            packages: ['corechart', 'bar']
        });
        google.charts.setOnLoadCallback(drawBasic);

        function drawBasic() {

            var data = google.visualization.arrayToDataTable([
                ['City', '2021 Population', ],
                ['Lợi nhuận hôm nay ', {{ $sumPriceOneDay }}],
                ['Lợi nhuận tháng này ', {{ $sumPriceMonth }}],
                ['Lợi nhuận', {{ $sumPrice }}],
                // ['Houston, TX', 2099000],
                // ['Philadelphia, PA', 1526000]
            ]);

            var options = {
                title: 'Population of Largest U.S. Cities',
                chartArea: {
                    width: '50%'
                },
                hAxis: {
                    title: '',
                    minValue: 0
                },
                vAxis: {
                    title: 'City'
                }
            };

            var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

            chart.draw(data, options);
        }
    </script>

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
                        <div class="stat-digit"> {{ number_format($sumPriceOneDay) }} .VND</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="stat-widget-two card-body">
                    <div class="stat-content">
                        <div class="stat-text">Lợi nhuận tháng này</div>
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
                    <h4 class="card-title">Top 3 phòng xem phim (30 days)</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>

                                    <th>#</th>
                                    <th>Tên rạp</th>
                                    <th>Phòng số</th>
                                    <th>Doanh thu</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($arrRender as $k => $v)
                                    <tr>

                                        <td>
                                            {{ $k + 1 }}
                                        </td>
                                        <td>{{ $v->cinema_room->cinema->name }}</td>
                                        <td>{{ $v->id_showtime }}</td>
                                        <td>{{ number_format($v->receipts->where('user_view_success', '<', 4)->sum('total')) }}
                                            - {{ count($v->receipts) }}</td>

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
                    <h4 class="card-title">Top 3 khách hàng (30 days)</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>

                                    <th>#</th>
                                    <th>Tên khách hàng</th>
                                    <th>Email khách hàng</th>
                                    <th>Tổng hóa đơn</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($arrRenderUser as $k => $v)
                                    <tr>

                                        <td>
                                            {{ $k + 1 }}
                                        </td>
                                        <td>{{ $v->name }}</td>
                                        <td>{{ $v->email }}</td>
                                        <td>{{ count($v->receipts) }}</td>
                                        {{-- <td>{{ number_format($v -> receipts ->sum('total'))}} - {{ count($v -> receipts) }}</td> --}}

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
                    <h4 class="card-title">Đơn hàng gặp vấn đề</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>

                                    <th>#</th>
                                    <th>Tên khách hàng</th>
                                    <th>Đơn hàng</th>
                                    <th>Ngày đặt</th>
                                    <th>Kiểm tra </th>

                                </tr>
                            </thead>
                            <tbody>
                                @if (count($receiptError) == 0)
                                    <tr> Hiện tại không có đơn hàng nào ! </tr>
                                @else
                                    @foreach ($receiptError as $k => $v)
                                        <tr>

                                            <td>{{ $k + 1 }}</td>
                                            <td>{{ $v->user->name }}</td>
                                            <td>{{ $v->id_receipt }}</td>
                                            <td>{{ \Carbon\Carbon::parse($v->date_pay)->diffForHumans() }}</td>
                                            <td><a href="{{ route('admin.receipt.show', ['id' => $v->id_receipt]) }}"
                                                    class="btn btn-primary">Xem đơn hàng </a></td>

                                        </tr>
                                    @endforeach
                                @endif
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
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1835.9993542384136!2d106.63472016117058!3d10.846604874036151!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529809630bdb9%3A0x21c165d4ca1c1e42!2zR2FsYXh5IENpbmVtYSBOZ3V54buFbiBWxINuIFF1w6E!5e0!3m2!1svi!2s!4v1638365286261!5m2!1svi!2s"
                        width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>

@endsection

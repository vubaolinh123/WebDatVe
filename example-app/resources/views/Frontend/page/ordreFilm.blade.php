@extends('Frontend.layout_web')
@section('conten.web')
    <div class="container">
        @if (isset($null))
            <div style="height: 76vh;display: flex; justify-content: center;align-items: center;">

                <h1 style="text-align: center">{{ $null }}</h1>
            </div>

        @else

            <h1 style="text-align: center">Danh sách phim bạn đã đặt vé</h1>
            {{-- <table class="table table-hover table-inverse table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>#</th>
                        <th style="width:130px">Ảnh phim</th>
                        <th>Tên phim</th>
                        <th>Ngày chiếu</th>
                        <th>Giờ chiếu</th>
                        <th>Mã ghế</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $stt = 1;
                    @endphp
                    @foreach ($receipts as $receipt)
                        <tr>
                            <td scope="row">{{ $stt++ }}</td>
                            <td>
                                <img style="width:100%" src="{{ asset("$URL_IMG_FILM/$receipt->img_film") }}" alt="">
                            </td>
                            <td>{{ $receipt->name_film }}</td>
                            <td>{{ $receipt->show_date }}</td>
                            <td>{{ $receipt->start_time }}</td>
                            <td>{{ $receipt->chair_code }}</td>
                        </tr>

                    @endforeach

                </tbody>
            </table> --}}

            <table class="table table-hover table-inverse table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>#</th>
                        <th>Mã đơn</th>
                        <th>Thời gian thanh toán</th>
                        <th>Trạng thái đơn</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $stt = 1;
                    @endphp
                    @foreach ($receipts as $receipt)
                        <tr>
                            <td scope="row">{{ $stt++ }}</td>

                            <td>{{ $receipt->id_receipt }}</td>
                            <td>{{ date('d-m-Y H:i:s', strtotime($receipt->show_date)) }}</td>
                            <td>{{ number_format($receipt->total, 0, ',', '.') }}VND</td>
                            <td>
                                <a href="{{ route('web.detailOrderFilm', ['id_receipt' => $receipt->id_receipt]) }}">Chi
                                    tiết</a>
                            </td>
                        </tr>

                    @endforeach

                </tbody>
            </table>
        @endif
    </div>
@endsection

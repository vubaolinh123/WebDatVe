@extends('Frontend.layout_web')
@section('conten.web')
    <div class="container">
        @if (isset($null))
            <div style="height: 76vh;display: flex; justify-content: center;align-items: center;">

                <h1 style="text-align: center">{{ $null }}</h1>
            </div>

        @else

            <h1 style="text-align: center">Danh sách phim bạn đã đặt vé</h1>
            <table class="table table-hover table-inverse table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>#</th>
                        <th style="width:130px">Ảnh phim</th>
                        <th>Tên phim</th>
                        <th>Ngày chiếu</th>
                        <th>Giờ chiếu</th>
                        <th>Mã ghế</th>
                        <th>Tổng tiền</th>
                    </tr>
                </thead>
                {{-- 0 => "Venom: Đối Mặt Tử Thù"
                1 => 7
                2 => 285000
                3 => "1636950971_46_img.jpg"
                4 => "2021-11-30"
                5 => "23:00:21"
                6 => "F2"
                7 => "2021-11-30"
                8 => "F3" --}}
                <tbody>
                    @php
                        $stt = 1;
                    @endphp
                    @foreach ($receiptsVl as $receipt)
                        <tr>
                            <td scope="row">{{ $stt++ }}</td>
                            <td>
                                <img style="width:100%" src="{{ asset("$URL_IMG_FILM/$receipt[3]") }}" alt="">
                            </td>
                            <td><a
                                    href="{{ route('web.detailFim', ['id_film' => $receipt[1], 'slug' => \Str::slug($receipt[0])]) }}">{{ $receipt[0] }}</a>
                            </td>
                            <td>{{ $receipt[4] }}</td>
                            <td>{{ $receipt[5] }}</td>
                            <td>{{ $receipt[6] }} / {{ $receipt[8] }}</td>
                            <td>{{ $receipt[2] }} VND</td>
                        </tr>

                    @endforeach

                </tbody>
            </table>

            {{-- <table class="table table-hover table-inverse table-responsive">
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
            </table> --}}
        @endif
    </div>
@endsection

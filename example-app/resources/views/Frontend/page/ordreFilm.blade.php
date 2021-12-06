@extends('Frontend.layout_web')
@section('conten.web')
    {{-- <div class="container">
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
                        <th>Mã đơn</th>
                        <th style="width:130px">Ảnh phim</th>
                        <th>Tên phim</th>
                        <th>Ngày chiếu</th>
                        <th>Giờ chiếu</th>
                        <th>Mã ghế</th>
                        <th>Tổng tiền</th>
                    </tr>
                </thead>

                <tbody>
                    @php
                        $stt = 1;
                    @endphp
                    @foreach ($receipts as $receipt)
                        <tr class="toggle" data-id_receipt="{{ $receipt->id_receipt }}">

                            <td scope="row"><a href=" #">Hiện</a>
                                {{ $stt++ }}</td>
                            <td scope="row">{{ $receipt->id_receipt }}</td>
                            <td>
                                <img style="width:100%" src="{{ asset("$URL_IMG_FILM/$receipt->img_film") }}" alt="">
                            </td>
                            <td>
                                <a href="#">
                                    {{ $receipt->name_film }}
                                </a>
                            </td>
                            <td>{{ $receipt->show_date }}</td>
                            <td>{{ $receipt->start_time }}</td>
                            <td>{{ $receipt->chair_code }} </td>
                            <td>{{ number_format($receipt->total, 0, ',', '.') }} VND</td>
                        </tr>

                    @endforeach

                </tbody>
            </table>


        @endif
    </div> --}}
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
                        <th>Mã đơn</th>
                        <th style="width:130px">Ảnh phim</th>
                        <th>Tên phim</th>
                        <th>Ngày chiếu</th>
                        <th>Giờ chiếu</th>
                        <th>Mã ghế</th>
                        <th>Tổng tiền</th>
                    </tr>
                </thead>

                <tbody>
                    @php
                        $stt = 1;
                    @endphp
                    @foreach ($receipts as $receipt)
                        <tr class="toggle" data-id_receipt="{{ $receipt->id_receipt }}">

                            <td scope="row">
                                {{ $stt++ }}</td>
                            <td scope="row">{{ $receipt->id_receipt }}</td>
                            <td>
                                @php
                                    
                                    $avatar = $receipt->showtime->film->avatar;
                                @endphp
                                <img style="width:100%" src='{{ asset("$URL_IMG_FILM/$avatar") }}' alt="">

                            </td>
                            <td>
                                {{ $receipt->showtime->film->name }}
                            </td>
                            <td>
                                {{ $receipt->showtime->show_date }}
                            </td>
                            <td>
                                {{ $receipt->showtime->start_time }}

                            </td>
                            <td>
                                @foreach ($receipt->receipt_detail as $codechair)
                                    {{ $codechair->chair_code }} <br>
                                @endforeach
                            </td>
                            <td>{{ number_format($receipt->total, 0, ',', '.') }} VND</td>
                            {{-- <td>
                                <img style="width:100%" src="{{ asset("$URL_IMG_FILM/$receipt->img_film") }}" alt="">
                            </td>
                            <td>
                                <a href="#">
                                    {{ $receipt->name_film }}
                                </a>
                            </td>
                            <td>{{ $receipt->show_date }}</td>
                            <td>{{ $receipt->start_time }}</td>
                            <td>{{ $receipt->chair_code }} </td>
                            <td>{{ number_format($receipt->total, 0, ',', '.') }} VND</td> --}}
                        </tr>

                    @endforeach

                </tbody>
            </table>


        @endif
    </div>


@endsection
@section('javascrip.web')
    {{-- <script>
        $(document).ready(function() {
            // $("button").click(function() {
            //     $("p").slideToggle();
            // });
            let data = $('.toggle').attr('data-id_receipt');

            console.log(data);
        });
    </script> --}}
@endsection

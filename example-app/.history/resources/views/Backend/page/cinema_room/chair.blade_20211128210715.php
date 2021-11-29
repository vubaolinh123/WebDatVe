@extends('Backend.layout_admin')
@section('conten.admin')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h2>Danh sách ghế vip từng phòng</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="thead-primary">
                            <tr>
                                <th scope="col">Phòng số</th>
                                <th scope="col">Rạp</th>
                                <th scope="col">Số lượng dãy</th>
                                <th scope="col">Số lượng hàng</th>
                                <th scope="col">Cột bắt đầu dãy ghế vip </th>
                                <th scope="col">Cột kết thúc dãy ghế vip </th>
                                <th scope="col">Cột bắt đầu hàng ghế vip </th>
                                <th scope="col">Cột kết thúc hàng ghế vip </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $stt = 1;
                            @endphp
                            @foreach ($cinemarooms as $cinemaroom)
                                <tr>
                                    <th>{{ $stt++ }}</th>
                                    <th>{{ $cinemaroom->cinema->name }}</th>
                                    <td>{{ $cinemaroom->quantity_row }}</td>
                                    <td>{{ $cinemaroom->quantity_col }}</td>

                                    <td>
                                        <select data-type="col" class="form-control changeChair" >
                                            <option value="">Chọn dãy bắt đầu dãy ghế vip</option>
                                            @for ($i = 1; $i <= $cinemaroom->quantity_row; $i++)

                                                <option  @if ($i ==  $cinemaroom -> vip_col_start)  {{ 'selected' }}  @endif  value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </td>
                                    <td>
                                        <select data-type="col" class="form-control changeChair" >
                                            <option value="">Chọn dãy kết thúc dãy ghế vip</option>
                                            @for ($i = 1; $i <= $cinemaroom->quantity_row; $i++)
                                            <option  @if ($i ==  $cinemaroom -> vip_col_end)  {{ 'selected' }}  @endif value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </td>
                                    <td>
                                        <select data-type="row" class="form-control changeChair" >
                                            <option value="">Chọn hàng bắt đầu hàng ghế vip</option>
                                            @for ($i = 1; $i <= $cinemaroom->quantity_col; $i++)
                                            <option  @if ($i ==  $cinemaroom -> vip_row_start)  {{ 'selected' }}  @endif value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </td>
                                    <td>
                                        <select data-type="row" class="form-control changeChair" >
                                            <option value="">Chọn hàng kết thúc hàng ghế vip</option>
                                            @for ($i = 1; $i <= $cinemaroom->quantity_col; $i++)
                                            <option @if ($i ==  $cinemaroom -> vip_row_end)  {{ 'selected' }}  @endif value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </td>
                                    {{-- <td>{{ $cinemaroom->vip_col_start }}</td>
                                    <td>{{ $cinemaroom->vip_col_end }}</td>
                                    <td>{{ $cinemaroom->vip_row_start }}</td>
                                    <td>{{ $cinemaroom->vip_row_end }}</td> --}}

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

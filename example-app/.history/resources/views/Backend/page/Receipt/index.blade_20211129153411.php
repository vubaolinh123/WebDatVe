@extends('Backend.layout_admin')
@section('conten.admin')
<div class="row">

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h2>Danh sách hóa đơn đã mua vé </h2>
            </div>
            <div class="m-3 p-2">
                <input id="sr-li-re" type="text" class="form-control" placeholder="Tìm kiếm ...">
                <br>
                <button data-type="now" class="btn btn-primary now">Hôm nay</button>
                <button data-type="sevent-day" class="btn btn-primary sevent-day">7 ngày trước</button>
                <button data-type="month" class="btn btn-primary month">Tháng này</button>
                <button data-type="all" style="background: red" class="btn btn-primary month">Tất cả</button>
            </div>
             <div id="render-list"></div>
        </div>
    </div>
</div>

@endsection

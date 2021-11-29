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
                <input type="checkbox"  class="form-control">
            </div>
             <div id="render-list"></div>
        </div>
    </div>
</div>

@endsection

@extends('Backend.layout_admin')
@section('conten.admin')
    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h2>Thêm Size Đồ Ăn</h2>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('admin.size_food.store') }}"  method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Tên Size Đồ Ăn</label>
                                <input name="name" type="text" class="form-control  " placeholder="Tên Đồ Ăn">
                            </div>
                            <button type="submit" class="btn btn-primary">Lưu</button>
                            <a class="btn btn-dark">Quay lại</a>
                        </form>
                    </div>
                </div>
            </div>




        </div>
    </div>
@endsection

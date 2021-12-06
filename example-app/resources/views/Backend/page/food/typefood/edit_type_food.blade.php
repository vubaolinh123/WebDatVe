@extends('Backend.layout_admin')
@section('conten.admin')
    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h2>Thêm Loại Đồ Ăn</h2>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('admin.type_food.updated',['id' => $GetAllTypeFood->id_type_food]) }}"  method="POST" enctype="multipart/form-data">
                            @csrf
                            @method("put")
                            <div class="form-group">
                                <label for="">Tên Loại Đồ Ăn</label>
                                <input name="name" type="text" class="form-control  " placeholder="Tên Đồ Ăn" value="{{$GetAllTypeFood->name}}">
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

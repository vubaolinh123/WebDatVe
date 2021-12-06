@extends('Backend.layout_admin')
@section('conten.admin')
    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h2>Thêm Đồ Ăn</h2>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('admin.food.store') }}"  method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Tên đồ ăn</label>
                                <input name="name" type="text" class="form-control  " placeholder="Tên Đồ Ăn">
                            </div>
                            <div class="form-group">
                                <label for="">Giá Đồ Ăn</label>
                                <input name="price" type="number" class="form-control  " placeholder="Giá Đồ Ăn">
                            </div>
                            <div class="form-group">
                                <label for="">Loại Đồ Ăn</label>
                                <select name="typefood" id="" class="form-control"> 
                                    @foreach($TypeAll as $typefood)
                                        <option value="{{$typefood->id_type_food}}">{{ $typefood->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Size Đồ Ăn</label>
                                <select name="sizefood" id="" class="form-control">
                                    @foreach($SizeAll as $sizefood)
                                        <option value="{{$sizefood->id_size_food}}">{{ $sizefood->name}}</option>
                                    @endforeach
                                </select>
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

@extends('Backend.layout_admin')
@section('conten.admin')
    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h2>Thêm thể loại phim</h2>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('admin.typefilm.addSave') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Tên thể loại</label>
                                <input name="name" type="text" class="form-control  " placeholder="Tên thể loại">
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

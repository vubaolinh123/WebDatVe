@extends('Backend.layout_admin')
@section('conten.admin')
    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="">Thêm loại ghế</h2>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form id="add_type_chair" action="{{ route('admin.typechair.addSave') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Tên loại ghế</label>
                                <input name="name" type="text" class="form-control  " placeholder="Tên thể loại">
                            </div>
                            <div class="form-group">
                                <label for="">Giá loại ghế</label>
                                <input name="unit_price" type="text" class="form-control  " placeholder="Tên thể loại">
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
@section('javascrip.backend')
    <script>
        $(document).ready(function() {
            $("#add_type_chair").validate({
                onkeyup: false,
                rules: {
                    name_chair: {
                        required: true,
                    },
                    price_chair: {
                        required: true,
                        number: true,
                        min: 1,
                    },
                },
                messages: {
                    name_chair: {
                        required: 'Bạn chưa điền tên loại ghế !!!',

                    },
                    price_chair: {
                        required: 'Bạn chưa điền giá loại ghế !!!',
                        number: 'Phải là số !!!',
                        min: 'Vui lòng nhập giá trị lớn hơn hoặc bằng 1 !!',
                    },
                }
            });
        });
    </script>
@endsection

@extends('Backend.layout_admin')
@section('conten.admin')
    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="">Thêm thể loại bài viết</h2>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form id="add_type_blog" action="{{ route('admin.type_blog.saveadd') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="">Tên thể loại</label>
                                        <input type="text" name="name" id="" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="">Trạng thái</label>
                                        <select class="form-control" name="active" id="">
                                            <option value="0">Hiện trang chủ</option>
                                            <option value="1">Ẩn trang chủ</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary">Lưu</button>
                            <a href="{{ route('admin.type_blog.list') }}" class="btn btn-dark">Quay lại</a>

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

            $("#add_type_blog").validate({
                onkeyup: false,
                // debug: false,
                rules: {
                    name: {
                        required: true,
                    },


                },
                messages: {
                    name: {
                        required: 'Chưa nhập !!',
                    },


                }
            });
        });
    </script>



@endsection

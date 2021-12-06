@extends('Backend.layout_admin')
@section('conten.admin')
    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="">Thêm bài tin tức</h2>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form id="add_news" action="{{ route('admin.news.saveadd') }}" method="POST"
                            enctype="multipart/form-data">
                            {{-- crsf tạo ra input có name là token ngẫu nhiên hỗ trợ bảo mật chống hack --}}
                            @csrf
                            <style>
                                textarea.error {
                                    border: 1px solid #FF0000 !important;
                                }

                            </style>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Tiêu đề bài viết</label> <br>
                                        <textarea class="summernote" name="title_news" id="" style="width:100%"
                                            rows="10"></textarea>
                                        @error('title_news')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <label for="">Ảnh tin tức</label>
                                        <input type="file" name="image_news" id="" class="form-control" placeholder="">
                                        @error('image_news')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="form-group">

                                <label for="">Nội dung tin tức</label> <br>
                                <textarea class="summernote" name="content_news" id="" style="width:100%"
                                    rows="5"></textarea>
                                @error('content_news')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Lưu</button>
                            <a href="{{ route('admin.news.list') }}" class="btn btn-dark">Quay lại</a>

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

            $("#add_news").validate({
                onkeyup: false,
                ignore: [],
                // debug: false,
                rules: {
                    title_news: {
                        required: true,
                    },
                    content_news: {
                        required: true,
                    },
                    image_news: {
                        required: true,
                        extension: "jpeg|png|jpg|gif",
                    },

                },
                messages: {
                    title_news: {
                        required: 'Chưa có tiêu đề !!!',
                    },
                    content_news: {
                        required: 'Chưa có nội dung !!!',
                    },
                    image_news: {
                        required: "Chưa chọn ảnh tin tức !!",
                        extension: "Vui lòng chọn ảnh ở định dạng (jpeg,png,jpg,gif).",
                    },
                }
            });
        });
    </script>



@endsection

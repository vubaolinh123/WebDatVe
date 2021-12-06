@extends('Backend.layout_admin')
@section('conten.admin')
    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="">Sửa bài viết</h2>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form id="add_blog" action="{{ route('admin.blog.saveedit', ['id_blog' => $blog->id_blog]) }}"
                            method="POST" enctype="multipart/form-data">

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
                                        <textarea class="summernote" name="title_blog" id="" style="width:100%"
                                            rows="10">{{ $blog->title_blog }}</textarea>
                                        @error('title_blog')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Lượt xem</label>
                                        <input value="{{ $blog->view_blog }}" type="number" name="view_blog" id=""
                                            class="form-control" placeholder="">
                                        @error('view_blog')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="">Ảnh chính</label>
                                        <input value="{{ $blog->mainimg_blog }}" type="file" name="mainimg_blog" id=""
                                            class="form-control" placeholder="">
                                        @error('mainimg_blog')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Ảnh cũ</label>
                                        <img style="width:100%" src="{{ asset("$URL_IMG_BLOG/$blog->mainimg_blog") }}"
                                            alt="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Thuộc thể loại blog</label>
                                        <select class="form-control" name="typeblog_id" id="">
                                            @foreach ($typeBlogs as $typeBlog)
                                                <option
                                                    {{ $blog->typeblog_id == $typeBlog->id_type_blog ? 'selected' : '' }}
                                                    value="{{ $typeBlog->id_type_blog }}">{{ $typeBlog->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">

                                <label for="">Nội dung bài viết</label> <br>
                                <textarea class="summernote" name="conten_blog" id="" style="width:100%" rows="5">
                                                                                                                                        {{ $blog->conten_blog }}
                                                                                                                                        </textarea>
                                @error('conten_blog')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Lưu</button>
                            <a href="{{ route('admin.blog.list') }}" class="btn btn-dark">Quay lại</a>

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

            $("#add_blog").validate({
                onkeyup: false,
                ignore: [],
                // debug: false,
                rules: {
                    // view_blog: {
                    //     required: true,
                    //     // number: true,
                    // },
                    title_blog: {
                        required: true,
                    },
                    conten_blog; {
                        required: true,

                    },
                    mainimg_blog: {
                        required: true,
                        extension: "jpeg|png|jpg|gif",
                    },

                },
                messages: {
                    // view_blog: {
                    //     required: 'Chưa có lượt xem !!',
                    //     // number: 'Phải là số !!! ',
                    // },
                    title_blog: {
                        required: 'Chưa có tiêu đề !!!',
                    },
                    conten_blog; {
                        required: 'Chưa có nội dung !!!',

                    },
                    mainimg_blog: {

                        required: "Chưa chọn ảnh sản phẩm !!",
                        extension: "Vui lòng chọn ảnh ở định dạng (jpeg,png,jpg,gif).",
                    },

                }
            });
        });
    </script>



@endsection

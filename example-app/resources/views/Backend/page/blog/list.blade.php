@extends('Backend.layout_admin')
@section('conten.admin')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h2>Danh sách thời gian chiếu phim</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tableData" class="table table-hover">
                            <thead class="thead-primary">
                                <tr>
                                    <th scope="col">#</th>
                                    <th style="width:130px">Ảnh </th>
                                    <th scope="col">Tiêu đề</th>
                                    <th scope="col">Thể loại</th>
                                    <th scope="col">Ngày thêm</th>
                                    <th scope="col">Ngày sửa</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $stt = 1;
                                @endphp
                                @foreach ($blogs as $blog)
                                    <tr>
                                        <td>{{ $stt++ }} </td>
                                        <td>
                                            <img style="width:100%" src="{{ asset("$URL_IMG_BLOG/$blog->mainimg_blog") }}"
                                                alt="">
                                        </td>
                                        <td> {!! $blog->title_blog !!}</td>
                                        <td>
                                            {{-- @foreach ($typeBlogs as $typeBlog)
                                                @php
                                                    if ($typeBlog->id_type_blog == $blog->typeblog_id) {
                                                        echo $typeBlog->name;
                                                    }
                                                @endphp
                                            @endforeach --}}
                                            {{ $blog->type_blogs->name }}
                                        </td>
                                        <td>{{ date('d-m-Y H:i:s', strtotime($blog->created_at)) }}</td>
                                        <td>{{ date('d-m-Y H:i:s', strtotime($blog->updated_at)) }}</td>
                                        <td>
                                            <a href="{{ route('admin.blog.edit', ['id_blog' => $blog->id_blog]) }}"
                                                class="btn btn-rounded btn-primary">Sửa</a>

                                            <a href="{{ route('admin.blog.destroy', ['id_blog' => $blog->id_blog]) }}"
                                                class="btn btn-rounded btn-danger">Xóa</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascrip.backend')

@endsection

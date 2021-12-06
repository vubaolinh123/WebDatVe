@extends('Backend.layout_admin')
@section('conten.admin')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h2>Danh sách tin tức</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tableData" class="table table-hover">
                            <thead class="thead-primary">
                                <tr>
                                    <th scope="col">#</th>
                                    <th style="width:130px">Ảnh </th>
                                    <th scope="col">Tiêu đề</th>
                                    <th scope="col">Ngày thêm</th>
                                    <th scope="col">Ngày sửa</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $stt = 1;
                                @endphp
                                @foreach ($news as $new)
                                <tr>
                                    <td>{{ $stt++ }}</td>
                                    <td>
                                        <img style="width:100%"
                                        src="{{ asset("$URL_IMG_BLOG/$new->image_news") }}" alt="">
                                    </td>
                                    <td>{!! $new->title_news !!}</td>
                                    <td>{{ $new->created_at }}</td>
                                    <td>{{ $new->updated_at }}</td><td>
                                        <a href="{{ route('admin.news.edit', ['id_news' => $new->id_news]) }}"
                                            class="btn btn-rounded btn-primary">Sửa</a>

                                        <a href="{{ route('admin.news.destroy', ['id_news' => $new->id_news]) }}"
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

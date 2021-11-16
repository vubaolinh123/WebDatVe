@extends('Backend.layout_admin')
@section('conten.admin')
    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="">Quản lý cụm rạp phim </h2>
                </div>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>

                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      ...
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-xxl-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Rạp </th>
                        <th scope="col">Logo rạp</th>
                        <th scope="col">Khu vực</th>
                        <th scope="col" colspan="2">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cluster_cinemas as $key => $cluster_cinema)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $cluster_cinema->name }}</td>
                            <td>
                                <img width="200" height="200"
                                    src="{{ URL::to('images/cinema/' . $cluster_cinema->logo) }}" alt="">
                            </td>
                            <td>
                                @foreach ($citys as $city)
                                    @if ($city->code == $cluster_cinema->city_id)
                                        {{ $city->name }}
                                    @endif
                                @endforeach
                            </td>
                            <td>Update</td>
                            <td>
                                <form action="{{ route('cinema.cluster.delete',['id' => $cluster_cinema -> id ]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Xóa</i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                {!! $cluster_cinemas->links() !!}
            </table>
        </div>
    </div>
@endsection

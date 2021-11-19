<div>
    <div wire:ignore>
        <button type="button" class="btn btn-primary btn-rounded" data-toggle="modal"
            data-target=".bd-example-modal-lg">Thêm mới</button>

        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    {{--  --}}
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('cinema.create') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-4">
                                        <div class="form-group">
                                            <label for="">Thuộc khu vực</label>
                                            <select wire:change="get_cinema_districts" wire:model="city_id"
                                                class="form-control" name="city_id" id="">
                                                @foreach ($citys as $city)
                                                    <option value="{{ $city->code }}">
                                                        {{ $city->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="form-group">
                                            <label for="">Thuộc cụm rạp</label>
                                            <select class="form-control" name="city_id" id="">
                                                @foreach ($cluster_cinemas as $cluster_cinema)
                                                    <option value="{{ $cluster_cinema->id }}">
                                                        {{ $cluster_cinema->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        @dump($city_id)
                                        <div  class="form-group">
                                            <label for="">Quận \ Huyện</label>
                                            <select  class="form-control" name="city_id" id="">
                                                @foreach ($districtsD as $district)
                                                    <option value="{{ $district->code }}">
                                                        {{ $district->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-9">
                                        <div class="form-group">
                                            <label for="">Tên rạp</label>
                                            <input name="name" type="text" class="form-control  " placeholder="Tên rạp">
                                            <x-error field="name" class="text-danger" />
                                        </div>
                                    </div>
                                    <div class="col-xl-3">
                                        <div class="form-group">
                                            <label for="">Ảnh rạp </label>
                                            <br>
                                            <img style="display:none;width:200px ; height : 200px ; border-radius:50%"
                                                id="showImg">
                                            <input type="file" name="logo" id="" class="form-control"
                                                onchange="onChangeImg(this)">
                                            <x-error field="logo" class="text-danger" />
                                        </div>
                                    </div>
                                    <div class="col-xl-8">
                                        <div class="form-group">
                                            <label for="">Địa chỉ cụ thể rạp </label> <br>
                                            <textarea class="summernote" name="summary" id="" style="width:100%"
                                                rows="10"></textarea>
                                        </div>
                                    </div>

                                    <div class="p-3">
                                        <button type="submit" class="btn btn-primary">Lưu</button>

                                        <button type="button" class="btn btn-info" data-dismiss="modal">Quay
                                            lại</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                    {{--  --}}
                </div>
            </div>
        </div>
    </div>

</div>

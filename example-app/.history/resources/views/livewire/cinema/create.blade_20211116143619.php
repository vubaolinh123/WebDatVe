<div>

                            <form wire:poll action="{{ route('cinema.create') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-4">
                                        <div class="form-group" >
                                            <label for="">Thuộc khu vực</label>
                                            <select wire:model="city_id"
                                                class="form-control" >
                                                @foreach ($citys as $city)
                                                    <option value={{ $city->code }}>
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

                                                @if (count($districtsD) == 0)
                                                    <option disabled value="">--Chọn--</option>
                                                @else
                                                @foreach ($cluster_cinemas as $cluster_cinema)
                                                    <option disabled value="">--Chọn--</option>
                                                    <option value="{{ $cluster_cinema->id }}">
                                                        {{ $cluster_cinema->name }}
                                                    </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div  class="form-group">
                                            <label for="">Quận \ Huyện</label>
                                            <select  class="form-control" name="city_id" id="">
                                                <option value="">--Chọn--</option>
                                                @if (count($districtsD) == 0)
                                                @else
                                                @foreach ($districtsD as $district)
                                                    <option value="{{ $district->code }}">
                                                        {{ $district->name }}
                                                    </option>
                                                @endforeach
                                                @endif

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
                                            <textarea wire:model="ddd" class="summernote" name="summary" id="" style="width:100%"
                                                rows="10"></textarea>{{ $ddd }}
                                        </div>
                                    </div>

                                    <div class="p-3">
                                        <button type="submit" class="btn btn-primary">Lưu</button>

                                        <button type="button" class="btn btn-info" data-dismiss="modal">Quay
                                            lại</button>
                                    </div>
                            </form>


</div>

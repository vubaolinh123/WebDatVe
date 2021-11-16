<div wire:ignore>
    <form wire:submit.prevent="update_cinema" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xl-4">
                <div class="form-group">
                    <label for="">Thuộc khu vực</label>
                    <select wire:model="city_id" class="form-control">
                        <option value="0">--Chọn--</option>
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
                    <select wire:model="cluster_cinema_id" class="form-control" name="city_id" id="">

                        @if (count($cluster_cinemas) == 0)
                            <option>--Không có rạp--</option>
                        @else
                            <option value="0">--Chọn--</option>
                            @foreach ($cluster_cinemas as $cluster_cinema)
                                <option value="{{ $cluster_cinema->id }}">
                                    {{ $cluster_cinema->name }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                    <x-error field="cluster_cinema_id" class="text-danger" />
                </div>
            </div>
            <div class="col-xl-4">
                <div class="form-group">
                    <label for="">Quận \ Huyện</label>


                    <select wire:model="district_id" class="form-control" name="city_id" id="">
                        <option value="0">--Chọn--</option>

                        @foreach ($districtsD as $district)
                            <option value="{{ $district->code }}">
                                {{ $district->name }}
                            </option>
                        @endforeach
                    </select>

                    <x-error field="district_id" class="text-danger" />
                </div>
            </div>
            @if ($flag)

                <div class="col-xl-7">
                    <div class="form-group">
                        <label for="">Tên rạp</label>
                        <input   wire:model="name" name="name" type="text" class="form-control  " placeholder="Tên rạp">
                        <x-error field="name" class="text-danger" />
                    </div>
                </div>
                <div class="col-xl-5">
                    <div class="form-group">
                        <label for="">Điện thoại liên hệ</label>
                        <input wire:model="phone" name="name" type="number" class="form-control  "
                            placeholder="Điện thoại liên hệ">
                        <x-error field="phone" class="text-danger" />
                    </div>
                </div>
                <div class="col-xl-7">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input wire:model="email" type="email" class="form-control  " placeholder="Email">
                        <x-error field="email" class="text-danger" />
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="form-group">
                        <label for="">Ảnh rạp </label>
                        <br>
                        <img  src="{{ URL::to('storage/' . $cinema->image) }}" style="width:200px ; height : 200px ; border-radius:50%" id="showImg">
                        <input wire:model="image" type="file" name="logo" id="" class="form-control"
                            onchange="onChangeImg(this)">
                        <x-error field="image" class="text-danger" />
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="form-group">
                        <label for="">Mở cửa</label>
                        <div class=" "
                             >
                            <input  class="form-control"  wire:model="cinema_open" type="time" >
                        </div>
                        <x-error field="cinema_open" class="text-danger" />
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="form-group">
                        <label for="">Đóng cửa </label>
                        <div class=" "
                             >
                            <input class="form-control" wire:model="cinema_close" type="time" >
                        </div>
                        <x-error field="cinema_close" class="text-danger" />
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="form-group">
                        <label for="">Địa chỉ cụ thể rạp </label> <br>
                        <textarea wire:model="address" style="width:100%" rows="10"></textarea>
                    </div>
                    <x-error field="address" class="text-danger" />
                </div>
                <div class="col-xl-4">
                    <div class="form-group">
                        <label for="">Chi tiết</label> <br>
                        <textarea wire:model="detail" style="width:100%" rows="10"></textarea>
                    </div>
                    <x-error field="detail" class="text-danger" />
                </div>
            @endif
            <div class="col-xl-8">
                <div class="p-3">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                    <a href="{{ route('cinema') }}" class="btn btn-info" data-dismiss="modal">Quay
                        lại</a>
                </div>
            </div>
    </form>
</div>

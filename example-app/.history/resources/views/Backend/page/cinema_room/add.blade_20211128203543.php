@extends('Backend.layout_admin')
@section('conten.admin')
    {{-- <style>
        .rating-group {
            display: flex;
            flex-flow: column;
        }

        .rating-group_col {
            margin-top: -70px;
            margin-left: 40px
        }

        .rating__icon {
            pointer-events: none;
        }

        .rating__input {
            position: absolute !important;
            left: -9999px !important;
        }

        .rating__label {
            cursor: pointer;
            padding: 0 0.1em;
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 35px;
            /* max-height: 40px; */
        }

        .rating__label::before {
            content: attr(data-text);
            position: relative;
            z-index: 10;

            font-family: "Montserrat", sans-serif;
            color: #ff0000;
            letter-spacing: 0.08em;
        }

        .rating__icon--star {
            color: rgb(255, 255, 255);
            background-color: black;
        }

        .rating__input:checked~.rating__label .rating__icon--star {
            color: rgb(0, 0, 0);
            background-color: rgb(193, 193, 193);
            opacity: 0.2;
        }

        .rating__input:checked~.rating__label::before {
            color: rgb(0, 0, 0);
            /* background-color: rgb(193, 193, 193); */
            opacity: 0.2;
        }

    </style> --}}
    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="">Thêm phòng</h2>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form id="add_cr" autocomplete="off" action="{{ route('admin.cinemaroom.addSave') }}"
                            method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-xl-6">
                                    <select name="cinema_id" id="">
                                        @foreach ($cinemas as $cinema)
                                            <option value="{{ $cinema -> id }}">{{ $cinema->cluster_cinema -> name }} - {{ $cinema -> name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="">Số lượng dãy</label>
                                        <select class="form-control" name="quantity_row" id="">
                                            @php
                                                $stt = 1;
                                                $value = 1;
                                            @endphp
                                            @foreach ($rows as $row)
                                                <option value="{{ $value++ }}">
                                                    {{ $stt++ }} --- {{ $row->name_row }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="">Số lượng hàng</label>
                                        <input name="quantity_col" type="text" class="form-control"
                                            placeholder="Số lượng hàng">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Lưu</button>
                                        <a class="btn btn-dark">Quay lại</a>
                                    </div>
                                </div>
                            </div>
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
            $("#add_cr").validate({
                onkeyup: false,
                rules: {
                    quantity_row: {
                        required: true,
                        number: true,
                    },
                    quantity_col: {
                        required: true,
                        number: true,
                        // min: 1,
                        // max: 12,
                    },
                },
                messages: {
                    quantity_row: {
                        required: 'Bạn chưa điền số lượng dãy !!!',
                        number: 'Phải là số !!!',
                        max: 'Vui lòng nhập giá trị nhỏ hơn hoăc bằng 12 !!',
                        min: 'Vui lòng nhập giá trị lớn hơn hoặc bằng 1 !!',
                    },
                    quantity_col: {
                        required: 'Bạn chưa điền số lượng dãy !!!',
                        number: 'Phải là số !!!',
                        // max: 'Vui lòng nhập giá trị nhỏ hơn hoăc bằng 12 !!',
                        // min: 'Vui lòng nhập giá trị lớn hơn hoặc bằng 1 !!',
                    },
                }
            });
        });
    </script>

    {{-- <script>
        // $(".quantity_row").onkeyup(function() {
        // });
        $('.quantity_row').on('change', function(e) {
            var quantity_row = $(this).val();
            alert(quantity_row);
        });
        $(".quantity_col").on('change', function() {
            var quantity_col = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "GET",
                url: "{{ route('admin.cinemaroom.getRowAjax') }}",
                data: {
                    quantity_col: quantity_col,
                },

                success: function(response) {
                    $('#render').html(response);
                }
            });
        });

        function reder() {
            $.ajax({
                type: "Get",
                url: "{{ route('admin.cinemaroom.render') }}",
                success: function(response) {
                    $('#render').html(response);
                }
            });
        }
        reder();
    </script> --}}

@endsection

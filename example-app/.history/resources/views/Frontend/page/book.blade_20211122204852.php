<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Book</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
    integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('frontend/css/book.css') }}">
    <style>
        .container {
            display: grid;
            grid-template-columns: 900px 1fr;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="main">
            <div class="wrapper-film-right">
                <h2>chọn vé/thức ăn</h2>
                <div class="table-film">
                    <table id="table-type">
                        <thead>
                            <th>Loại vé</th>
                            <th style="text-align: center;">Số lượng</th>
                            <th style="text-align: right;">Giá (VNĐ)</th>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $ticket)
                                <tr style="width: 350px;">
                                    <td class="table-type-td">
                                        <p class="text-bold">{{ $ticket->name }}</p>
                                        <small>{{ $ticket->detail }}</small>
                                    </td>
                                    <td class="input-type">
                                        <span class="input-group input-booking">
                                            <button class="pre"  data-id="{{ $ticket -> id_price_ticket }}">
                                                <span>
                                                    <i class="fas fa-minus"></i>
                                                </span>
                                            </button>
                                        </span>
                                        <input
                                            data-id="{{ $ticket->id_price_ticket }}"
                                            data-type="ticket"
                                            name="s1"
                                            class="sl_{{  $ticket -> id_price_ticket }}"
                                            type="number"
                                            min="0"
                                            value="@php  if(session()->has('book1')){
                                                    foreach (session()->get('book1' )as $key => $value)
                                                    {if($key == 'ticket') foreach ($value as $k => $v){ if($k == $ticket -> id_price_ticket) echo $v;}}
                                                }else{echo 0 ;} @endphp"
                                            name="s1"
                                        >
                                        <span class="input-group input-booking">
                                            <button class="next" data-id="{{ $ticket -> id_price_ticket }}">
                                                <span>
                                                    <i class="fas fa-plus"></i>
                                                </span>
                                            </button>
                                        </span>
                                    </td>
                                    <td style="text-align: right;">
                                        <input type="hidden" value="{{ $ticket->unit_price }}" class="price_{{  $ticket -> id_price_ticket }}" >
                                        {{ number_format($ticket->unit_price) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <table id="table-combo">
                        <thead>
                            <th>Combo</th>
                            <th style="text-align: center;">Số lượng</th>
                            <th style="text-align: right;">Giá (VNĐ)</th>
                        </thead>
                        <tbody>
                            @foreach ($foods as $food)
                            @if ($food->type_food->id_type_food == 3)
                            <tr style="text-align: center;">
                                <td class="table-combo-td">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSWAw170DRgRqAMmLL0iE5AfchWUNPqgGsN0YGpi6nRCzsORjiWiASRAsjF8WD2ifWWm4Q&usqp=CAU" alt="">
                                    <div class="text">
                                        <p class="text-bold">{{ $food->name }}</p>
                                        <p class="text-light-combo">{{ $food->type_food->name }}</p>
                                    </div>
                                </td>
                                <td   class="input-type">
                                    <span class="input-group input-booking">
                                        <button disabled="disabled">
                                            <span>
                                                <i class="fas fa-minus"></i>
                                            </span>
                                        </button>
                                    </span>
                                    <input
                                        data-id="{{ $food->id_food }}"
                                        data-type="food"
                                        class="sl"
                                        type="number"
                                        min="0"
                                        value="@php  if(session()->has('book1')){
                                            foreach (session()->get('book1' )as $key => $value)
                                            { if($key == 'food') foreach ($value as $k => $v){ if($k == $food -> id_food) echo $v; } }
                                        }else{ echo 0 ;}   @endphp"
                                        name="s1"
                                    >
                                    <span class="input-group input-booking">
                                        <button>
                                            <span>
                                                <i class="fas fa-plus"></i>
                                            </span>
                                        </button>
                                    </span>
                                </td>
                                <td style="text-align: right;">{{ $food->price }}</td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>

                    <table id="table-combo">
                        <thead>
                            <th>Đồ ăn & đồ uống</th>
                            <th style="text-align: center;">Số lượng</th>
                            <th style="text-align: right;">Giá (VNĐ)</th>
                        </thead>
                        <tbody>
                            @foreach ($foods as $food)
                            @if ($food->type_food->id_type_food != 3)
                            <tr style="text-align: center;">
                                <td class="table-combo-td">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSWAw170DRgRqAMmLL0iE5AfchWUNPqgGsN0YGpi6nRCzsORjiWiASRAsjF8WD2ifWWm4Q&usqp=CAU" alt="">
                                    <div class="text">
                                        <p class="text-bold">{{ $food->name }}</p>
                                        <p class="text-light-combo">{{ $food -> type_food -> name}}</p>
                                    </div>
                                </td>
                                <td   class="input-type">
                                    <span class="input-group input-booking">
                                        <button disabled="disabled">
                                            <span>
                                                <i class="fas fa-minus"></i>
                                            </span>
                                        </button>
                                    </span>
                                    <input
                                        data-id="{{ $food->id_food }}"
                                        data-type="food"
                                         class="sl"
                                         type="number"
                                         min="0"
                                         value="@php  if(session()->has('book1')){
                                            foreach (session()->get('book1' )as $key => $value) {
                                               if($key == 'food') foreach ($value as $k => $v){if($k == $food -> id_food)  echo $v;}
                                            }
                                        }else{ echo 0 ;}   @endphp"
                                         name="s1"
                                      >
                                    <span class="input-group input-booking">
                                        <button>
                                            <span>
                                                <i class="fas fa-plus"></i>
                                            </span>
                                        </button>
                                    </span>
                                </td>
                                <td style="text-align: right;"> {{ $food->price }}</td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="main-left">
            <div class="detail-film">
                <div class="box-detail">
                    <div class="img-film">
                        <img style="height:350px !important" height="100"
                            src="{{ asset("$URL_IMG_FILM/" . $show_time->film->avatar) }} " alt="">
                        <p class="text-bold">{{ $show_time->film->name }}</p>
                        <p class="text-regulary">{{ $show_time->film->cast }}</p>
                    </div>
                    <div class="ticket-info">
                        <p><b>Rạp : </b>{{ $show_time->cinema_room->cinema->cluster_cinema->name }} -
                            {{ $show_time->cinema_room->cinema->name }}</p>
                        <p><b>Suất chiếu : </b>{{ date('h:i', strtotime($show_time->start_time)) }} | Ngày :
                            {{ $show_time->show_date }} </p>
                    </div>
                    <div id="show_book" class="ticket-price-total">

                    </div>
                    <div class="view-more">
                        <button id="clickNext" >Tiếp tục <i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <script>
        $(document).ready(function(){
            render();
            function render() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: ("{{ route('web.render_book_show') }}"),
                    method: "GET",
                    success: function(data){
                         $('#show_book').html(data);
                    }
                })
            }
            $('.pre').on('click', function(){
                let id = $(this).data('id');
                let count = $('.sl_' + id).val() - 1;
                let price = $('.price_' + id).val();
                let showTIen = Number($('#showTien').val());
                if (count <= 0) count = 0;
                var priceNew = price * count;
                var showTIenNew = showTIen - price;
                $('#showTien').val(showTIenNew);
                $('.sl_' + id).val(count);
                $('.show_' + id).html(priceNew);
            });
            $('.next').on('click', function() {
                let id = $(this).data('id');
                let count = Number($('.sl_' + id).val()) + 1;
                let price = Number($('.price_' + id).val());
                let showTIen = Number($('#showTien').val());
                var priceNew = price * count;
                var showTIenNew = showTIen + price;
                $('#showTien').val(showTIenNew);
                $('.sl_' + id).val(count);
                $('.show_' + id).html(priceNew);
            });
            $('#clickNext').on('click', function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: ("{{ route('web.check_render_book') }}"),
                    method: "GET",
                    success: function(data){
                        if(data == 0){
                            alert('Chọn vé đi bro :>');
                        }else{
                            window.location = "/book-ghe/{{ $id }}";
                        }
                    }
                })
            });
            $("input[name='s1']").on('change',function(e){
                let value = e.target.value;
                let id = $(this).data('id');
                let type = $(this).data('type');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: ("{{ route('web.render_book') }}"),
                    method: "POST",
                    data :{value : value , type : type , id : id},
                    success: function(data){
                        render();
                    }
                })
            })
        })
    </script>
</body>
</html>

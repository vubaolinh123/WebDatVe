<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Book</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/book.css">

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
                            <th style="text-align: right;">Tổng (VNĐ)</th>
                        </thead>
                        <tbody>

                            <tr style="width: 350px;">
                                <td class="table-type-td">
                                    <p class="text-bold">Người lớn</p>
                                    <p class="text-light">Vé 2D-Chỉ áp dụng khách hàng thành viên</p>
                                </td>
                                <td class="input-type">
                                    <span class="input-group input-booking">

                                        <button disabled="disabled">
                                            <span>
                                                <i class="fas fa-minus"></i>
                                            </span>

                                        </button>
                                    </span>
                                    <input class="sl" type="number" min="0" value="0" name="s1"
                                        onchange="updateSL(1)">
                                    <span class="input-group input-booking">

                                        </button>
                                    </span>
                                    {{-- <input class="input1" type="number" min="0" value="0" name="s1"> --}}
                                    <span class="input-group input-booking">

                                        <button>
                                            <span>
                                                <i class="fas fa-plus"></i>
                                            </span>

                                        </button>
                                    </span>
                                </td>
                                <td style="text-align: right;"><input type="text" readonly class="gia"
                                        value="65000"></td>
                                <td style="text-align: right;"><label class="tt"></label></td>
                            </tr>
                            <tr>
                                <td colspan="3" style="color: #F26B38;">Tổng</td>
                                <td style="text-align: right;"><label id="tongtien"></label></td>
                            </tr>
                        </tbody>
                    </table>
                    <table id="table-combo">
                        <thead>
                            <th>Combo</th>
                            <th style="text-align: center;">Số lượng</th>
                            <th style="text-align: right;">Giá (VNĐ)</th>
                            <th style="text-align: right;">Tổng (VNĐ)</th>
                        </thead>
                        <tbody>
                            <tr style="text-align: center;">
                                <td class="table-combo-td">
                                    <img src="./img/combo-1.jpg" alt="">
                                    <div class="text">
                                        <p class="text-bold">Combo 2 Big</p>
                                        <p class="text-light-combo">1 BẮP + 2 NƯỚC NGỌT 32 OZ</p>
                                    </div>
                                </td>
                                <td class="input-type">
                                    <span class="input-group input-booking">

                                        </button>
                                    </span>
                                </td>
                                <td style="text-align: right;"><input type="text" readonly class="gia gia1"
                                        value="65000"></td>
                                <td style="text-align: right;"><label class="tt tongItem1"></label< /td>
                            </tr>
                            <tr>
                                <td colspan="3" style="color: #F26B38;">Tổng</td>
                                <td style="text-align: right;"><label id="tongtien1"></label></td>
                            </tr>
                        </tbody>
                    </table>
                    <table id="table-combo">
                        <thead>
                            <th>Combo</th>
                            <th style="text-align: center;">Số lượng</th>
                            <th style="text-align: right;">Giá (VNĐ)</th>
                            <th style="text-align: right;">Giá (VNĐ)</th>
                            <th style="text-align: right;">Tổng (VNĐ)</th>
                        </thead>
                        <tbody>
                            {{-- <tr style="text-align: center;">
                                <td class="table-combo-td">
                                    <img src="./img/combo-1.jpg" alt="">
                                    <div class="text">
                                        <p class="text-bold">Combo 2 Big</p>
                                        <p class="text-light-combo">1 BẮP + 2 NƯỚC NGỌT 32 OZ</p>
                                    </div>
                                </td>
                                <td class="input-type">
                                    <span class="input-group input-booking">

                                        <button disabled="disabled">
                                            <span>
                                                <i class="fas fa-minus"></i>
                                            </span>

                                        </button>
                                    </span>
                                    <input class="sl" type="number" min="0" value="0" name="s1"
                                        onchange="updateSlcombo(0)">
                                    <span class="input-group input-booking">

                                        </button>
                                    </span>
                                    <input class="input2" type="number" min="0" value="0" name="s1">
                                    <span class="input-group input-booking">

                                        <button>
                                            <span>
                                                <i class="fas fa-plus"></i>
                                            </span>

                                        </button>
                                    </span>
                                </td>
                                <td style="text-align: right;"><input type="text" readonly class="gia"
                                        value="65000"></td>
                                <td style="text-align: right;"><label class="tt"></label></td>
                            </tr>
                            <tr style="text-align: center;">
                                <td class="table-combo-td">
                                    <img src="./img/combo-1.jpg" alt="">
                                    <div class="text">
                                        <p class="text-bold">Combo 2 Big</p>
                                        <p class="text-light-combo">1 BẮP + 2 NƯỚC NGỌT 32 OZ</p>
                                    </div>
                                </td>
                                <td class="input-type">
                                    <span class="input-group input-booking">

                                        </button>
                                    </span>
                                </td>
                                <td style="text-align: right;"><input type="text" readonly class="gia gia2"
                                        value="65000"></td>
                                <td style="text-align: right;"><label class="tt tongItem2"></label></td>
                            </tr> --}}
                            {{-- <tr style="text-align: center;">
                                <td class="table-combo-td">
                                    <img src="./img/combo-1.jpg" alt="">
                                    <div class="text">
                                        <p class="text-bold">Combo 2 Big</p>
                                        <p class="text-light-combo">1 BẮP + 2 NƯỚC NGỌT 32 OZ</p>
                                    </div>
                                </td>
                                <td class="input-type">
                                    <span class="input-group input-booking">

                                        <button disabled="disabled">
                                            <span>
                                                <i class="fas fa-minus"></i>
                                            </span>

                                        </button>
                                    </span>
                                    <input class="sl" type="number" min="0" value="0" name="s1"
                                        onchange="updateSlcombo(1)">
                                    <span class="input-group input-booking">

                                        </button>
                                    </span>
                                    <input class="input2" type="number" min="0" value="0" name="s1">
                                    <span class="input-group input-booking">

                                        <button>
                                            <span>
                                                <i class="fas fa-plus"></i>
                                            </span>

                                        </button>
                                    </span>
                                </td>
                                <td style="text-align: right;"><input type="text" readonly class="gia"
                                        value="65000"></td>
                                <td id="tongtien" style="text-align: right;"><label class="tt"></label></td>
                            </tr>
                            <tr style="text-align: center;">
                                <td class="table-combo-td">
                                    <img src="./img/combo-1.jpg" alt="">
                                    <div class="text">
                                        <p class="text-bold">Combo 2 Big</p>
                                        <p class="text-light-combo">1 BẮP + 2 NƯỚC NGỌT 32 OZ</p>
                                    </div>
                                </td>
                                <td class="input-type">
                                    <span class="input-group input-booking">

                                        </button>
                                    </span>
                                </td>
                                <td style="text-align: right;"><input type="text" readonly class="gia gia2"
                                        value="65000"></td>
                                <td id="tongtien" style="text-align: right;">
                                    <labe class="tt tongItem2"></labe>
                                </td>
                            </tr> --}}
                            <tr style="text-align: center;">
                                <td class="table-combo-td">
                                    <img src="./img/combo-1.jpg" alt="">
                                    <div class="text">
                                        <p class="text-bold">Combo 2 Big</p>
                                        <p class="text-light-combo">1 BẮP + 2 NƯỚC NGỌT 32 OZ</p>
                                    </div>
                                </td>
                                <td class="input-type">
                                    <span class="input-group input-booking">

                                        <button disabled="disabled">
                                            <span>
                                                <i class="fas fa-minus"></i>
                                            </span>

                                        </button>
                                    </span>
                                    <input class="sl" type="number" min="0" value="0" name="s1"
                                        onchange="updateSlcombo(2)">
                                    <span class="input-group input-booking">

                                        </button>
                                    </span>
                                    <input class="input2" type="number" min="0" value="0" name="s1">
                                    <span class="input-group input-booking">

                                        <button>
                                            <span>
                                                <i class="fas fa-plus"></i>
                                            </span>

                                        </button>
                                    </span>
                                </td>
                                <td style="text-align: right;"><input type="text" readonly class="gia"
                                        value="65000"></td>
                                <td id="tongtien" style="text-align: right;"><label class="tt"></td>

                                </button>
                                </span>
                                </td>
                                <td style="text-align: right;"><input type="text" readonly class="gia gia2"
                                        value="65000"></td>
                                <td id="tongtien" style="text-align: right;">
                                    <labe class="tt tongItem2">
                                </td>

                            </tr>
                            <tr>
                                <td colspan="3" style="color: #F26B38;">Tổng</td>
                                <td style="text-align: right;"><label id="tongtien2"></label></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="main-left">
            <div class="detail-film">
                <div class="box-detail">
                    <div class="img-film">
                        <img style="height:500px !important" height="100" src="{{ asset("$URL_IMG_FILM/".$show_time->film->avatar) }} " alt="">
                        <p class="text-bold">{{ $show_time -> film -> name }}</p>
                        <p class="text-regulary">{{ $show_time -> film -> cast }}</p>
                    </div>
                    <div class="ticket-icon">
                        <i class="icon-c18"></i>
                        <span style="color:red;">(*) Phim chỉ dành cho khán giả từ 18 tuổi trở lên</span>
                    </div>
                    <div class="ticket-info">
                        <p><b>Rạp : </b>Galaxy Hanoi</p>
                        <p><b>Suất chiếu : </b>20:00 | Thứ hai, 15/11/2021</p>
                        <p><b>Combo : </b>Galaxy Hanoi</p>
                        <p><b>Ghế : </b>Galaxy Hanoi</p>
                    </div>
                    <div class="ticket-price-total">
                        <p class="total-text">Tổng: <span class="money"><label
                                    id="tongtien3"></label></span></p>
                    </div>
                    <div class="view-more">
                        <button>Tiếp tục <i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
<script>
    var gia = document.getElementsByClassName("gia");
    var tt = document.getElementsByClassName("tt");
    var sl = document.getElementsByClassName("sl");

    function updateSL(i) {
        tt[i].innerHTML = gia[i].value * sl[i].value;
        tongtien1();
    }

    function updateSlcombo(i) {
        tt[i].innerHTML = gia[i].value * sl[i].value;
        tongtien2();
    }

    function tongtien1() {
        let tongtien = 0;
        for (j = 0; j < gia.length; j++) {
            tt[j].innerHTML = gia[j].value * sl[j].value
            tongtien += Number(tt[j].innerHTML);
        }
        document.getElementById("tongtien").innerHTML = tongtien;
        document.getElementById('tongtien3').innerHTML = Number(document.getElementById("tongtien").innerHTML) + Number(
            document.getElementById("tongtien2").innerHTML)

    }

    function tongtien2() {
        let tongtien = 0;
        for (j = 0; j < gia.length; j++) {
            tt[j].innerHTML = gia[j].value * sl[j].value
            tongtien += Number(tt[j].innerHTML);
        }
        document.getElementById("tongtien2").innerHTML = tongtien;
        document.getElementById('tongtien3').innerHTML = Number(document.getElementById("tongtien").innerHTML) + Number(
            document.getElementById("tongtien2").innerHTML)
    }
    window.onload = function() {
        let tongtiendau = 0;
        for (i = 0; i < gia.length; i++) {
            tt[i].innerHTML = gia[i].value * sl[i].value
            tongtiendau += Number(tt[i].innerHTML);
        }
        document.getElementById("tongtien").innerHTML = tongtiendau;
        document.getElementById('tongtien3').innerHTML = Number(document.getElementById("tongtien").innerHTML) +
            Number(document.getElementById("tongtien2").innerHTML)
    }
</script>

</html>

</body>
<script>
    const tongtien1 = document.querySelector('#tongtien1');
    const tongtien2 = document.querySelector('#tongtien2');
    const tongtien3 = document.querySelector('#tongtien3');
    const tongItem1 = document.querySelectorAll('.tongItem1');
    const tongItem2 = document.querySelectorAll('.tongItem2');
    const input1 = document.querySelectorAll('.input1');
    const input2 = document.querySelectorAll('.input2');
    const gia1 = document.querySelectorAll('.gia1');
    const gia2 = document.querySelectorAll('.gia2');

    for (let i = 0; i < input1.length; i++) {
        input1[i].addEventListener('change', () => {
            tongItem1[i].innerHTML = Number(gia1[i].value) * Number(input1[i].value)
            tong1()
        })
    }
    for (let i = 0; i < input2.length; i++) {
        input2[i].addEventListener('change', () => {
            tongItem2[i].innerHTML = Number(gia2[i].value) * Number(input2[i].value)
            tong2()
        })
    }

    function tong1() {
        let tong = 0;
        for (let i = 0; i < tongItem1.length; i++) {
            tong += Number(tongItem1[i].innerHTML)
        }
        tongtien1.innerHTML = tong
        tongtien3.innerHTML = Number(tongtien1.innerHTML) + Number(tongtien2.innerHTML)
    }

    function tong2() {
        let tong = 0;
        for (let i = 0; i < tongItem2.length; i++) {
            tong += Number(tongItem2[i].innerHTML)
        }
        tongtien2.innerHTML = tong
        tongtien3.innerHTML = Number(tongtien1.innerHTML) + Number(tongtien2.innerHTML)
    }
</script>

</html>

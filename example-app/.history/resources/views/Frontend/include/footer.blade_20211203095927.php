<footer style="text-align: center;
background: black;
color: white;
padding: 20px 0;">
    Bản quyền thuộc team Link Mèo@@@
</footer>
<script>
    $(document).ready(function()
    {
        $('.btn-st').on('click', function(){
            $('.btn-st').css('background','')
            let i = $(this).data('i');
            // alert(1212121)
            for (let index = 1; index <= i; index++) {
                $('.btn-'+index).css('background' , 'red');
            }
        })
    })
</script>
{{--  --}}
<script>
    $(document).ready(function () {
        $('#name_us').on('click',function(){
            $('.edituser').toggle(100);
        })
        $('#close_ud').on('click' , function(e){
            e.preventDefault();
            $('.edituser').hide(100);
        })
        $('#change-password').on('click' , function(e){
            e.preventDefault();
            let passwordOld = $('#password-old').val();
            let passwordNew = $('#password-new').val();
            let passwordConfirm = $('#password-confirm').val();
            if(passwordOld.trim() == '' ||  passwordNew.trim() == '' || passwordConfirm.trim() == ''){
                alert('Vui lòng không để trống và lớn hơn 4 ký tự !');
            }else if( passwordNew != passwordConfirm){
                alert('Mật khẩu mới không khớp !');
            }else{
                $.ajaxSetup({
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }
               });
               $.ajax({
                   url: ("{{ route('web.change.pass') }}"),
                   method: "POST",
                   data: {
                       passwordOld: passwordOld,
                       passwordConfirm: passwordConfirm,
                   },
                   success: function(data) {
                    alert(data);
                    $('#password-old').val('');
                    $('#password-new').val('');
                    $('#password-confirm').val('');
                   }
               })
            }
        })
        $('#change-user').on('click' , function (e){
            e.preventDefault();
            let value = $('#input-change-u').val();
            if(value.trim() == '' || value.length < 4){
                alert('Vui lòng không để trống và lớn hơn 4 ký tự !');
            }else{
                $.ajaxSetup({
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }
               });
               $.ajax({
                   url: ("{{ route('web.change.name') }}"),
                   method: "POST",
                   data: {
                       value: value,
                   },
                   success: function(data) {
                        $('#name_us').html(value);
                   }
               })
            }
        })
    })
</script>
{{--  --}}
<script>
    $(document).ready(function(){
        $('#bem').on('click',function(){
            let id_showtime = $('.select_day_a').val();
            if(id_showtime){
                window.location = 'book/'+id_showtime;
            }else{
                alert('Chon !');
            }
        })
        $('.select_film_a').on('change',function(){
            var id = $(this).val();
               $.ajaxSetup({
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }
               });
               $.ajax({
                   url: ("{{ route('web.aj.select.f') }}"),
                   method: "POST",
                   data: {
                       id: id,
                   },
                   success: function(data) {
                        $('.select_cinema_a').html(data);
                        $('#bem').css('background' , '#ccc');
                   }
               })
        })
        $('.select_cinema_a').on('change',function(){
                var id = $(this).val();
               $.ajaxSetup({
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }
               });
               $.ajax({
                   url: ("{{ route('web.aj.select.c') }}"),
                   method: "POST",
                   data: {
                       id: id,
                   },
                   success: function(data) {
                        $('.select_day_a').html(data);
                        $('#bem').css('background' , 'green');
                   }
               })
        })
    })
</script>
<script>
    $(document).ready(function(){
        $('.btn-click-slide').on('click' , function(){
            let id = $(this).data('id');
            // alert(id)
            $('.btn-click-slide').show();
            $('.s-i-g').show();
            $('.h-i-f ').hide();
            $(this).hide();
            $('.showImgSli_'+id).hide();
            $('.showVido_'+id).show();
        })
        $('.film_img').on('mouseover', function(){
            let id = $(this).data('id');
            $('.i-f-h').hide(100);
            $('.i-f-l').hide(100);
            $('.film_img').show();
            $('.frame_'+id).show();
            $('.film_img_'+id).hide();
            $('.links_'+id).show(100);
        });
        $('.film_img').on('dbclick', function(e){
            e.preventDefault();
            let id = $(this).data('id');
            alert(12121)
        });
    })
</script>
<script>
    $(document).ready(function(){
        $('#date_change').on('change', function(e){
            window.location = '?date='+e.target.value;
        });
        $('#select_city').on('change', function(e){
            window.location =  "/getCityAddress/"+ e.target.value;
        })
    })
</script>

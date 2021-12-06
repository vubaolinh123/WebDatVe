<footer style="text-align: center;
background: black;
color: white;
padding: 20px 0;">
    Bản quyền thuộc team Link Mèo@@@
</footer>
<script>
    $(document).ready(function(){
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

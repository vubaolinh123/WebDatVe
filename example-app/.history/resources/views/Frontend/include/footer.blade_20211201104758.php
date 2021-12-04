<footer style="text-align: center;
background: black;
color: white;
padding: 20px 0;">
    Bản quyền thuộc team Link Mèo@@@
</footer>
<script>
    $(document).ready(function(){
        $('.film_img').on('mouseover', function(){
            let id = $(this).data('id');
            // alert(id);
            // $(".frame_"+id)[0].src += "&autoplay=1";
            $('.frame_'+id).show();
            $('.film_img_'+id).hide();
        });
        $('.film_img').on('mouseleave', function(){
            let id = $(this).data('id');

            $('.frame_'+id).hide();
            $('.film_img_'+id).show();
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

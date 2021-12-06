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

            $('.frame_'+id).show(100);
            $('.film_img_'+id).hide(100);
        });
        $('.film_img').on('mouseleave', function(){
            let id = $(this).data('id');

            $('.frame_'+id).hide(100);
            $('.film_img_'+id).show(100);
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

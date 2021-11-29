<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <!-- Required vendors -->

   <script src=" {{ asset('backend/vendor/global/global.min.js') }}"></script>
   <script src="{{ asset('backend/js/quixnav-init.js') }}"></script>
   <script src="{{ asset('backend/js/custom.min.js') }}"></script>

   <!-- Vectormap -->
   <script src="{{ asset('backend/vendor/raphael/raphael.min.js') }}"></script>
   <script src="{{ asset('backend/vendor/morris/morris.min.js') }}"></script>


   <script src="{{ asset('backend/vendor/circle-progress/circle-progress.min.js') }}"></script>
   <script src="{{ asset('backend/vendor/chart.js/Chart.bundle.min.js') }}"></script>

   <script src="{{ asset('backend/vendor/gaugeJS/dist/gauge.min.js') }}"></script>

   <!--  flot-chart js -->
   <script src="{{ asset('backend/vendor/flot/jquery.flot.js') }}"></script>
   <script src="{{ asset('backend/vendor/flot/jquery.flot.resize.js') }}"></script>

   <!-- Owl Carousel -->
   <script src="{{ asset('backend/vendor/owl-carousel/js/owl.carousel.min.js') }}"></script>

   <!-- Counter Up -->
   <script src="{{ asset('backend/vendor/jqvmap/js/jquery.vmap.min.js') }}"></script>
   <script src="{{ asset('backend/vendor/jqvmap/js/jquery.vmap.usa.js') }}"></script>
   <script src="{{ asset('backend/vendor/jquery.counterup/jquery.counterup.min.js') }}"></script>
   <script src="{{ asset('backend/js/dashboard/dashboard-1.js') }}"></script>

   <!-- Daterangepicker -->
   <!-- momment js is must -->
   <script src="{{ asset('backend/vendor/moment/moment.min.js') }}"></script>
   <script src="{{ asset('backend/vendor/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

   <!-- clockpicker -->
   <script src="{{ asset('backend/vendor/clockpicker/js/bootstrap-clockpicker.min.js') }}"></script>

   <!-- asColorPicker -->
   <script src="{{ asset('backend/vendor/jquery-asColor/jquery-asColor.min.js') }}"></script>
   <script src="{{ asset('backend/vendor/jquery-asGradient/jquery-asGradient.min.js') }}"></script>
   <script src="{{ asset('backend/vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js') }}"></script>

   <!-- Material color picker -->
   <script
      src="{{ asset('backend/vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}">
   </script>

   <!-- pickdate -->
   <script src="{{ asset('backend/vendor/pickadate/picker.js') }}"></script>
   <script src="{{ asset('backend/vendor/pickadate/picker.time.js') }}"></script>
   <script src="{{ asset('backend/vendor/pickadate/picker.date.js') }}"></script>

   <!-- Daterangepicker -->
   <script src="{{ asset('backend/js/plugins-init/bs-daterange-picker-init.js') }}"></script>

   <!-- Clockpicker init -->
   <script src="{{ asset('backend/js/plugins-init/clock-picker-init.js') }}"></script>

   <!-- asColorPicker init -->
   <script src="{{ asset('backend/js/plugins-init/jquery-asColorPicker.init.js') }}"></script>

   <!-- Material color picker init -->
   <script src="{{ asset('backend/js/plugins-init/material-date-picker-init.js') }}"></script>

   <!-- Pickdate -->
   <script src="{{ asset('backend/js/plugins-init/pickadate-init.js') }}"></script>

   <!-- Summernote -->
   <script src="{{ asset('backend/vendor/summernote/js/summernote.min.js') }}"></script>
   <!-- Summernote init -->
   <script src="{{ asset('backend/js/plugins-init/summernote-init.js') }}"></script>

   <script src="{{ asset('backend/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
   @yield('javascrip.backend')



   <script>
    function onChangeImg(_this){
        let data = _this.files[0];
        if(data){
            let render = new FileReader();
            render.onload = function(){
                $('#showImg').show();
                $('#showImg').attr('src',this.result);
            };
            render.readAsDataURL(data);
        }
    }
    function onChangeImg_2(_this){
        let id = _this.dataset.id;
        let data = _this.files[0];
        if(data){
            let render = new FileReader();
            render.onload = function(){
                $('.showImg_2_'+id).attr('src',this.result);
            };
            render.readAsDataURL(data);
        }
    }
    </script>


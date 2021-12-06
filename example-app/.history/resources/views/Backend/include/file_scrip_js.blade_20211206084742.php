   <!-- Required vendors -->

   <script src=" {{ asset('backend/vendor/global/global.min.js') }}"></script>
   <script src="{{ asset('backend/js/quixnav-init.js') }}"></script>
   <script src="{{ asset('backend/js/custom.min.js') }}"></script>

   <script src="{{ asset('backend/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
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
    {{--  --}}
    <script>
        $(document).ready(function(){

        })
    </script>
    {{--  --}}

   <script>
       $(document).ready(function() {
           $('#search').on('click', function() {
               let data = $('.input-sr').val();
               if (data.trim() == '') {
                   alert('Không để trống');
               } else {
                   window.location = "{{ route('admin.manage.user') }}" + "?sr=" + data;
               }
           })

           $('.input-sr').keyup(function(e) {
               if (e.keyCode == 13) {
                   let data = $(this).val();
                   if (data.trim() == '') {
                       alert('Không để trống');
                   } else {
                       window.location = "{{ route('admin.manage.user') }}" + "?sr=" + data;
                   }
               }
           })
           $('#backSr').on('click', function() {
               window.location = "{{ route('admin.manage.user') }}";
           })
           $('.checkBox').on('change', function() {
               let data = $(this).val();
               let role = $(this).data('role');
               //
               $.ajaxSetup({
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }
               });
               $.ajax({
                   url: ("{{ route('admin.change.role') }}"),
                   method: "POST",
                   data: {
                       data: data,
                       role: role
                   },
                   success: function(data) {
                       if (data == 1) {
                           alert('Bạn không thể sửa chính mình !');
                           window.location.reload();
                       } else if (data == -1) {
                           alert('Bạn không có quyền để thêm quyền admin')
                       }
                   }
               })
               //
           })
       })
   </script>
   {{-- Receipt --}}

   <script>
       $(document).ready(function() {
           $('#tableData').DataTable();
       });
   </script>
   <script>
       $(document).ready(function() {

           $(document).on('change', '.receipt_success', function() {
               let id = $(this).data('id');
               let value = $(this).val();

               $.ajaxSetup({
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }
               });
               $.ajax({
                   url: ("{{ route('admin.receipt.change_pay') }}"),
                   method: "POST",
                   data: {
                       value: value,
                       id: id
                   },
                   success: function(data) {
                       window.location.reload();
                   }
               })
           });
       });
   </script>
   <script>
       $(document).ready(function() {

           $(document).on('click', '.asasas', function() {
               alert(1212121);
               var id = $(this).data('id');
               let content_pass = $('#textarea_pass').val():
                   const value = 3;
               //    $.ajaxSetup({
               //        headers: {
               //            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               //        }
               //    });
               //    $.ajax({
               //        url: ("{{ route('admin.receipt.change_pay') }}"),
               //        method: "POST",
               //        data: {
               //            id: id,
               //            value: value,
               //            content_pass: content_pass
               //        },
               //        success: function(data) {
               //            window.location.reload();
               //        }
               //    })
           });
           $('#reset_receipt').on('click', function() {
               let id = $(this).data('id');
               const value = 0;
               $.ajaxSetup({
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }
               });
               $.ajax({
                   url: ("{{ route('admin.receipt.change_pay') }}"),
                   method: "POST",
                   data: {
                       id: id,
                       value: value
                   },
                   success: function(data) {
                       window.location.reload();
                   }
               })
           })

       })
   </script>
   <script>
       $(document).ready(function() {

           $(document).on('change', '.receipt_success', function() {
               let id = $(this).data('id');
               let value = $(this).val();

               $.ajaxSetup({
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }
               });
               $.ajax({
                   url: ("{{ route('admin.receipt.change_pay') }}"),
                   method: "POST",
                   data: {
                       value: value,
                       id: id
                   },
                   success: function(data) {
                       window.location.reload();
                   }
               })
           });
           $('input[name="checkBox"]').on('change', function() {
               var value = $("input[type='checkbox']").val();
               var showtimes = (function() {
                   var a = [];
                   $(".checkD:checked").each(function() {
                       a.push(this.value);
                   });
                   return a;
               })();

               $.ajaxSetup({
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }
               });
               $.ajax({
                   url: ("{{ route('admin.receipt.render') }}"),
                   method: "POST",
                   data: {
                       showtimes: showtimes
                   },
                   success: function(data) {
                       $('#render-list').html(data);
                   }
               })
           })

           function fectList() {
               $.ajaxSetup({
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }
               });
               $.ajax({
                   url: ("{{ route('admin.receipt.render') }}"),
                   method: "POST",
                   success: function(data) {
                       $('#render-list').html(data);
                   }
               })
           };
           fectList();

           $('#sr-li-re').on('input', function() {
               let data = $(this).val();
               console.log(data);
               $.ajaxSetup({
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }
               });
               $.ajax({
                   url: ("{{ route('admin.receipt.render') }}"),
                   method: "POST",
                   data: {
                       data: data
                   },
                   success: function(data) {
                       $('#render-list').html(data);
                   }
               })
           })

           $('.now').on('click', function() {
               let type = $(this).data('type');
               $('.now').css({
                   'background': ''
               });
               $(this).css({
                   'background': 'red'
               });
               $.ajaxSetup({
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }
               });
               $.ajax({
                   url: ("{{ route('admin.receipt.render') }}"),
                   method: "POST",
                   data: {
                       type: type
                   },
                   success: function(data) {
                       $('#render-list').html(data);
                   }
               })
           })


       })
   </script>
   {{-- Chair --}}
   <script>
       $(document).ready(function() {
           $('.changeChair').on('change', function() {
               let type = $(this).data('type');
               let size = $(this).data('size');
               let id = $(this).data('id');

               let value = $(this).val();
               $.ajaxSetup({
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }
               });
               $.ajax({
                   url: ("{{ route('admin.chair.create_chair_vip') }}"),
                   method: "POST",
                   data: {
                       type: type,
                       value: value,
                       size: size,
                       id: id
                   },
                   success: function(data) {
                       if (data == 0) {
                           alert('Hiện tại cột kết thúc và cột bắt đầu đang chên lệnh nhau !');
                       }
                   }
               })
           })
       })
   </script>

   <script>
       function onChangeImg(_this) {
           let data = _this.files[0];
           if (data) {
               let render = new FileReader();
               render.onload = function() {
                   $('#showImg').show();
                   $('#showImg').attr('src', this.result);
               };
               render.readAsDataURL(data);
           }
       }

       function onChangeImg_2(_this) {
           let id = _this.dataset.id;
           let data = _this.files[0];
           if (data) {
               let render = new FileReader();
               render.onload = function() {
                   $('.showImg_2_' + id).attr('src', this.result);
               };
               render.readAsDataURL(data);
           }
       }
   </script>

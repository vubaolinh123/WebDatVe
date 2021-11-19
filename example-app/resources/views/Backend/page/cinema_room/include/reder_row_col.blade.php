 <div class="rating-group">
     @php
         $num = 1;
         $value = 1;
     @endphp

     @foreach ($rows as $stt => $row)
         {{-- data-text="{{ $num++ }}" --}}
         <label aria-label="{{ $row->id_row }} star" class="rating__label  " for="rating-{{ $row->id_row }}">
             <span class="btn btn-square btn-outline-primary rating__icon rating__icon--star ">
                 {{ $row->name_row }}
             </span>
         </label>
         @if ($quantity_col)
             <div class="rating-group_col">
                 @for ($i = 1; $i <= $quantity_col; $i++)
                     <span class="btn  mr-3  ">{{ $i }}</span>
                 @endfor
             </div>
         @endif

         <input class="rating__input quantity_row" name="quantity_row" id="rating-{{ $row->id_row }}"
             value="{{ $value++ }}" type="radio">

     @endforeach


 </div>

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Showtime extends Model
{
    use HasFactory;
    protected $table = "tbl_showtime";
    protected $primaryKey = "id_showtime";
    public $fillable = [
        'start_time',
        'time_ends',
        'show_date',
        'film_id',
        'cinema_room_id',
    ];
    public function cinema_room(){
        return $this->belongsTo(CinemaRoom::class,'cinema_room_id')->where('show_date',Carbon::now());
    }
}

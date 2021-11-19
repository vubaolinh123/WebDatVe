<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cinemaroom extends Model
{
    use HasFactory;
    protected $table = "tbl_cinema_room";
    protected $primaryKey = "id_cinema_room";
    public $fillable = [
        'quantity_row',
        'quantity_col',
        'cinema_id'
    ];
    public function cinema(){
        return $this->belongsTo(Cinema::class,'cinema_id');
    }
    public function showTime(){
        return $this->hasMany(ShowTime::class);
    }
}

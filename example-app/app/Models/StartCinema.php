<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StartCinema extends Model
{
    use HasFactory;

    protected $table = "tbl_start_cinema";
    protected $primaryKey = "id";
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function cinema(){
        return $this -> belongsTo(Cinema::class , 'cinema_id');
    }
}

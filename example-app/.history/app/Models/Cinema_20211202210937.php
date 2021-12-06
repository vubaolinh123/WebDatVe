<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    use HasFactory;

    protected $table = "tbl_cinema";
    protected $primaryKey = "id";
    protected $guarded = [];
    public function cluster_cinema(){
        return $this -> belongsTo(ClusterCinema::class,'cluster_cinema_id');
    }
    public function cinema_room(){
        return $this -> hasMany(Cinemaroom::class , 'cinema_id');
    }
}

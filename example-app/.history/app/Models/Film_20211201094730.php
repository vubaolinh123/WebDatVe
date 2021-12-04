<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Film extends Model
{
    use HasFactory;
    protected $table = "tbl_film";
    protected $primaryKey = "id_film";
    public $fillable = [
        'name',
        'avatar',
        'file',
        'time',
        'age_limit',
        'premiere_date',
        'language',
        'cast',
        'nation',
        'producer',
        'summary',
        'status',  // 0 hiện  ,1 ẩn
        'deleted', // 0 đang chiếu  , 1 sắp chiếu
        'film_type_id',
    ];
    public function showtime(){
        return $this->hasMany(Showtime::class,'film_id');
    }
    public function showtimeNow(){
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        return $this->hasMany(Showtime::class,'film_id')->where('show_date','>=' , $now -> toDateString() );
    }
}

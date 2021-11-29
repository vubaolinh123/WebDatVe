<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;


    protected $table = "tbl_receipt";
    protected $primaryKey = "id";
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class , 'user_id');
    }
    public function showtime(){
        return $this->belongsTo(Showtime::class , 'showtime_id');
    }
    public function receipt_food(){
        return $this->hasMany(Receipt_Food::class , 'receipt_id', 'id_receipt');
    }
    public function receipt_detail(){
        return $this->hasMany(Receipt_Detail::class , 'receipt_id' , 'id_receipt');
    }
}

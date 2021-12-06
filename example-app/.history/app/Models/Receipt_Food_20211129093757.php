<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt_Food extends Model
{
    use HasFactory;

    protected $table = "tbl_receipt_food";
    protected $primaryKey = "id";
    protected $guarded = [];

    public function food(){
        return $this->belongsTo(Foods::class , 'food_id');
    }
}

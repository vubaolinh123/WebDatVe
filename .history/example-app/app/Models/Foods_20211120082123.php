<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foods extends Model
{
    use HasFactory;

    protected $table = "tbl_food";
    protected $primaryKey = "id_food";
    protected $guarded = [];

    public function size_food(){
        return $this->belongsTo(SizeFoods::class,'size_food_id');
    }
    public function type_food(){
        return $this->belongsTo(TypeFoods::class,'type_food_id');
    }
}

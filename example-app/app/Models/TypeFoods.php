<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeFoods extends Model
{
    use HasFactory;

    protected $table = "tbl_type_food";
    protected $primaryKey = "id_type_food";
    protected $guarded = [];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SizeFoods extends Model
{
    use HasFactory;

    protected $table = "tbl_size_food";
    protected $primaryKey = "id_price_ticket";
    protected $guarded = [];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chair extends Model
{
    use HasFactory;
    protected $table = "tbl_chair";
    protected $primaryKey = "id_chair";
    public $fillable = [
        'row_position',
        'col_position',
        'selected',
        'cinema_room_id',

    ];
}
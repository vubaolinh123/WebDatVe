<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeChair extends Model
{
    use HasFactory;
    protected $table = "tbl_type_chair";
    protected $primaryKey = "id_type_chair ";
    public $fillable = [
        'name_chair',
        'price_chair',
    ];
}
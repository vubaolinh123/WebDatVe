<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colcr extends Model
{
    use HasFactory;
    protected $table = "tbl_col";
    protected $primaryKey = "id_col";
    public $fillable = ['name_col'];
    public $timestamps = false;
}
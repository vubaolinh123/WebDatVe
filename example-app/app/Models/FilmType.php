<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmType extends Model
{
    use HasFactory;
    protected $table = "tbl_film_type";
    protected $primaryKey = "id_film_type";
    public $fillable = ['name'];
}
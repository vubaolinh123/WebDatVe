<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'status',
        'deleted',
        'film_type_id',
    ];
}
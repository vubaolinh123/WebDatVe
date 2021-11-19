<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rowcr extends Model
{
    use HasFactory;
    protected $table = "tbl_row";
    protected $primaryKey = "id_row";
    public $fillable = ['name_row', 'col_id'];
    public $timestamps = false;
}
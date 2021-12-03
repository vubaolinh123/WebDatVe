<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table = "tbl_news";
    protected $primaryKey = "id_news";
    public $fillable = ['content', 'title', 'image'];
    protected $guarded = [];
    // public $timestamps = true;
}
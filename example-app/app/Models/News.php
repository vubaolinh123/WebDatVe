<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table = "tbl_news";
    protected $primaryKey = "id_news";
    public $fillable = ['content_news', 'title_news', 'image_news'];
    protected $guarded = [];
    // public $timestamps = true;
}
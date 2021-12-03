<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type_Blog extends Model
{
    use HasFactory;
    protected $table = "tbl_type_blog";
    protected $primaryKey = "id_type_blog";
    public $fillable = ['name', 'active'];
    protected $guarded = [];
    // public $timestamps = true;
    public function blogss()
    {
        return $this->hasMany(Blog::class, 'typeblog_id', 'id_type_blog');
    }
}
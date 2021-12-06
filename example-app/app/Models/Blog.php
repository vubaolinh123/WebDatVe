<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = "tbl_blog";
    protected $primaryKey = "id_blog";
    public $fillable = [
        'title_blog',
        'mainimg_blog',
        'view_blog',
        'conten_blog',
        'typeblog_id',
    ];
    protected $guarded = [];
    public $timestamps = true;

    public function type_blogs()
    {
        return $this->hasOne(Type_Blog::class, 'id_type_blog', 'typeblog_id');
    }
}
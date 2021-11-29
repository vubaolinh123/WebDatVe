<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;


    protected $table = "tbl_receipt";
    protected $primaryKey = "id";
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class , 'user_id');
    }
}

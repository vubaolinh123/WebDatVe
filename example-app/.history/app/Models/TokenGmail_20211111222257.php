<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TokenGmail extends Model
{
    use HasFactory;

    protected $table = 'token_gmail';
    protected $fillable = ['user_id' , 'activation_code','id_register'];
    public $timestamps = false;
}

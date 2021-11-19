<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $table = "tbl_price_ticket";
    protected $primaryKey = "id_price_ticket";
    protected $guarded = [];
}

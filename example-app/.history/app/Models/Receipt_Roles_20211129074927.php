<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt_Roles extends Model
{
    use HasFactory;

    protected $table = "tbl_receipt_roles";
    protected $primaryKey = "id";
    protected $guarded = [];
}

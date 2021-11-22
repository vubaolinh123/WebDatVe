<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt_Detail extends Model
{
    use HasFactory;


    protected $table = "tbl_receipt_details";
    protected $primaryKey = "id_receipt_detail";
    protected $guarded = [];
}

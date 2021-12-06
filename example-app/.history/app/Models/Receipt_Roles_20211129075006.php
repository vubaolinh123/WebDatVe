<?php

namespace App\Models;

use App\Http\Controllers\Receipt;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt_Roles extends Model
{
    use HasFactory;

    protected $table = "tbl_receipt_roles";
    protected $primaryKey = "id";
    protected $guarded = [];

    public function receipt(){
        return $this -> belongsTo(Receipt::class , 'receipt_id')
    }
}

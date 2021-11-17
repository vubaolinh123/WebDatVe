<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClusterCinema extends Model
{
    use HasFactory;

    protected $table = "tbl_cluster_cinema";
    protected $primaryKey = "id";
    protected $guarded = [];
}

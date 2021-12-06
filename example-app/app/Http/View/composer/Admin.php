<?php

namespace App\Http\View\Composer;

use App\Http\Controllers\ClusterCinema;
use App\Models\Cinema;
use App\Models\ClusterCinema as ModelsClusterCinema;
use App\Models\Film;
use App\Models\Receipt;
use Illuminate\View\View;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class Admin
{
    protected $film ;
    public function __construct(Film $film){
        $this -> film = $film ;
    }

    public function compose( View $view)
    {
    //    dd(1);
        $receipt = Receipt::where('user_view_success' , 0) -> paginate(5); 
        return $view -> with([ 'receiptComposer' => $receipt]);
    }
}

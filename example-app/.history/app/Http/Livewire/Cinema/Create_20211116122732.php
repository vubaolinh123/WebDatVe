<?php

namespace App\Http\Livewire\Cinema;

use App\Models\Cinema;
use App\Models\ClusterCinema;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Create extends Component
{
    public $city_id;

    public function get_cinema_districts(){
        dd($this->city_id);
    }
    public function render()
    {
        $citys = json_decode(Http::get('https://provinces.open-api.vn/api/'));
        $districts = json_decode(Http::get('https://provinces.open-api.vn/api/d/'));
        $cinemas = Cinema::orderBy('id', 'desc') -> paginate(5);
        $cluster_cinemas = ClusterCinema::orderBy('id', 'desc') -> paginate(5);
        return view('livewire.cinema.create',[
            'citys' => $citys,
            'districts' => $districts,
            'cluster_cinemas' => $cluster_cinemas,
            'cinemas' => $cinemas
        ]);
    }
}

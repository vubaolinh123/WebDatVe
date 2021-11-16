<?php

namespace App\Http\Livewire\Cinema;

use App\Models\Cinema;
use App\Models\ClusterCinema;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Update extends Component
{
    public $id_cinema ;
    public $flag;
    public function mount($id)
    {
        $this -> id_cinema  = $id;
    }
    public function render()
    {
        $cinema = Cinema::find($this -> id_cinema );
        $citys = json_decode(Http::get('https://provinces.open-api.vn/api/'));
        $districts = json_decode(Http::get('https://provinces.open-api.vn/api/d/'));
        $districtArrGet = [];
        $clusterCinemaArrGet = [];
        foreach ($districts as $key =>  $district){
            if($this -> id_cinema == $district->province_code){
                $districtArrGet[$key] = $district;
            }
        }
        $cluster_cinemas = ClusterCinema::all();
        foreach($cluster_cinemas  as $cluster_cinema){
            if($this -> id_cinema == $cluster_cinema->city_id){
                $clusterCinemaArrGet[$key] = $cluster_cinema;
            }
        }


        return view('livewire.cinema.update',[
            'cinema' => $cinema,
            'citys' => $citys,
            'districtsD' => $districtArrGet,
            'cluster_cinemas' => $clusterCinemaArrGet,

        ]);
    }
}

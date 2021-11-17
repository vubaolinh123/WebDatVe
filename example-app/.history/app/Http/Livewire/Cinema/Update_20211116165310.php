<?php

namespace App\Http\Livewire\Cinema;

use App\Models\Cinema;
use App\Models\ClusterCinema;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Update extends Component
{
    public $id_cinema ;
    public function mount($id)
    {
        $this -> id_cinema  = $id;
    }
    public function render()
    {

        $citys = json_decode(Http::get('https://provinces.open-api.vn/api/'));
        $districts = json_decode(Http::get('https://provinces.open-api.vn/api/d/'));
        $arr = [];
        $axx = [];
        foreach ($districts as $key =>  $district){
            if($this -> id_cinema == $district->province_code){
                $arr[$key] = $district;
            }
        }
        $cluster_cinemas = ClusterCinema::orderBy('id', 'desc') -> paginate(5);
        foreach($cluster_cinemas  as $cluster_cinema){
            if($this -> id_cinema == $cluster_cinema->city_id){
                $axx[$key] = $cluster_cinema;
            }
        }

        $cinema = Cinema::find($this -> id_cinema );
        return view('livewire.cinema.update',['cinema' => $cinema]);
    }
}

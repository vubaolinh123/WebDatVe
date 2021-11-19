<?php

namespace App\Http\Livewire\Cinema;

use App\Models\Cinema;
use App\Models\ClusterCinema;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Create extends Component
{
    public $city_id;
    public $ddd;
    public $cluster_cinema_id;
    public $dis = false ;
    public function mount($city_id){
        $this-> city_id = $city_id;
    }
    public function updatingClusterCinemaId($value){
        if(!is_numeric($value)){
            $this -> cluster_cinema_id = null ;
        }
    }
    public function get_cinema_districts($id){

    }
    public function updated(){

    }
    public function creating(){
        // dump($this->city_id);
    }
    public function render()
    {
        $citys = json_decode(Http::get('https://provinces.open-api.vn/api/'));
        $districts = json_decode(Http::get('https://provinces.open-api.vn/api/d/'));
        $arr = [];
        $axx = [];
        foreach ($districts as $key =>  $district){
            if($this -> city_id == $district->province_code){
                $arr[$key] = $district;
            }
        }
        $cluster_cinemas = ClusterCinema::orderBy('id', 'desc') -> paginate(5);
        foreach($cluster_cinemas  as $cluster_cinema){
            if($this -> city_id == $cluster_cinema->city_id){
                $axx[$key] = $cluster_cinema;
            }
        }
        $cinemas = Cinema::orderBy('id', 'desc') -> paginate(5);
        return view('livewire.cinema.create',[
            'citys' => $citys,
            'districtsD' => $arr,
            'cluster_cinemas' => $axx,
            'cinemas' => $cinemas
        ]);
    }
}

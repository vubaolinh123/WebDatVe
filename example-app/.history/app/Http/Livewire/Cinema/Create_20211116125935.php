<?php

namespace App\Http\Livewire\Cinema;

use App\Models\Cinema;
use App\Models\ClusterCinema;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Create extends Component
{
    public $city_id;
    public $dis = false ;
    public $districtsD = [];
    public function get_cinema_districts(){
        $this -> dis = true ;
    }
    public function updated(){
        $districts = json_decode(Http::get('https://provinces.open-api.vn/api/d/'));

        foreach ($districts as $key =>  $district){
            if($this -> city_id == $district->province_code){

                $this -> districtsD[$key] = $district;
            }
        }

        dump( $this -> districtsD );
    }
    public function render()
    {
        $citys = json_decode(Http::get('https://provinces.open-api.vn/api/'));
        // $districts = json_decode(Http::get('https://provinces.open-api.vn/api/d/'));
        // $arr = [];
        // if($this -> dis) {
        //     foreach ($districts as $district){
        //         if($this -> city_id == $district->province_code){
        //             array_push($arr , $district);
        //         }
        //     }
        // }
        $cinemas = Cinema::orderBy('id', 'desc') -> paginate(5);
        $cluster_cinemas = ClusterCinema::orderBy('id', 'desc') -> paginate(5);
        return view('livewire.cinema.create',[
            'citys' => $citys,
            // 'districts' => $arr,
            'cluster_cinemas' => $cluster_cinemas,
            'cinemas' => $cinemas
        ]);
    }
}

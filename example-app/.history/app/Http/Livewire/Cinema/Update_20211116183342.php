<?php

namespace App\Http\Livewire\Cinema;

use App\Models\Cinema;
use App\Models\ClusterCinema;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $city_id;
    public $name;
    public $phone;
    public $email;
    public $time_open;
    public $time_close;
    public $image;
    public $address;
    public $detail;
    public $cluster_cinema_id;
    public $district_id;
    public $dis = false ;
    public $id_cinema ;
    public $flag;
    public function mount($id)
    {
        $this -> id_cinema  = $id;
    }


    public $rules = [
        'name' => 'required',
        'phone' => 'required|regex:/(0)[0-9]{10}/',
        'email' => 'required|email',
        'time_open' => 'required',
        'time_close' => 'required',
        'image' => 'required|image',
        'address' => 'required',
        'detail' => 'required',
        'cluster_cinema_id' => 'required|not_in:0',
        'district_id' => 'required|not_in:0',
    ];
    public function create_cinema(){
        $this -> validate();
        $name_img = $this -> image -> store('images','public');
        Cinema::create(
            [
                'name' => $this -> name ,
                'phone' => $this -> phone ,
                'email' => $this -> email ,
                'cinema_open' =>  $this -> time_open ,
                'cinema_close' =>  $this -> time_close ,
                'image' => $name_img,
                'address' => $this -> address ,
                'detail' =>  $this -> detail ,
                'cluster_cinema_id' => $this -> cluster_cinema_id ,
                'district_id' =>  $this -> district_id ,
            ]
        );
        return redirect('/admin/cinema');
    }

    public function get_cinema_districts($id){

    }
    public function updated(){
        if($this -> city_id && $this -> cluster_cinema_id && $this -> district_id
            && $this -> city_id  > 0  && $this -> cluster_cinema_id > 0  && $this -> district_id > 0
        ){
            $this -> flag = true;
        }else{
            $this -> flag = false;
        }
        $this -> validate();
    }


    public function render()
    {
        $cinema = Cinema::find($this -> id_cinema );
        $this -> city_id = $cinema->cluster_cinema->city_id;
        $citys = json_decode(Http::get('https://provinces.open-api.vn/api/'));
        $districts = json_decode(Http::get('https://provinces.open-api.vn/api/d/'));
        $districtArrGet = [];
        $clusterCinemaArrGet = [];
        foreach ($districts as $key =>  $district){
            if($this -> city_id == $district->province_code){
                $districtArrGet[$key] = $district;
            }
        }
        $cluster_cinemas = ClusterCinema::all();
        foreach($cluster_cinemas  as $cluster_cinema){
            if($this -> city_id == $cluster_cinema->city_id){
                $clusterCinemaArrGet[$key] = $cluster_cinema;
            }
        }
        $this -> cluster_cinema_id =  $cinema->cluster_cinema->id ;
        $this -> district_id =  $cinema-> district_id ;
        return view('livewire.cinema.update',[
            'cinema' => $cinema,
            'citys' => $citys,
            'districtsD' => $districtArrGet,
            'cluster_cinemas' => $clusterCinemaArrGet,

        ]);
    }
}

<?php

namespace App\Http\Livewire\Cinema;

use App\Models\Cinema;
use App\Models\ClusterCinema;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
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
    public $flag = false;
    public $dis = false ;
    public function mount($city_id){
        $this-> city_id = $city_id;
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
        $name_img = uniqid() . '.'. $this -> image -> getClientOriginalExtension();
        $this->image -> move(public_path('image' , $name_img ));
        Cinema::create(
            [
                'name' => $this -> name ,
                'phone' => $this -> phone ,
                'email' => $this -> email ,
                'time_open' =>  $this -> time_open ,
                'time_close' =>  $this -> time_close ,
                'image' => $name_img,
                'address' => $this -> address ,
                'detail' =>  $this -> detail ,
                'cluster_cinema_id' => $this -> cluster_cinema_id ,
                'district_id' =>  $this -> district_id ,
            ]
        );
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

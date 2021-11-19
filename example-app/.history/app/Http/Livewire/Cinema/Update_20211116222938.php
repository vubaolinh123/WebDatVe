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
    public $count = 0;
    public $email;
    public $imageOld;
    public $cinema_open;
    public $cinema_close;
    public $image;
    public $address;
    public $detail;
    public $cluster_cinema_id;
    public $district_id;
    public $id_cinema ;
    public $dis = false ;
    public $flag = true ;

    public function mount($id)
    {
        $this -> id_cinema  = $id;
    }

    public $rules = [
        'name' => 'required',
        'phone' => 'required|regex:/(0)[0-9]{10}/',
        'email' => 'required|email',
        'cinema_open' => 'required',
        'cinema_close' => 'required',
        'address' => 'required',
        'detail' => 'required',
        'cluster_cinema_id' => 'required|not_in:0',
        'district_id' => 'required|not_in:0',
    ];

    public function update_cinema(){
        $this -> validate();
        if($this -> image){
            $name_img = $this -> image -> store('images','public');
        }else{
            $name_img = $this -> imageOld;
        }
        Cinema::find($this -> id_cinema)
                ->update(
                    [
                        'name' => $this -> name ,
                        'phone' => $this -> phone ,
                        'email' => $this -> email ,
                        'cinema_open' =>  $this -> cinema_open ,
                        'cinema_close' =>  $this -> cinema_close ,
                        'image' => $name_img,
                        'address' => $this -> address ,
                        'detail' =>  $this -> detail ,
                        'cluster_cinema_id' => $this -> cluster_cinema_id ,
                        'district_id' =>  $this -> district_id ,
                    ]
                );

        return redirect('/admin/cinema');
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
        $this -> count ++ ;
        if($this -> count == 1){
            $this -> name = $cinema->name;
            $this -> phone = $cinema->phone;
            $this -> email = $cinema->email;
            $this -> imageOld = $cinema->image;
            $this -> address = $cinema->address;
            $this -> cinema_open = $cinema->cinema_open;
            $this -> cinema_close = $cinema->cinema_close;
            $this -> detail = $cinema->detail;
            $this -> city_id = $cinema->cluster_cinema->city_id;
            $this -> cluster_cinema_id =  $cinema->cluster_cinema->id ;
            // dd($this -> cluster_cinema_id);
            $this -> district_id =  $cinema-> district_id ;
        }


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
        dump($this -> city_id);
        foreach($cluster_cinemas  as $key => $cluster_cinema){
            if($this -> city_id == $cluster_cinema->city_id){
                $clusterCinemaArrGet[$key] = $cluster_cinema;
            }
        }
        dump($clusterCinemaArrGet);
        return view('livewire.cinema.update',[
            'cinema' => $cinema,
            'citys' => $citys,
            'districtsD' => $districtArrGet,
            'cluster_cinemas' => $clusterCinemaArrGet,
        ]);
    }
}

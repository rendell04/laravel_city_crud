<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;

class CityController extends Controller
{
     //show all city
    public function index(){
        $cities = City::all();

        return $cities;
    }

    //show all city
    public function city($id){
        $city= City::findOrFail($id);
        return $city;
    }

    //create a city
    public function create(Request $req){
        $city = new City;

        $city->name = $req->input('name');
        $city->region = $req->input('region');
        $city->save();

        return $city;
    }
}

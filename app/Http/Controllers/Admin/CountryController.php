<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\CountryRequest;
use App\Models\Country;

class CountryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function getCountry(){
        $data = Country::all();
        return view('admin.user.country.list_country', compact('data'));
    }

    function addCountry(){
        return view('admin.user.country.add_country');
    }

    function store(CountryRequest $req){
        $data = $req -> all();
        if(Country::create($data)){
            return redirect('/admin/country/list');
        }else{
            echo 'Error';
        }
    }

    function delete($id){
        Country::where('id',$id) -> delete();
        return redirect('/admin/country/list');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class FishController extends BaseController
{
    //use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function GetAll(){
        $fishList = DB::table('fish')->get();
        return $fishList;
    }

    public static function GetByName($name){
        $fish = DB::table('fish')->where("Name", "=", $name)->get();
        return $fish;
    }
    
}

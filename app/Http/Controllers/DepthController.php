<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class DepthController extends BaseController
{
    //use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function UnderValue($value){
        $fishList = DB::table('fish')->where('Minimum_depth', '<', $value)->get();
        return $fishList;
    }

    public static function OverValue($value){
        $fishList = DB::table('fish')->where('Maximal_depth', '>', $value)->get();
        return $fishList;
    }
    public static function BetweenValues($min, $max){
        $fishList = DB::table('fish')->where('Minimum_depth', '<', $min)->where('Maximal_depth', '>', $max)->get();
        return $fishList;
    }

    public static function AddNewFish($name, $vernacular_name, $min_depth, $max_depth){
        $result = DB::table('fish')->insert([
            'Name' => $name,
            'Vernacular_name' => $vernacular_name,
            'Minimal_depth' => $min_depth,
            'Maximal_depth' => $max_depth,
        ]);

    }

    
}

<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function show(){
        return Item::all();
    }
    public function fill(){
        $allitems=[
            ["icon"=>0,"points"=>0,"money"=>500,"currency"=>1,"cost"=>0],
            ["icon"=>1,"points"=>50,"money"=>0,"currency"=>0,"cost"=>100],    
            ["icon"=>2,"points"=>30,"money"=>0,"currency"=>0,"cost"=>50],    
            ["icon"=>3,"points"=>80,"money"=>0,"currency"=>0,"cost"=>150],    
            ["icon"=>4,"points"=>100,"money"=>0,"currency"=>0,"cost"=>200]    
        ];
        //dd($allitems);
        for ($i=0; $i < 5; $i++) { 
            $item = new Item();
            $item->icon=$allitems[$i]["icon"];
            $item->points=$allitems[$i]["points"];
            $item->money=$allitems[$i]["money"];
            $item->currency=$allitems[$i]["currency"];
            $item->cost=$allitems[$i]["cost"];
            $item->save();
        }
        return Item::all();   
    }
}

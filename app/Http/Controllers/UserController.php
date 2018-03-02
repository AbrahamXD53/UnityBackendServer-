<?php

namespace App\Http\Controllers;

use App\User;
use App\Purchase;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
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
        date_default_timezone_set("America/Los_Angeles");
        return response()->json(["data"=>User::where("id",">",0)->orderBy("id")->get(),"time"=>date("h:i:sa")]);
    }
    public function showUser($id){
        $user=User::find($id);
        $user->purchases=Purchase::where("user_id",$id)->get();
        return  $user;
    }
    public function update(Request $request,$id){
        $user= User::find($id);
        if($user){
            $user->icon=$request->input("icon");
            $user->save();
            $user->purchases=Purchase::where("user_id",$id)->get();
            return $user;
        }else{
            return "error";
        }
    }
    public function store(Request $request){
        $user = new User();
        $user->username=$request->input('username');
        $user->score=$request->input('score');
        $user->money=$request->input('money');
        $user->icon=$request->input('icon');
        $user->save();
        return $user;   
    }
    public function buy(Request $request,$id){
        $item= Item::find($request->input('item'));
        $user=User::find($id);
        if($user && $item)
        {
            if($user->money>=$item->cost){
                $purchase = new Purchase();
                $purchase->user_id=$id;
                $purchase->item_id = $item->id;
                $purchase->save();
                $user->money=$user->money-$item->cost;
                $user->score=$user->score+$item->points;
                $user->money=$user->money+$item->money;
                $user->save();
                $user->purchases=Purchase::where("user_id",$id)->get();
                return $user;
            }
            else
                abort(403);
        }
        else
            abort(404);
    }
    
}

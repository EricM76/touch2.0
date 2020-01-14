<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function Siguiendo($id)
    {
        $usuario = User::find(Auth::user()->id);
        $registro = User::find($id);
        $siguiendoArray = explode(",",$usuario->siguiendo);
       if (in_array($registro->id,$siguiendoArray)) {
            return redirect()->back();
       }else{
        if ($usuario->siguiendo == null) {
            //  $collection = $registro->id;
            //  $usuario -> siguiendo = $collection;
            $usuario -> siguiendo = $registro->id;
            // dd($usuario->siguiendo);
        }else {
            // $collection = collect($usuario->siguiendo);

            // if ($collection->count() == 1) {
            //    $collection[0] = (int)$collection[0];
            // }

            // $collection->push($registro->id);
            // $usuario -> siguiendo = $collection;
            $siguiendo = $usuario->siguiendo;
            $siguiendo = $siguiendo.','.$registro->id;
            $usuario -> siguiendo = $siguiendo;
        }
        // $usuario->siguiendo = $siguiendo;
        $usuario -> save();
        return redirect()->back();
       }


    }
}

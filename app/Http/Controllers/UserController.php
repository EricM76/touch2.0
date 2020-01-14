<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function Siguiendo($id)
    {
        $usuario = User::find(Auth::user()->id); //busco al usuario activo
        $siguiendoArray = explode(",",$usuario->siguiendo); //hago un array de los que está siguiendo
        $registro = User::find($id); //busco al usuario que quiere seguir
        $seguidoresArray = explode(",",$registro->seguidores);
        $seguidores = $registro->seguidores;


       if (in_array($registro->id,$siguiendoArray))
        { //si ya lo está siguiendo sale de la función
            return redirect()->back();
        }
        else
        {
            if ($usuario->siguiendo == null)
            { //si es el primer usuario que sigue, lo registra

                $usuario -> siguiendo = $registro->id;
                $usuario -> save(); //salvo los cambios en el BD
            }
                else
                { //de lo contrario continua con el registro

                    $siguiendo = $usuario->siguiendo; //guardo en una variable temporal los id que los que sigue
                    $siguiendo = $siguiendo.','.$registro->id; // añado el id del nuevo usuario a seguir
                    $usuario -> siguiendo = $siguiendo; //guardo todos los id a seguir
                    $usuario -> save(); //salvo los cambios en el BD
                }

        }
            if ($seguidores == null)
            {
                // dd('no hay seguidores');
                $registro -> seguidores = $usuario->id;
                $registro -> save();

            }
                else
                {
                    $seguidores = $seguidores.",".$usuario->id;
                    $registro -> seguidores = $seguidores;
                    $registro -> save();
                }
            return redirect()->back();
        }
    public function Seguidores()
    {

    }
}

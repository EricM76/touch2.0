<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Publication;
use Carbon\Carbon;
use App\User;




class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $publico = Publication::where('alcance','publico')->orderBy('created_at','desc')->paginate(3);
        $amigos = Publication::where('alcance','amigos')->orderBy('created_at','desc')->paginate(3);
        $solo = Publication::where('alcance','solo')->orderBy('created_at','desc')->paginate(3);
        $siguiendoReg = Auth::user()->siguiendo;
        $siguiendo = explode(",",$siguiendoReg);
        $seguidoresReg = Auth::user()->seguidores;
        $seguidores = explode(",",$seguidoresReg);
        // dd($siguiendo);
        $usuarios = User::all();
        return view('home',compact('publico','siguiendo','usuarios','seguidores','amigos','solo'));
    }

    public function foto(Request $datos)
    {
        $usuario = User::find($datos->id);
        $ruta = $datos -> file('foto') -> store('public/images/users');
        $image = basename($ruta);
        $usuario -> foto = $image;
        $usuario -> save();
        return redirect()->back();
}

}

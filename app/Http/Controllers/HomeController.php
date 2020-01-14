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

        $publicado = Publication::orderBy('created_at','desc')->paginate(3);
        return view('home',compact('publicado'));
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

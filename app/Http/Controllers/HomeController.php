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
        $dif = Carbon::now()->diffForHumans(Carbon::now()->subYear());
        $publica = Publication::find(8);
        $ahora = Carbon::now();

        $publicado = Publication::all();
        return view('home',compact('publicado','ahora','dif'));
    }

  
    public function foto(Request $img)
    {

        $rules = [
            "foto" => 'required',
        ];

        $this->validate($img,$rules);

        if ($img -> file('foto') == null) {
            return redirect()->back();
        }
        $usuario = User::find($img['id']);

        $ruta = $img -> file('foto') -> store('public/images/fotos');
        $img = basename($ruta);

        $usuario -> foto = $img;

        $usuario -> save();
        $publicado = Publication::all();
        return redirect('/home');
    }
}

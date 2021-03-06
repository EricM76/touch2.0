<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publication;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;

class PublicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function publica(Request $datos){

         $rules = [
             "titulo" => 'required',
             "comentarios" => 'required',
         ];

         $this->validate($datos,$rules);
         $user = Auth::user();
         $publicacion = new Publication();
         if ($datos['alcance'] == null) {
             $datos['alcance'] = 'publico';
         }
         $publicacion -> titulo = $datos['titulo'];
         $publicacion -> publicacion = $datos['comentarios'];
         $publicacion -> alcance = $datos['alcance'];
         $publicacion -> user_id = $user->id;
         if ($datos->file('imagen')!=null) {
            $ruta = $datos -> file('imagen') -> store('public/images/publication');
            $image = basename($ruta);
            $publicacion -> imagen = $image;
         }else{
             $publicacion -> imagen = null;
         }

         $publicacion -> save();

        //  $publicado = Publication::all();
         // return view('/home',compact('publicado'));
         return redirect('/home');
     }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $registro = Publication::find($id);
        $registro -> delete();
        return redirect('/home');
    }

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicaFotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publica_fotos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publica_fotos');
    }






    

    public function foto(Request $datos){
        $rules = [
            "foto" => 'required',
            "publica" => 'required',
        ];

        $this->validate($datos,$rules);
        $user = Auth::user();
        $publicacion = new Publication();

        $publicacion -> titulo = $datos['foto'];
        $publicacion -> publicacion = $datos['publica'];
        $publicacion -> user_id = $user->id;
        $publicacion -> save();

        $publicado = Publication::all();
        // return view('/home',compact('publicado'));
        return redirect('/home');
    }




}

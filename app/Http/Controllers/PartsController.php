<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Medic;
use App\History;
use App\Part;
use App\User;
use App\Study;

class PartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)

    {


        $usuario = Auth::user();
        if(!Auth::user()){
            return redirect('/home');
        }
        if(!$usuario->history->parts){
            return redirect('/home');
        }


        $diagnostico = $usuario->history->parts;   //todos los partes de la historai del paciente
        $profesional = []; // guardo los id del parte para hacer el builder wherein y sacar q medico hizo que parte

        foreach($diagnostico as $parte){
            $id = $parte->medic_id;

            $medico =  Medic::where('id' ,$id)->first();

            array_push($profesional, $medico );
        }


       return compact('diagnostico', 'profesional');



    }
    public function verEstudio(Request $request){
        $estudio = Study::where('part_id' , $request->id)->get();

        return $estudio;
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
    public function store(Request $request)
    {
        //
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
        //
    }
}

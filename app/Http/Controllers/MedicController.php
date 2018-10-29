<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Study;
use App\Part;
use App\User;
use App\History;
use Carbon\Carbon;

class MedicController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:medic');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('medic.components.contenido');
    }
        public function quienSoy(Request $request){
            // if(!$request->ajax()){
            // return redirect()->back();
            // }

            $medico =Auth::user();
            $estudios = Study::where('medic_id', $medico->id)->get();
            $partes = $medico->parts;
            $pacientes = $medico->users;
            return compact('medico', 'estudios');
    }
    public function listarPacientes(Request $request){
            // if(!$request->ajax()){
            //     return redirect()->back();
            // }
            $criterio = $request->criterio;
            $buscar = $request->buscar;
            $medico = Auth::user();
            $pacientes = $medico->users()->orderBy('id','desc')->paginate(4);

            if($buscar ==''){
                $pacientes = $medico->users()->orderBy('id','desc')->paginate(4);
            }
            else{
                $pacientes = $medico->users()->where($criterio, 'LIKE' , $buscar . '%')->paginate(4);
            }
            return[
                'pagination'=>[
                        'total' => $pacientes->total(),
                        'current_page' => $pacientes->currentPage(),
                        'per_page' => $pacientes->perPage(),
                        'last_page' => $pacientes->lastPage(),
                        'from' => $pacientes->firstItem(),
                        'to' => $pacientes->lastItem(),
                    ],
                'pacientes' => $pacientes,

            ];

        }
        public function historiaPaciente(Request $request){
            $medico = Auth::user();
            $paciente = $medico->users->where('id', $request->id)->first();
            $parte =  $paciente->history->parts->pluck('id');
            $partes = $paciente->history->parts;
            $estudios = Study::whereIn('part_id',$parte)->get();
            $historia = $paciente->history->where('user_id', $request->id)->first();

            // $partes = $paciente->history->parts;

            return compact('paciente', 'estudios', 'partes', 'historia');
        }
        public function storePart(Request $request){
            $parte = new Part();
            $medico = Auth::user();
            $parte->medic_id = $medico->id;
            $parte->history_id = $request->history;
            $parte->motivo = $request->motivo;
            $parte->sintomas = $request->sintomas;
            $parte->enfermedad_actual = $request->enfermedad_actual;
            $parte->diagnostico = $request->diagnostico;
            $parte->tratamiento = $request->tratamiento;
            $parte->estudio_solicitado = $request->estudio_solicitado;
            if($request->estudio_solicitado == ''){
                $parte->solicito_estudios = 'NO';
            }else{
                $parte->solicito_estudios = 'SI';
            }
            $parte->lugar_atencion  = $request->lugar_atencion;
            $parte->save();
            return 'ok';


        }
        public function misDiagnosticos(){
            $medico = Auth::user();
            $partes =  $medico->parts;
            $paciente = [];
            $estudios = [];
            foreach($partes as $usuario){
                $user = User::where('id', $usuario->history_id)->first();
                $estudio = Study::where('part_id', $usuario->id)->first();
                // if($estudio){
                    array_push($estudios, $estudio);
                // }
                array_push($paciente, $user);


            }

            // $lala = $medico->users()->with('history')->get();
            // $lala = $medico->users()->with('history')->where('user_id', 2)->get();


            return compact('paciente','partes','medico','estudios');
        }

        public function storeCabecera(Request $request){
            $historia = History::find($request->id);
            $historia->tatuajes = $request->tatuajes;
            $historia->diabetes = $request->diabetes;
            $historia->cardiopatias = $request->cardiopatias;
            $historia->tabaquismo = $request->tabaquismo;
            $historia->alcoholismo = $request->alcoholismo;
            $historia->updated_at = Carbon::now()->timezone('America/Argentina/Buenos_Aires');
            $historia->save();
            return 'anda';
        }






 //  es una boludes pero en algun momento no voya saber que quise poner
            // inicializa el contador estan asociados, y recorre el array $pacientes para ver si estan asociados
            //si estan asociados nunca entra en el if request id pacientes en i codigo
            //si estan asociados es 0 entonces lo carga al paciente,
            //hasta ahora con carrio funciono.

        public function asociarPaciente(Request $request){
            $medico = Auth::user();
            $user = User::where('codigo', $request->id)->get();
            $pacientes = $medico->users()->get();
            $estanasociados = 0;
            for($i = 0 ; $i < count($pacientes); $i++){
                if($request->id == $pacientes[$i]->codigo){
                   $estanasociados++;
                }
            }
            if($estanasociados == 0){
                $medico->users()->attach($user);
            }
            return $user;
        }







}

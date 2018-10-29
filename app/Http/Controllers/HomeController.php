<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medic;
use Auth;
use App\User;
use LaravelQRCode\Facades\QRCode;
use Illuminate\Support\Facades\Hash;
use App\Part;
use App\Study;


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
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $usuario = Auth::user();
        $file = public_path('patient/img/usersQrCodes/qr'.$usuario->id.'.png');

        $text = $usuario->codigo;

        QRCode::text($text)->setOutfile($file)->png();

        $usuario->ruta_codigo = 'patient/img/usersQrCodes/qr'.$usuario->id.'.png';

        $usuario->save();

        return view('patient.components.contenido');
    }
    public function quienSoy(Request $request){
        if(!$request->ajax()){
         return redirect()->back();
        }
        $usuario = Auth::user();
        if(!$usuario->medics){
            $medicos = '';
        }else{
            $medicos = count($usuario->medics);
        }
        if(!$usuario->history){
            $partes = '';

        }else{
            $partes = count($usuario->history->parts);
        }
        return compact('usuario',',medicos','partes');
    }

    public function listarMedicos(Request $request){
        if(!$request->ajax()){
            return redirect()->back();
        }
        $criterio = $request->criterio;
        $buscar = $request->buscar;

        $user = Auth::user();
        if($buscar ==''){
            $medicos = $user->medics()->orderBy('id','desc')->paginate(4);
        }
        else{
            $medicos = $user->medics()->where($criterio, 'LIKE' , $buscar . '%')->paginate(4);
        }
        return[
            'pagination'=>[
                    'total' => $medicos->total(),
                    'current_page' => $medicos->currentPage(),
                    'per_page' => $medicos->perPage(),
                    'last_page' => $medicos->lastPage(),
                    'from' => $medicos->firstItem(),
                    'to' => $medicos->lastItem(),
                ],
            'medicos' => $medicos,
            'usuario' => $user
        ];
    }

    public function eliminarMedico(Request $request){
        if(!$request->ajax()){
            return null;
        }
        $user = Auth::User();

        $user->medics()->detach($request->id);
        $user->save();
        return 'safe';

    }
    public function todosLosMedicos(Request $request){
        $criterio = $request->criterio;
        $buscar = $request->buscar;

        if($buscar ==''){
            $medicos = Medic::orderBy('id','desc')->paginate(6);
        }
        else{
            $medicos = Medic::where($criterio, 'LIKE' , $buscar . '%')->paginate(6);
        }

        return[
            'pagination'=>[
                    'total' => $medicos->total(),
                    'current_page' => $medicos->currentPage(),
                    'per_page' => $medicos->perPage(),
                    'last_page' => $medicos->lastPage(),
                    'from' => $medicos->firstItem(),
                    'to' => $medicos->lastItem(),
                ],
            'medicos' => $medicos,

        ];

    }

    public function agregarPaciente(Request $request){
        $paciente = Auth::User();
        $paciente->medics()->sync([1,2,3,4,5,6,7,8,9]);
        $paciente->save();


       return redirect('/home');

    }
    public function verHistoria(){
        $history =  Auth::user()->history;
        return $history->parts;
    }
    public function verPartesConEstudios(){
        $historia = Auth::user()->history;
        $partes = Part::where('history_id', $historia->id)->where('solicito_estudios', '=', 'SI')->get();
        $estudios = [];
        foreach($partes as $parte){
            $estudio = Study::where('part_id', '=',  $parte->id )->first();
            array_push($estudios, $estudio);
       }

        return compact('estudios', 'partes');
    }

}

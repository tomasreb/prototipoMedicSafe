<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return view('welcome');
});
// Route::get('/qrcode', 'QrController@make');
Route::get('/selectlogin','PageController@showLoginIntentForms')->name('selectlogin');

Auth::routes();
//rutas paciente

Route::get('/home', 'HomeController@index')->name('home');
Route::get('home/mismedicos', 'HomeController@listarMedicos');
Route::post('home/eliminarMedico', 'HomeController@eliminarMedico');
Route::get('home/holapaciente', 'HomeController@agregarPaciente');
Route::get('home/verhistoria', 'HomeController@verHistoria');
Route::get('home/quien', 'HomeController@quienSoy');
Route::get('home/diagnosticos', 'PartsController@index');
Route::post('home/estudios', 'PartsController@verEstudio');
Route::get('home/todoslosmedicos', 'HomeController@todosLosMedicos');
Route::get('home/verpartesconestudios', 'HomeController@verPartesConEstudios');

// end rutas paciente


//rutas medico

Route::prefix('medic')->group(function(){
    Route::get('/login', 'Auth\MedicLoginController@showLoginForm')->name('medic.login');
    Route::post('/login', 'Auth\MedicLoginController@login')->name('medic.login.submit');
    Route::get('/', 'MedicController@index')->name('medic.dashboard');
    Route::post('/logout','Auth\MedicLoginController@logout')->name('medic.logout');
    Route::get('/quiensoy','MedicController@quienSoy');
    Route::get('/listarpacientes','MedicController@listarPacientes');
    Route::post('/historiapaciente','MedicController@historiaPaciente');
    Route::post('/cargarparte','MedicController@storePart');
    Route::get('/misdiagnosticos','MedicController@misDiagnosticos');
    Route::post('/guardarcabecera','MedicController@storeCabecera');
    Route::post('/paciente', 'MedicController@asociarPaciente');



});

//end rutas medico


//rutas centro de salud


Route::prefix('center')->group(function(){
    Route::get('/login', 'Auth\CenterLoginController@showLoginForm')->name('center.login');
    Route::post('/login', 'Auth\CenterLoginController@login')->name('center.login.submit');
    Route::get('/', 'CenterController@index')->name('center.dashboard');
    Route::post('/logout','Auth\CenterLoginController@logout')->name('center.logout');
});

//end rutas centro de salud


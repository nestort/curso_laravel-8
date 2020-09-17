<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\UserController;
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
Route::get('/',function(){
    return 'Home';
});

//Route::get('/prueba','PruebaController@index')->name('prueba.index');
  Route::get('/prueba', [PruebaController::class, 'index']);

//Route::get('/usuarios','UserController@index')->name('usuario.index');
  Route::get('/usuarios', [UserController::class, 'index']);
//Definición de una ruta que muestra el detalle de un usuario
Route::get('/usuarios/{id}',function($id){
    return "Detalle del usuario: <u>{$id} </u>";
})->where('id','[0-9]+');

//Definición de ruta paa crear usuario nuevo
Route::get('/usuarios/nuevo',function(){
    return "Usuario nuevo";
});


//Saludos con doble parametro y el último es opcional
Route::get('/saludo/{name}/{nickname?}',function($name, $nickname=null){
    if($nickname == null ){
        return "Hola {$name}";
    }else{
        return "Hola {$name} o prefieres {$nickname}";
    }
});

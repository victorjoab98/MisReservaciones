<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Rutas aociadas a specialty
Route::get('/specialties', 'SpecialtyController@index');
Route::get('/specialties/create', 'SpecialtyController@create');//solo muestra el formulario de registro
Route::get('/specialties/{specialty}/edit', 'SpecialtyController@edit');
Route::post('/specialties', 'SpecialtyController@store');//se envia el form de registro y se guarda en la bd
Route::put('/specialties/{specialty}', 'SpecialtyController@update');
Route::delete('/specialties/{specialty}', 'SpecialtyController@destroy');


//doctor
//laravel generara las multiples rutas para gestionar los datos de una entidad (mostrar, editar, eliminar, crear)
Route::resource('doctors', 'DoctorController');
//1er parametro es la entidad como uno desea que se muestre, por ejemplo arriba era specialties, aqui se usara doctor
//pero puede ser cualquier otro nombre o palabra y 2do Controlador


//Patients
Route::resource('patients', 'PatientController');

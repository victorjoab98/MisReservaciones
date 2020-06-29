<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Specialty;
class SpecialtyController extends Controller
{
  //Todas las rutas que este controlador resuelve exigen que haya un usuario logeado
  public function __construct(){
    $this->middleware('auth');
  }

    public function index(){
      $specialties = Specialty::all();//recibo todas las Especialidades
      return view('specialties.index', compact('specialties'));//y se envian por compact
    }

    public function create(){
      return view('specialties.create');
    }

//creo que esl parametro request que llega es la info del formulario en forma de JSON
    public function store(Request $request){
      //dd($request->all());   //aaqui se muesta la info del formulario
    $specialty = new Specialty();
    $specialty->name = $request->input('name');
    $specialty->description = $request->input('description');
    $specialty->save();//insert

    return redirect('/specialties');
  }
}

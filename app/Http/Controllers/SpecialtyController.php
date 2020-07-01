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

  private function rulesValidation(Request $request){
    $rules = ['name' => 'required|min:3'];
    $messages = [
      'name.required'=> 'Debe ingresar un nombre a la Especialidad',
      'name.min' => 'La Especialidad debe tener 3 caracteres como minimo',
    ];
    $this->validate($request, $rules);//primer parametro que se va a evaluar y segundo con que reglas se evaluara, hay un tercer opcional con $messages
  }
//creo que esl parametro request que llega es la info del formulario en forma de JSON
  public function store(Request $request){
    //dd($request->all());   //aaqui se muesta la info del formulario

    $this->rulesValidation($request);//realizar las validaciones
    $specialty = new Specialty();
    $specialty->name = $request->input('name');
    $specialty->description = $request->input('description');
    $specialty->save();//insert

    $notification = 'La Especialidad se ha guardado correctamente';
    return redirect('/specialties')->with(compact('notification'));
  }

  public function edit(Specialty $specialty){

    return view('specialties.edit', compact('specialty'));
  }
  public function update(Request $request, Specialty $specialty){
    $this->rulesValidation($request);//realizar las validaciones

    $specialty->name = $request->input('name');
    $specialty->description = $request->input('description');
    $specialty->save();//update

    $notification = 'La Especialidad se ha editado correctamente';
    return redirect('/specialties')->with(compact('notification'));
  }

  public function destroy(Specialty $specialty){
    $specialty->delete();
    $notification = 'La Eliminado '.$specialty->name .' se ha eliminado correctamente';
    return redirect('/specialties')->with(compact('notification'));
  }


}

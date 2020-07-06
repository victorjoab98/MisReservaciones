<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
class PatientController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      /*esta hubiera sido la forma mas facil de mostrar solo los
      pacientes, pero si luego hay que aplicar mas filtros es mejor
      crear un scope desde User
      $patients = User::where('role', 'patient')->get();*/


      $patients = User::patients()->paginate(5);//sabiendo que los pacientes pueden ser cientos, se mostrara por paginas de 5
      return view('patients.index', compact('patients'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      //
      return view('patients.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $rules = [
      'name' => 'required|min:3',
      'email' =>'required|email',
      'dpi' => 'digits:8',
      'address' => 'nullable|min:5',
      'phone' => 'nullable|min:6'
    ];
    $this->validate($request, $rules);

    //se usa el metodo create aunque se pudo hacer como se hizo con Specialty
    User::create($request->only('name', 'email', 'dpi', 'address', 'phone')
    +[ 'role' => 'patient',
        'password'=>bcrypt($request->input('password')/*la Contraseña se envia por aqui pues debe primero encriptarse*/
        )]);
        //de este modo le pido a request que me de solo los campos que le pido, es mas seguro
    //esto se llama Mass Assigment pero se necesita definir desde el modelo que campos pueden recibir un valor desde  Mass Asigment


    $notification = 'El paciente se ha registrado correctamente';
    return redirect('/patients')->with(compact('notification'));
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
  public function edit(User $patient)
  {
      return view('patients.edit', compact('patient'));
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
    $rules = [
      'name' => 'required|min:3',
      'email' =>'required|email',
      'dpi' => 'digits:8',
      'address' => 'nullable|min:5',
      'phone' => 'nullable|min:6'
    ];
    $this->validate($request, $rules);

    $patient = User::patients()->findOrFail($id);

    $data = $request->only('name', 'email', 'dpi', 'address', 'phone');
    $password = $request->input('password');
    if($password){
      $data['password'] = bcrypt($password);
    }

    $patient->fill($data);
    $patient->save();
    $notification = 'La informacion del paciente se ha editado correctamente';
    return redirect('/patients')->with(compact('notification'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(User $patient)
  {
      $patient->delete();
      $notification = "El paciente $patient->name se ha eliminado correctamente";
      return redirect('/patients')->with(compact('notification'));
  }

}

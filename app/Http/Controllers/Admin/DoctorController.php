<?php
/*
Este controlador fue creado con el comando: php artisan make:controller DoctorController --resource
de esa forma el controlador trae metodos principales creados
*/
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;


class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      /*esta hubiera sido la forma mas facil de mostrar solo los
      doctores, pero si luego hay que aplicar mas filtros es mejor
      crear un scope desde User
      $doctors = User::where('role', 'doctor')->get();*/

        $doctors = User::doctors()->get();
        return view('doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('doctors.create');
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
      +[ 'role' => 'doctor',
          'password'=>bcrypt($request->input('password')/*la Contraseña se envia por aqui pues debe primero encriptarse*/
          )]);
          //de este modo le pido a request que me de solo los campos que le pido, es mas seguro
      //esto se llama Mass Assigment pero se necesita definir desde el modelo que campos pueden recibir un valor desde  Mass Asigment


      $notification = 'El medico se ha registrado correctamente';
      return redirect('/doctors')->with(compact('notification'));
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
        $doctor = User::doctors()->findOrFail($id);
        return view('doctors.edit', compact('doctor'));
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
        'dpi' => 'nullable|digits:8',
        'address' => 'nullable|min:5',
        'phone' => 'nullable|min:6'
      ];
      $this->validate($request, $rules);

      $doctor = User::doctors()->findOrFail($id);

      $data = $request->only('name', 'email', 'dpi', 'address', 'phone');
      $password = $request->input('password');
      if($password){
        $data['password'] = bcrypt($password);
      }

      $doctor->fill($data);
      $doctor->save();
      $notification = 'El medico se ha editado correctamente';
      return redirect('/doctors')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $doctor)
    {
        $doctorName = $doctor->name;
        $doctor->delete();

        $notification = "El medico $doctorName se ha eliminado correctamente";
        return redirect('/doctors')->with(compact('notification'));
    }
}

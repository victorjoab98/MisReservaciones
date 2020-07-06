<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\WorkDay;

class ScheduleController extends Controller
{
    public function edit(){
      $days = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'];
      return view('schedule', compact('days'));
    }

    public function store(Request $request){

      //como la info vienen en arreglos
      $active = $request->input('active') ?: [];//si no viene ni siquiera uno, suplantar por un arreglo vacio
      $morning_start = $request->input('morning_start');
      $morning_end = $request->input('morning_end');
      $afternoon_start = $request->input('afternoon_start');
      $afternoon_end = $request->input('afternoon_end');

      //se creara un nuevo objeto  en la tabla WorkDay por cada dia, osea 7 dias
      for($i=0; $i<7; $i++){
        WorkDay::updateOrCreate(
          [
            //el primer arreglo es para los valores que se veran si existen, se actualizan y si no, se crean
            'day'=> $i,
            'user_id'=>auth()->id()],
          [
            //el segundo array es para los valores que se van a cambiar
            'active'=> in_array($i, $active),
            'morning_start'=> $morning_start[$i],
            'morning_end'=>  $morning_end[$i],
            'afternoon_start'=>$afternoon_start[$i] ,
            'afternoon_end'=> $afternoon_end[$i],
          ]);
      }

      return back();
    }

}

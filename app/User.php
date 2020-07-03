<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     //campos que se podran asignar a traves del metodo create
    protected $fillable = [
        'name', 'email', 'password','dpi', 'address', 'phone', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    //Scope para que la vista patients solo muestro los Usuarios pacientes
    //es vital que el scope se defina como 'scopeEntidad' y se llame como ->entidad()
    public function scopePatients($query){
      return $query->where('role', 'patient');
    }

    //Scope para que la vista doctors solo muestro los Usuarios doctores
    public function scopeDoctors($query){
      return $query->where('role', 'doctor');
    }
}

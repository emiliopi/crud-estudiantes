<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory, Uuids;

    protected $fillable = [
        'name', 'lastname','email','age','phone','address', 'father', 'mother'
    ];

    public function scopeSearch($query,$search){
        return $query->where('name','like','%'.$search.'%')
                    ->orWhere('lastname','like','%'.$search.'%')
                    ->orWhere('email','like','%'.$search.'%')
                    ->orWhere('age','like','%'.$search.'%')
                    ->orWhere('phone','like','%'.$search.'%')
                    ->orWhere('address','like','%'.$search.'%')
                    ->orWhere('father','like','%'.$search.'%')
                    ->orWhere('mother','like','%'.$search.'%');
    }

    public function cont_roles()
    {
        return $this->hasMany('App\Models\UserRol','id_rol','id_rol')->count();
    }

    public function actions(){
        $acciones = '<div class="dropdown">
                        <span class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu"></span>
                                <div class="dropdown-menu dropdown-menu-right" id="items">';

        // verificamos que tenga el permiso de editar 
        if (auth()->user()->rol->edit == 1) {
            $acciones .= '<a class="dropdown-item" href="/student/edit/'.$this->id.'">
                            <i class="bx bx-edit-alt mr-1" ></i>Editar
                        </a>';
        }

        if (auth()->user()->rol->edit == 1) {
            $acciones .= '<a class="dropdown-item" href="/student/assigment/'.$this->id.'">
                            <i class="bx bx-task mr-1" ></i>Materias
                        </a>';
        }

        // verificamos que tenga el permisos de eliminar
        if (auth()->user()->rol->delete == 1) {
            // con esta condicion verificamos si tiene submenu asignados

            if (!$this->cont_roles()) {
                // si no seteamos el boton de eliminar
                $acciones .= '<a class="dropdown-item" href="#" id="4" data-id="'.$this->id.'">
                                <i class="bx bx-trash mr-1"></i>Eliminar
                            </a>';
            }
        }

        $acciones .= ' </div>
                    </div>';

        return $acciones;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    protected $fillable = [
        'nombre',
        'paterno',
        'materno',
        'clave_elector',
        'distrito',
        'seccion',
        'calle',
        'cruzamiento',
        'no_ext',
        'no_int',
        'colonia',
        'cp',
        'fe_nacimiento',
        'celular',
        'email',
        'folio',
        'employee_image',
        'employee_ine',
        'employee_boleta',
        'status'
    ];


    public function Employee_Enterprise()
    {
        return $this->belongsToMany(Employee::class, 'enterprise_employee', 'employee_id', 'employee_id');
    }
}

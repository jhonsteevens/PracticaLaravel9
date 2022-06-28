<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $guarded = []; 
    use HasFactory;
    public function cargoEmpleado(){
        return $this->belongsTo(Cargo::class, 'idCargo');
    }
}
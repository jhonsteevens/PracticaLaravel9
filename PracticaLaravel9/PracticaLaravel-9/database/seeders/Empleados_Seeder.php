<?php

namespace Database\Seeders;

use App\Models\Empleado;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Empleados_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cargo = DB::table('cargos')->where(['nombre'=>'Instructor'])->value('id');

        Empleado::create([
            'nombre'=> 'Dony Cardenas',
            'email' => 'cardenasdonny@gmail.com',
            'direccion' => 'calle 123456',
            'edad' => 36,
            'idCargo' => $cargo
        ]);

        Empleado::create([
            'nombre'=> 'Jorge',
            'email' => 'jorge@gmail.com',
            'direccion' => 'calle 123',
            'edad' => 63,
            'idCargo' => 2
        ]);

        Empleado::create([
            'nombre'=> 'Samuel',
            'email' => 'samuel@gmail.com',
            'direccion' => 'calle 556611',
            'edad' => 54,
            'idCargo' => 1
        ]);
        Empleado::create([
            'nombre'=> 'Arelys',
            'email' => 'arelis@gmail.com',
            'direccion' => 'calle 443311',
            'edad' => 28,
            'idCargo' => 3
        ]);

        Empleado::factory()->times(50)->create();

    }
}
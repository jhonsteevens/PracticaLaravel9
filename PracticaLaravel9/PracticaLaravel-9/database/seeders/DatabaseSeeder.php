<?php

namespace Database\Seeders;

use App\Models\Cargo;
use App\Models\Empleado;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\Cargos_Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivar las llaves foraneas
        Cargo::truncate(); // Elimina todos los registros de la tabla
        Empleado::truncate(); // Elimina todos los registros de la tabla empleado
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Activa la verificación de llaves foraneas
        $this->call(Cargos_Seeder::class); // Llama al seeder de cargos
        $this->call(Empleados_Seeder::class); // Llama al seeder de empleados
    }
}
<?php

use App\Entities\Cliente;
use App\Entities\Producto;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        //$this->call(ProveedorSeeder::class);
        //$this->call(ProductoSeeder::class);
        //$this->call(ClienteSeeder::class);
    }
}

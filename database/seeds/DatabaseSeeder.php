<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(EscuelaTableSeeder::class);
         $this->call(DocentesTableSeeder::class);
         // $this->call(GruposTableSeeder::class);
         // $this->call(AsignaturasTableSeeder::class);

        // $this->call(AlumnosTableSeeder::class);
        // $this->call(DocentesTableSeeder::class);
    }
}

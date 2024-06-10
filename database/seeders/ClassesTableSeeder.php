<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classes')->insert([
            ['classe' => 'Professor'],
            ['classe' => 'Aluno'],
            ['classe' => 'Administrador'],
        ]);
    }
}

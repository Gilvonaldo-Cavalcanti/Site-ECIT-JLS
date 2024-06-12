<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nome' => 'Administrador',
            'email' => 'admin@localhost.com',
            'senha' => password_hash('admin123', PASSWORD_DEFAULT),
            'classe_id' => 3,
        ]);
    }
}

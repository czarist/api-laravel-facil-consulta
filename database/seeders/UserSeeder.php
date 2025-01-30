<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name'     => 'admin',
                'password' => Hash::make('admin123'),
            ]
        );

        $this->command->info('Usuário padrão criado');
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Entities\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'cpf' => '1234567444-00',
            'name' => 'João Mangueira',
            'phone' => '321654898',
            'birth' => '1987-06-05',
            'gender' => 'M',
            'email' => 'joao2@joao.com',
            'password' => env("PASSWORD_HASH") ? bcrypt('123456') : '123456'
        ]);
        //$this->call(UsersTableSeeder::class);
    }
}

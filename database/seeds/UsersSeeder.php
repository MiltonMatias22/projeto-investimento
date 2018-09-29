<?php

use Illuminate\Database\Seeder;
use App\Entities\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //people data
        User::create([
            'cpf'        => '021456789', 
            'name'       => 'Tamara Matias', 
            'phone'      => '023456789', 
            'barth'      => '1991-10-29',
            'sex'        => 'F',
            'notes'      => 'Write something here',
            'email'      => 'tamara@gmail.com',
            'password'   => env('PASSWORD_HASH') ? bcrypt('123') : '123',
        ]);

    }
}

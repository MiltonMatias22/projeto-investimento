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
            'cpf'        => '89226437330', 
            'name'       => 'Milton Matias', 
            'phone'      => '91982664365', 
            'barth'      => '1988-07-09',
            'sex'        => 'M',
            'notes'      => 'Write something here',
            'email'      => 'milton@gmail.com',
            'password'   => env('PASSWORD_HASH') ? bcrypt('123') : '123',
        ]);
        User::create([
            'cpf'        => '89226437331', 
            'name'       => 'Tania Matias', 
            'phone'      => '91982664365', 
            'barth'      => '1988-07-09',
            'sex'        => 'F',
            'notes'      => 'Write something here',
            'email'      => 'tania@gmail.com',
            'password'   => env('PASSWORD_HASH') ? bcrypt('1234') : '1234',
        ]);
        User::create([
            'cpf'        => '89226437332', 
            'name'       => 'Tamara Matias', 
            'phone'      => '91982664365', 
            'barth'      => '1988-07-09',
            'sex'        => 'F',
            'notes'      => 'Write something here',
            'email'      => 'tamara@gmail.com',
            'password'   => env('PASSWORD_HASH') ? bcrypt('12345') : '12345',
        ]);
        User::create([
            'cpf'        => '89226437333', 
            'name'       => 'Martinho Matias', 
            'phone'      => '91982664365', 
            'barth'      => '1988-07-09',
            'sex'        => 'M',
            'notes'      => 'Write something here',
            'email'      => 'martinho@gmail.com',
            'password'   => env('PASSWORD_HASH') ? bcrypt('123456') : '123456',
        ]);

    }
}

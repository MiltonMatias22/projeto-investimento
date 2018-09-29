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
            'cpf'        => '123456789', 
            'name'       => 'Milton Matias', 
            'phone'      => '123456789', 
            'barth'      => '1988-07-09',
            'sex'        => 'M',
            'notes'      => 'Write something here',
            'email'      => 'milton@gmail.com',
            'password'   => bcrypt('1234'),
        ]);

    }
}

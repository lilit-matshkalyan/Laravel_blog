<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;



class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users= [
            ['user_name'=>'harout','email'=>'harout@itology.org'],
            ['user_name'=>'karni','email'=>'karni@itology.org']
        ];

        DB::table('users')->insert($users);
    }
}

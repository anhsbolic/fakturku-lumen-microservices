<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // set foreign key 0 if use mysql: turn off
    	DB::statement('SET FOREIGN_KEY_CHECKS=0');

        //resert user table
        DB::table('users')->truncate();

        //insert dummy user data
        DB::table('users')->insert([
            [
                'name' => 'Anhar Seolehudin',
                'email' => 'anhsbolic@gmail.com',
                'password' => app('hash')->make('123456'),    
            ],
            [
                'name' => 'Hilman Firdaus',
                'email' => 'hilman.firdaus@gmail.com',
                'password' => app('hash')->make('123456'),    
            ]
        ]);

        // set foreign key 0 if use mysql: turn on        
    	DB::statement('SET FOREIGN_KEY_CHECKS=1');  
    }
}

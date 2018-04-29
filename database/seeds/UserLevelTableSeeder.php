<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserLevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now()->format('Y-m-d H:i:s');

        // set foreign key 0 if use mysql: turn off
    	DB::statement('SET FOREIGN_KEY_CHECKS=0');

        //reset user_level table
        DB::table('user_level')->truncate();

        //insert dummy user_level data
        DB::table('user_level')->insert([
            [
                'level' => 'fakturku_super_admin',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'level' => 'fakturku_admin',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'level' => 'user_super_admin',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'level' => 'user_admin',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'level' => 'user',
                'created_at' => $date,
                'updated_at' => $date,
            ]
        ]);

        // set foreign key 0 if use mysql: turn on        
    	DB::statement('SET FOREIGN_KEY_CHECKS=1');  
    }
}

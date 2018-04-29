<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class InvoiceTypeTableSeeder extends Seeder
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

        //reset invoice_type table
        DB::table('invoice_type')->truncate();

        //insert dummy invoice_type data
        DB::table('invoice_type')->insert([
            [
                'type' => 'sales',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'type' => 'purchase',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'type' => 'cost',
                'created_at' => $date,
                'updated_at' => $date,
            ]
        ]);

        // set foreign key 0 if use mysql: turn on        
    	DB::statement('SET FOREIGN_KEY_CHECKS=1');  
    }
}

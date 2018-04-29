<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class InvoiceStatusTableSeeder extends Seeder
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

        //reset invoice_status table
        DB::table('invoice_status')->truncate();

        //insert dummy invoicestatuse data
        DB::table('invoice_status')->insert([
            [
                'status' => 'unpaid',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'status' => 'partial_paid',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'status' => 'paid_off',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'status' => 'draft',
                'created_at' => $date,
                'updated_at' => $date,
            ]
        ]);

        // set foreign key 0 if use mysql: turn on        
    	DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}

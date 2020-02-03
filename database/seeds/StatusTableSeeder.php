<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Statuses')->insert([
            [
        		'name' => 'Job Order'
        	],
        	[
        		'name' => 'Casual'
        	],
            [
                'name' => 'Regular'
            ]
       ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class EmploymentStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employment_statuses')->insert([
           [
               'name' => 'Employed'
           ],
           [
               'name' => 'Separated'
           ],
           [
               'name' => 'Retired'
           ]
       ]);
    }
}

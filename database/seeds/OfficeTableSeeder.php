<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfficeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('offices')->insert([
        	[
        		'name' => 'MMO-Personal Staff'
        	],
        	[
        		'name' => 'MMO-Management Information System Division (MIS)'
        	],
            [
                'name' => 'MMO-Municipal Disaster Risk Reduction and Management Office (MDDRMO)'
            ],
            [
                'name' => 'MMO-Public Affairs, Information and Assistance Division (PAIAD)'
            ],
            [
                'name' => 'MMO-Bids and Award Committee (BAC)'
            ],
        	[
        		'name' => 'MMO-General Services Office (GSO)'
        	],
        	[
        		'name' => 'MMO-Livelihood Division'
        	],
            [
                'name' => 'MMO-Business Permits and Licenses Division (BPLD)'
            ],
        	[
        		'name' => 'MMO-Nutrition Division'
        	],
        	[
        		'name' => 'MMO-Population Development Division (POPDEV)'
        	],
        	[
        		'name' => 'MMO-Economic Enterprise Division (MEMO)'
        	],
        	[
        		'name' => 'MMO-Barangay Affairs Division'
        	],
        	[
        		'name' => 'MMO-Human Resource Management Office (HRMO)'
        	],
            [
                'name' => 'MMO-Civil Security Unit (CSU)'
            ],
        	[
        		'name' => 'Office of the Sangguniang Bayan (SBO)'
        	],
        	[
        		'name' => 'Municipal Planning and Development Office (MPDO)'
        	],
        	[
        		'name' => 'Municipal Budget Office (MBO)'
        	],
        	[
        		'name' => 'Municipal Accountant Office (MACCO)'
        	],
        	[
        		'name' => 'Municipal Treasurer Office (MTO)'
        	],
        	[
        		'name' => 'Municipal Engineer Office (MEO)'
        	],
        	[
        		'name' => 'Municipal Assessor Office (MASSO)'
        	],
        	[
        		'name' => 'Municipal Health Office (MHO)'
        	],
        	[
        		'name' => 'Municipal Agriculture Office (MAO)'
        	],
        	[
        		'name' => 'Municipal Civil Registrar Office (MCRO)'
        	],
        	[
        		'name' => 'Municipal Social Welfare and Development Office (MSWDO)'
        	],
        	[
        		'name' => 'Municipal Environment and Natural Resources Office (MENRO)'
        	],
        	[
        		'name' => 'Commission On Audit (COA)'
        	],
        	[
        		'name' => 'Commission On Elections'
        	],
        	[
        		'name' => 'Philippine National Police (PNP)'
        	],
        	[
        		'name' => 'Bureau of Fire Protection (BFP)'
        	],        	        	        	        	        	
        	[
        		'name' => 'Department of Interior Local Government (DILG)'
        	],
        	[
        		'name' => 'MMO-Public Employment Service Office (PESO)'
        	],
        	[
        		'name' => 'Municipal Mayors Office (MMO)'
        	],
        	[
        		'name' => 'MENRO-Solid Waste Management Program Office'
        	],
        	[
        		'name' => 'MMO-Public Safety Department'
        	],
        	[
        		'name' => 'MSWDO-KALAHI-CIDSS'
        	]
        ]);
    }
}

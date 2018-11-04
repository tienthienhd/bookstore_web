<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->truncate();
        DB::table('roles')->insert([
        	[
        		'id' => 1, 
        		'title' => 'Admin',
	        	'description' => 'Quản trị hệ thống'
	        ], 
	 
			[
        		'id' => 2, 
        		'title' => 'Sale Manage',
	        	'description' => 'Quản lý bán hàng'
	        ], 

	        [
        		'id' => 3, 
        		'title' => 'Customer',
	        	'description' => 'Khách hàng'
	        ],  
		]);
    }
}

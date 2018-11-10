<?php

use Illuminate\Database\Seeder;

class PermissionsTabeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->truncate();
        DB::table('permissions')->insert([
        	[
        		'id' => config('permission.add-new-book'),
        		'title' => 'Add new book', 
        		'description' => 'Add new book',
	        ], 
	 
			[
        		'id' => config('permission.add-old-book'),
        		'title' => 'Add old book', 
        		'description' => 'Add old book',
	        ], 

	        [
        		'id' => config('permission.order-manage'),
        		'title' => 'Order manage', 
        		'description' => 'Order manage',
	        ],   
		]);
    }
}

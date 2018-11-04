<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('users')->insert([
        	[
        		'username' => 'admin', 
        		'fullname' => 'Admin',
	        	'email' => 'admin@hust.edu.vn', 
	        	'password' => Hash::make('123456'),
	        	'phone' => '0123456789',
	        	'address' => 'Số 1, Đại Cồ Việt, Hai Bà Trưng, Hà Nội',
	        	'remember_token' => str_random(10),  
	        	'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 
	        	'updated_at' => \Carbon\Carbon::now()->toDateTimeString(), 
	        	'avatar' => 'admin.png', 
	        	'role_id'=>1
	        ], 
	 
			[
        		'username' => 'sale_manage', 
        		'fullname' => 'Sale Manage',
	        	'email' => 'sale_manage@hust.edu.vn', 
	        	'password' => Hash::make('123456'),
	        	'phone' => '0987654321',
	        	'address' => 'Số 1, Đại Cồ Việt, Hai Bà Trưng, Hà Nội',
	        	'remember_token' => str_random(10),  
	        	'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 
	        	'updated_at' => \Carbon\Carbon::now()->toDateTimeString(), 
	        	'avatar' => 'sale_manage.png', 
	        	'role_id'=>2
	        ], 

	        [
        		'username' => 'customer', 
        		'fullname' => 'Customer',
	        	'email' => 'customer@hust.edu.vn', 
	        	'password' => Hash::make('123456'),
	        	'phone' => '0234567891',
	        	'address' => 'Số 1, Đại Cồ Việt, Hai Bà Trưng, Hà Nội',
	        	'remember_token' => str_random(10),  
	        	'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 
	        	'updated_at' => \Carbon\Carbon::now()->toDateTimeString(), 
	        	'avatar' => 'customer.png', 
	        	'role_id'=>3
	        ],  
		]);
    }
}

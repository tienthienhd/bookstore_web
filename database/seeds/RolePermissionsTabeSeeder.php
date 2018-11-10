<?php

use Illuminate\Database\Seeder;

class RolePermissionsTabeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_permissions')->truncate();
        DB::table('role_permissions')->insert([
        	[
        		'role_id' => config('auth.roles.sale-manager'),
        		'permission_id' => config('permission.add-new-book'),
	        ],

	        [
        		'role_id' => config('auth.roles.sale-manager'),
        		'permission_id' => config('permission.add-old-book'),
	        ],

	        [
        		'role_id' => config('auth.roles.sale-manager'),
        		'permission_id' => config('permission.order-manage'),
	        ], 
	 
			[
                'role_id' => config('auth.roles.add-book-staff'), 
                'permission_id' => config('permission.add-new-book'),
            ],

            [
                'role_id' => config('auth.roles.add-book-staff'), 
                'permission_id' => config('permission.add-old-book'),
            ],  

            [
                'role_id' => config('auth.roles.add-new-book-staff'), 
                'permission_id' => config('permission.add-new-book'),
            ], 

            [
                'role_id' => config('auth.roles.add-old-book-staff'), 
                'permission_id' => config('permission.add-old-book'),
            ], 

            [
                'role_id' => config('auth.roles.order-manage'), 
                'permission_id' => config('permission.order-manage'),
            ], 

            [
                'role_id' => config('auth.roles.add-new-book-and-order-manage-staff'), 
                'permission_id' => config('permission.order-manage'),
            ], 

            [
                'role_id' => config('auth.roles.add-new-book-and-order-manage-staff'), 
                'permission_id' => config('permission.add-new-book'),
            ], 

            [
                'role_id' => config('auth.roles.add-old-book-and-order-manage-staff'), 
                'permission_id' => config('permission.order-manage'),
            ], 

            [
                'role_id' => config('auth.roles.add-old-book-and-order-manage-staff'), 
                'permission_id' => config('permission.add-old-book'),
            ],  
		]);
    }
}
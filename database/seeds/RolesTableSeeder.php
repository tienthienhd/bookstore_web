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
                'id' => config('auth.roles.locked'), 
                'title' => 'Locked Account',
                'description' => 'Tài khoản bị khóa'
            ],

            [
                'id' => config('auth.roles.admin'), 
                'title' => 'Admin',
                'description' => 'Quản trị hệ thống'
            ], 
     
            [
                'id' => config('auth.roles.sale-manager'), 
                'title' => 'Sale Manage',
                'description' => 'Quản lý bán hàng'
            ], 

            [
                'id' => config('auth.roles.customer'), 
                'title' => 'Customer',
                'description' => 'Khách hàng'
            ],  
        ]);
    }
}

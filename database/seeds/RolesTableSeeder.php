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

            [
                'id' => config('auth.roles.add-book-staff'), 
                'title' => 'Add book staff',
                'description' => 'Nhân viên thêm sách'
            ], 

            [
                'id' => config('auth.roles.add-new-book-staff'), 
                'title' => 'Add new book staff',
                'description' => 'Nhân viên nhập sách mới'
            ], 

            [
                'id' => config('auth.roles.add-old-book-staff'), 
                'title' => 'Add old book staff',
                'description' => 'Nhân viên nhập sách cũ'
            ], 

            [
                'id' => config('auth.roles.order-manage'), 
                'title' => 'Order manage',
                'description' => 'Nhân viên quản lý đơn hàng'
            ], 

            [
                'id' => config('auth.roles.add-new-book-and-order-manage-staff'), 
                'title' => 'Add new book and order manage staff',
                'description' => 'Nhân viên nhập sách mới và quản lý đơn hàng'
            ], 

            [
                'id' => config('auth.roles.add-old-book-and-order-manage-staff'), 
                'title' => 'Add old book and order manage staff',
                'description' => 'Nhân viên nhập sách cũ và quản lý đơn hàng'
            ], 
        ]);
    }
}

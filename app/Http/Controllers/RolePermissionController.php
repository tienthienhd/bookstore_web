<?php

namespace App\Http\Controllers;

use App\Models\RolePermission;
use App\Models\Role;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addRolePermission(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RolePermission  $rolePermission
     * @return \Illuminate\Http\Response
     */
    public function getRolePermission(RolePermission $rolePermission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RolePermission  $rolePermission
     * @return \Illuminate\Http\Response
     */
    public function deleteRolePermission(RolePermission $rolePermission)
    {
        //
    }

    public function getRolePermissionArray(){
        $rolePermissionArray = [];
        $roles = Role::all();
        foreach ($roles as $role) {
            $rolePermissions = $role->rolePermissions;
            $pemissons = [];
            foreach ($rolePermissions as $rolePermission) {
                array_push($pemissons, $rolePermission->permission->title);
            }
            $rolePermissionArray[$role->id] = $pemissons;
        }
        unset($rolePermissionArray[config('auth.roles.admin')]);
        unset($rolePermissionArray[config('auth.roles.customer')]);
        unset($rolePermissionArray[config('auth.roles.locked')]);
        return $rolePermissionArray;
    }
}

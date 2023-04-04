<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use DB;

class RoleController extends Controller
{
    public function AllPermission(){
        $permission = Permission::all();
        return view('backend.pages.permission.all_permission',compact('permission'));
    }//end method

    public function AddPermission(){
        return view('backend.pages.permission.add_permission');
    }//end method

    public function StorePermission(Request $request){

        $role = Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);
        $notification = array (
            'message' => 'Premission Added Successfully',
            'alert-type' => 'success' 
        );
        return redirect()->route('all.permission')->with($notification);
    }//end method


    public function EditPermission($id){
        $permission = Permission::findOrFail($id);
        return view('backend.pages.permission.edit_permission',compact('permission'));
    }//end method

    public function UpdatePermission(Request $request){
        $per_id = $request->id;
        Permission::findOrFail($per_id)->update([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);
        $notification = array (
            'message' => 'Premission Updated Successfully',
            'alert-type' => 'success' 
        );
        return redirect()->route('all.permission')->with($notification);
    }//end method

    
    public function DeletePermission($id){
        Permission::findOrFail($id)->delete();
        $notification = array (
            'message' => 'Premission Deleted Successfully',
            'alert-type' => 'success' 
        );
        return redirect()->back()->with($notification);
    }//end method



    //Roles//////////////////////////////////////

    public function AllRoles(){
        $roles = Role::all();
        return view('backend.pages.roles.all_roles',compact('roles'));
    }//end method

    public function AddRoles(){
        return view('backend.pages.roles.add_roles');
    }//end method

    public function StoreRoles(Request $request){

        $role = Role::create([
            'name' => $request->name,
        ]);
        $notification = array (
            'message' => 'Role Added Successfully',
            'alert-type' => 'success' 
        );
        return redirect()->route('all.roles')->with($notification);
    }//end method

    public function EditRoles($id){
        $role = Role::findOrFail($id);
        return view('backend.pages.roles.edit_roles',compact('role'));
    }//end method

    public function UpdateRoles(Request $request){
        $role_id = $request->id;
        Role::findOrFail($role_id)->update([
            'name' => $request->name,
        ]);
        $notification = array (
            'message' => 'Role Updated Successfully',
            'alert-type' => 'success' 
        );
        return redirect()->route('all.roles')->with($notification);
    }//end method

    public function DeleteRoles($id){
        Role::findOrFail($id)->delete();
        $notification = array (
            'message' => 'Role Deleted Successfully',
            'alert-type' => 'success' 
        );
        return redirect()->back()->with($notification);
    }//end method



    ///////////////// Assign roles to permissions


    public function AddRolesPermission(){ 
        $roles = Role::all();
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('backend.pages.roles.add_roles_permission',compact('roles','permissions','permission_groups'));

    }//end method

    public function RolePermissionStore(Request $request){

        $data = array();
        $permissions = $request->permission;

        foreach($permissions as $key => $item){
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $item;

            DB::table('role_has_permissions')->insert($data);
        }

        $notification = array (
            'message' => 'Permission Assigned Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.roles.permission')->with($notification);


    }//end method

    public function AllRolesPermission(){
        $roles = Role::all();
        return view('backend.pages.roles.all_roles_permission',compact('roles'));

    }//end method

    public function AdminRolesEdit($id){
        $role = Role::findOrFail($id);
        $permission = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('backend.pages.roles.roles_permission_edit',compact('role','permission','permission_groups'));
    }//end method

    public function AdminRoleUpdate(Request $request,$id){
        $role = Role::findOrFail($id);
        $permissions = $request->permission;

        if(!empty($permissions)){
            $role->syncPermissions($permissions);
        }

        $notification = array (
            'message' => 'Permission Allocation Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.roles.permission')->with($notification);


    }//end method


}

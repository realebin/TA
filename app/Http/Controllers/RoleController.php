<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    function getAllRole(Request $request){
        $role = Role::all();
        return json_encode($role);
    }
    function getOneRole(Request $request, $id) {
        $hasil =  Role::where('id_role', '=', $id)->first();
        return json_encode($hasil);
    }
    function insertRole(Request $request){
        $temp = new Role;
        $temp->nama_role = $request->input('nama_role');
        $temp->save();
        $result = array();
        $result["id"] =1;
        $result["message"] = 'Insert Successfull';
        return json_encode($result);
    }
    function updateRole(Request $request, $id){
        $temp= Role::find($id);
        $temp->nama_role = $request->input('nama_role');
        $temp->update();
        $result = array();
        $result["id"] =1;
        $result["message"] = 'Update Successfull';
        return json_encode($result);
    }
    public function deleteRole($id) {
        $temp= Role::find($id);
        $temp->delete();
        $result = array();
        $result["id"] =1;
        $result["message"] = 'Delete Successfull';
        return json_encode($result);
    }
}

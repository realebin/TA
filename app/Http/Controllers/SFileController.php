<?php

namespace App\Http\Controllers;

use App\SFile;
use Illuminate\Http\Request;

class SFileController extends Controller
{
    function getAllSFile(Request $request){
        $sfile = SFile::all();
        return json_encode($sfile);
    }

    function getSFlieBySeminar(Request $request, $id) {
        $hasil =  SFile::where('seminar_id', '=', $id)->get();
        return json_encode($hasil);
    }

    function getOneSFile(Request $request, $id) {
        $hasil =  SFile::where('id_sfile', '=', $id)->first();
        return json_encode($hasil);
    }

    function insertSFile(Request $request){
        $temp = new SFile;
        $temp->seminar_id = $request->input('seminar_id');
        $temp->path = $request->input('path');
        $temp->save();
        $result = array();
        $result["id"] =1;
        $result["message"] = 'Insert Successfull';
        return json_encode($result);
    }

    function updateSFile(Request $request, $id){
        $temp= SFile::where('id_sertifikat','=',$id)->first();
        $temp->seminar_id = $request->input('seminar_id');
        $temp->path = $request->input('path');
        $temp->update();
        $result = array();
        $result["id"] =1;
        $result["message"] = 'Update Successfull';
        return json_encode($result);
    }
    public function deleteSFile($id) {
        $temp= SFile::where('id_sfile','=',$id)->first();
        $temp->delete();
        $result = array();
        $result["id"] =1;
        $result["message"] = 'Delete Successfull';
        return json_encode($result);
    }
}

<?php

namespace App\Http\Controllers;

use App\Sertifikat;
use Illuminate\Http\Request;

class SertifikatController extends Controller
{
    function getAllSertifikat(Request $request){
        $sertif = Sertifikat::all();
        return json_encode($sertif);
    }

    function getSertifikatBySeminar(Request $request, $id) {
        $hasil =  Sertifikat::where('seminar_id', '=', $id)->get();
        return json_encode($hasil);
    }

    function getOneSertifikat(Request $request, $id) {
        $hasil =  Sertifikat::where('id_sertifikat', '=', $id)->first();
        return json_encode($hasil);
    }

    function insertSertifikat(Request $request){
        $temp = new Sertifikat;
        $temp->seminar_id = $request->input('seminar_id');
        $temp->nama_sertifikat = $request->input('nama_sertifikat');
        $temp->save();
        $result = array();
        $result["id"] =1;
        $result["message"] = 'Insert Successfull';
        return json_encode($result);
    }

    function updateSertifikat(Request $request, $id){
        $temp= Sertifikat::where('id_sertifikat','=',$id)->first();
        $temp->seminar_id = $request->input('seminar_id');
        $temp->nama_sertifikat = $request->input('nama_sertifikat');
        $temp->update();
        $result = array();
        $result["id"] =1;
        $result["message"] = 'Update Successfull';
        return json_encode($result);
    }
    public function deleteSertifikat($id) {
        $temp= Sertifikat::where('id_sertifikat','=',$id)->first();
        $temp->delete();
        $result = array();
        $result["id"] =1;
        $result["message"] = 'Delete Successfull';
        return json_encode($result);
    }
}

<?php

namespace App\Http\Controllers;

use App\SeminarUser;
use Illuminate\Http\Request;

class SeminarUserController extends Controller
{
    function getAllSeminarUser(Request $request){
        $seminaruser = SeminarUser::all();
        return json_encode($seminaruser);
    }

    function getSeminarUserBySeminar(Request $request, $id) {
        $hasil =  SeminarUser::where('seminar_id', '=', $id)->get();
        return json_encode($hasil);
    }

    function getSeminarUserByUser(Request $request, $id) {
        $hasil =  SeminarUser::where('user_id', '=', $id)->get();
        return json_encode($hasil);
    }

    function getSeminarUser(Request $request, $s, $u) {
        $hasil =  SeminarUser::where('seminar_id', '=', $s)->where('user_id','=',$u)->get();
        return json_encode($hasil);
    }

    function getOneSeminarUser(Request $request, $id) {
        $hasil =  SeminarUser::where('id_su', '=', $id)->first();
        return json_encode($hasil);
    }

    function insertSeminarUser(Request $request){
        $temp = new SeminarUser();
        $temp->seminar_id = $request->input('seminar_id');
        $temp->user_id = $request->input('user_id');
        $temp->no_sertifikat = $request->input('no_sertifikat');
        $temp->cetak_sertifikat = $request->input('cetak_sertifikat');
        $temp->sebagai = $request->input('sebagai');
        $temp->save();
        $result = array();
        $result["id"] =1;
        $result["message"] = 'Insert Successfull';
        return json_encode($result);
    }

    function updateSeminarUser(Request $request, $id){
        $temp= SeminarUser::where('id_su','=',$id)->first();
        $temp->seminar_id = $request->input('seminar_id');
        $temp->user_id = $request->input('user_id');
        $temp->no_sertifikat = $request->input('no_sertifikat');
        $temp->cetak_sertifikat = $request->input('cetak_sertifikat');
        $temp->sebagai = $request->input('sebagai');
        $temp->update();
        $result = array();
        $result["id"] =1;
        $result["message"] = 'Update Successfull';
        return json_encode($result);
    }
    public function deleteSeminarUser($id) {
        $temp= SeminarUser::where('id_su','=',$id)->first();
        $temp->delete();
        $result = array();
        $result["id"] = 1;
        $result["message"] = 'Delete Successfull';
        return json_encode($result);
    }
}

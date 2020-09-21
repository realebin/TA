<?php

namespace App\Http\Controllers;

use App\UFile;
use Illuminate\Http\Request;

class UFileController extends Controller
{

    function getAllUFile(Request $request)
    {
        $ufile = UFile::all();
        return json_encode($ufile);
    }

    function getUFileByUser(Request $request, $id)
    {
        $ufile = UFile::where('user_id', '=', $id)->get();
        return json_encode($ufile);
    }

    function getOneUFile(Request $request, $id)
    {
        $ufile = UFile::where('id_ufile', '=', $id)->first();
        return json_encode($ufile);
    }

    function insertUFile(Request $request)
    {
        $temp = new UFile();
        $id = $temp->user_id = $request->input('user_id');

        $path = public_path('images') . "/UserFile" . $id;

        if (!file_exists($path)) { //cek if directory exist
            mkdir($path, 0755);
        }
        $imageName = time() . '.' . $request->path->getClientOriginalExtension();
        $imagefullPath = $path . "/" . $imageName;
        echo $imagefullPath;
        $temp->path = $imagefullPath;
        $request->path->move($path, $imageName);
        $temp->save();
    }

    public function deleteUFile(Request $request, $id, $userid)
    {
        $file = UFile::where('id_ufile', '=', $id)->where('user_id', '=', $userid)->first();
        $file_path = $file->path;
        if(file_exists($file_path))
        {
            unlink($file_path);
            UFile::destroy($id);
        }
        $result = array();
        $result["id"] = 1;
        $result["message"] = 'Delete Successfull';
        return json_encode($result);

    }
}

<?php

namespace App\Http\Controllers;

use App\Sertifikat;
use App\Seminar;
use App\User;
use App\SeminarUser;
use App\Topik;
use DB;
use Illuminate\Http\Request;

class SertifikatController extends Controller
{
    public function index(){
        $sertifikat = Sertifikat::Join('table_seminar','table_sertifikat.seminar_id','table_seminar.id_seminar')
        ->Join('table_topik','table_seminar.topik_id','table_topik.id_topik')
        ->Join('table_seminar_user','table_sertifikat.seminar_id','table_seminar_user.seminar_id')
        ->Join('users','table_seminar_user.user_id','users.id')
        ->get();
        if($sertifikat){
            $sertifikat = Sertifikat::all();
        }
        return view('sertifikat',['sertifikat'=>$sertifikat]);
    }


    public function show(Request $request,$id){
        $sertifikat = Sertifikat::where('id_sertifikat','=',$id)->first();
        $seminar = Seminar::where('id_seminar','=',$id)->first();
        $su = SeminarUser::where('seminar_id','=',$id)->get();
        $topik = Topik::where('id_topik','=',$seminar->topik_id)->first();
        $user = User::where('id','=',$su->user_id)->get();
        // dd($sertifikat);
        // compat sama dengan yng ['user'=>$user]
        return view('sertifikat.detail', compact('sertifikat','seminar','su','topik','user'));
    }

    public function create(){
        $seminar = Seminar::all();
        $user = User::all();
        return view('sertifikat.create', compact('seminar','user'));
    }

    function store(Request $request){
        $final=DB::transaction(function() use($request){
            $temp = new Sertifikat;
            $temp->nama_sertifikat = $request->input('nama_sertifikat');
            $temp->seminar_id = $request->input('seminar_id');
        
            $path = public_path('storage') . '/Sertifikat'. '/'.$temp->seminar_id;
            if (!file_exists($path)) { //cek if directory exist
            mkdir($path, 0755,true); //permission nya 0755 = drwxr-xr-x
            }
            // dd($request->path);
            $file = $request->path;  
            $filefullpath = $path . "/".  $file; 
            $temp->path = $filefullpath;
            // dd($temp->path);
            if ($request->hasFile('file'))
            {
                $request->path->move($path, $file);
            }
            $temp->save();
            // dd($temp->id_sertifikat);
            $user = $request->input('id');
            $su = SeminarUser::where('seminar_id','=',$temp->seminar_id)->where('user_id','=',$user)->first();
            // dd($user);
            $su->no_sertifikat = $temp->id_sertifikat;
            $su->update();
            
            return redirect('/sertifikat')->with('status','Data sertifikat berhasil ditambah!');
        });
        return $final;
    }

    public function destroy(Topik $topik){
        Topik::destroy($topik->id_topik);
        return redirect('/topik')->with('status','Data topik berhasil dihapus!');
    }

    public function edit(Topik $topik){
        return view('topik.edit', compact('topik'));
    }

    public function update(Request $request, Topik $topik){


        $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('table_topik')->ignore($topik->id_topik)],
        ],
        [
            'nama_topik.required'=>'Nama Topik harus diisi',
            'nama_topik.unique'=>'Nama Topik Harus unik',

        ]);

        $temp= Topik::find($id);
        $temp->nama_topik = $request->input('nama_topik');
        $temp->update();

        return redirect('/topik')->with('status','Data topik berhasil diupdate!');

    }




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

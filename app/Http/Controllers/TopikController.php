<?php

namespace App\Http\Controllers;

use App\Topik;
use App\Seminar;
use Illuminate\Http\Request;

class TopikController extends Controller
{
    
    public function index(){
        $topik = Topik::Join('table_seminar','topik_id','id_topik')->get();
        if($topik){
            $topik = Topik::all();
        }
        // $topik = Topik::select('id_topik', 'nama_topik')->get();
        // return $topik;

        return view('topik',['topik'=>$topik]);
    }


    public function show(Request $request,$id){
        $topik = Topik::where('id_topik','=',$id)->first();
        $seminar = Seminar::where('topik_id','=',$id)->get();
        // dd($topik);
        // compat sama dengan yng ['user'=>$user]
        return view('topik.detail', compact('topik','seminar'));
    }

    public function create(){
        return view('topik.create');
    }

    function store(Request $request){


        //aturan validate (validation rules) ada di docs laravel semua
        $request->validate([
            'nama_topik' => ['required', 'string', 'max:255','unique:table_topik'],
        ],
        [
            'nama_topik.required'=>'Nama Topik harus diisi',
            'nama_topik.unique'=>'Nama Topik Harus unik',
        ]
    );
        $temp = new Topik;
        $temp->nama_topik = $request->input('nama_topik');
        $temp->save();
        return redirect('/topik')->with('status','Data topik berhasil ditambah!');
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




    function getAllTopik(Request $request){
        $topik = Topik::all();
        return json_encode($topik);
    }
    function getOneTopik(Request $request, $id) {
        $hasil =  Topik::where('id_topik', '=', $id)->first();
        return json_encode($hasil);
    }
    function insertTopik(Request $request){
        $temp = new Topik;
        $temp->nama_topik = $request->input('nama_topik');
        $temp->save();
        $result = array();
        $result["id"] =1;
        $result["message"] = 'Insert Successfull';
        return json_encode($result);
    }
    function updateTopik(Request $request, $id){
        $temp= Topik::find($id);
        $temp->nama_topik = $request->input('nama_topik');
        $temp->update();
        $result = array();
        $result["id"] =1;
        $result["message"] = 'Update Successfull';
        return json_encode($result);
    }
    public function deleteTopik($id) {
        $temp= Topik::find($id);
        $temp->delete();
        $result = array();
        $result["id"] =1;
        $result["message"] = 'Delete Successfull';
        return json_encode($result);
    }
}

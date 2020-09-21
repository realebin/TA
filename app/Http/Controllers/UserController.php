<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('admin');
    }
    public function index(){
        $user = User::all();
        return view('user',['user'=>$user]);
    }

    public function profile($id){
        $user = User::Join('table_seminar_user','user_id','id')->where('id','=',$id)->orderby('id','asc')->get();
        if($user){
            $user = User::where('id','=',$id)->first();
        }
        // compat sama dengan yng ['user'=>$user]
        return view('profile', compact('user'));
    }

    public function show(Request $request,$id){
        ////->first() kalo cmn satu
        $user = User::Join('table_seminar_user','user_id','id')->where('id','=',$id)->orderby('id','asc')->get();
        if($user){
            $user = User::where('id','=',$id)->first();
        }
        // compat sama dengan yng ['user'=>$user]
        return view('user.detail', compact('user'));
    }

    public function create(){
        return view('user.create');
    }

    function store(Request $request){


        //aturan validate (validation rules) ada di docs laravel semua
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'username' => ['required', 'string', 'max:20', 'unique:users'],
            'telepon_user' => ['required', 'string', 'min:8'],
            'alamat_user' => ['required', 'string', 'min:5'],
        ],
        [
            'name.required'=>'Nama harus diisi',
            'username.required'=>'Username Harus diisi',
            'username.unique'=>'Username Harus unik',
            'password.required'=>'Password harus diisi',
            'email.required'=>'Email harus diisi',
            'email.email'=>'Email tidak valid',
            'email.unique'=>'Email sudah terdaftar',
            'alamat_user.required'=>'Alamat harus diisi',
            'telepon_user.required'=>'Nomor Telepon harus diisi',
            'role_id.required'=>'Role harus diisi'

        ]
    );
        //kalau pake create bisa ngisi fillable, kalo pake cara biasa ga
        //cara lain tapi harus diisi fillable di model!!
        ///kalau sudah diisi fillable, jadinya create bisa 2 baris

        // User::create([
        //     'alamat_user' => $request->alamat_user,
        //     'username' => $request->username,
        //     'telepon_user' => $request->telepon_user,
        //     'password' => $request->password,
        //     'role_id' => $request->role_id,
        //     'email' => $request->email,
        //     'name' => $request->name
        // ]);

        //create all karena sisanya sdh di restrict dari fillable/guarded
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role_id' => 2,
            'username' => $request['username'],
            'telepon_user' => $request['telepon_user'],
            'alamat_user' => $request['alamat_user'],
        ]);


        ///cara biasa
        // $temp = new User;
        // $temp->alamat_user = $request->input('alamat_user');
        // $temp->username = $request->input('username');
        // $temp->telepon_user = $request->input('telepon_user');
        // $temp->password = $request->input('password');
        // $temp->role_id = $request->input('role_id');
        // $temp->email = $request->input('email');
        // $temp->name = $request->input('name');
        // $temp->save();
        // $result = array();
        // $result["id"] =1;
        // $result["message"] = 'Insert Successfull';


        //with itu mau nambah pesan apa (di docs carinya flash)
        return redirect('/user')->with('status','Data user berhasil ditambah!');
    }

    public function destroy(User $user){
        User::destroy($user->id);
        return redirect('/user')->with('status','Data user berhasil dihapus!');
    }

    public function edit(User $user){
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, User $user){


        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => 'required|email', Rule::unique('users')->ignore($user->id),
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'username' => ['required', 'string', 'max:20', Rule::unique('users')->ignore($user->id)],
            'telepon_user' => ['required', 'string', 'min:8'],
            'alamat_user' => ['required', 'string', 'min:5'],
        ],
        [
            'name.required'=>'Nama harus diisi',
            'username.required'=>'Username Harus diisi',
            'username.unique'=>'Username Harus unik',
            'password.required'=>'Password harus diisi',
            'email.required'=>'Email harus diisi',
            'email.email'=>'Email tidak valid',
            'email.unique'=>'Email sudah terdaftar',
            'alamat_user.required'=>'Alamat harus diisi',
            'telepon_user.required'=>'Nomor Telepon harus diisi',
            'role_id.required'=>'Role harus diisi'

        ]);


        User::where('id',$user->id)
        ->update([
            'name' =>$request->name,
            'alamat_user' => $request->alamat_user,
            'username' => $request->username,
            'telepon_user' => $request->telepon_user,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
            'email' => $request->email
        ]);

        return redirect('/user')->with('status','Data user berhasil diupdate!');

    }

    // public function login(Request $request,User $user){
    //     $temp = User::where('email','=',$request->email)->where('password','=',$request->password)->first();
    //     return view('home', compact('user'));
    // }


    function getAll(Request $request){
        $users = User::all();
        // var_dump($users);
        return json_encode($users);
    }
    function getAllUser(Request $request){
        $users = User::Join('table_seminar_user','user_id','id')->get();
        // var_dump($users);
        /////ngecek users teh null ga, kalo null dia masuk sini
        if($users){
            $users = User::all();
        }
        return json_encode($users);
    }
    function getOneUser(Request $request,$id){
        ////->first() kalo cmn satu
        $users = User::Join('table_seminar_user','user_id','id')->where('id','=',$id)->orderby('id','asc')->get();
        if($users){
            $users = User::where('id','=',$id)->first();
        }
        // var_dump($users);
        return json_encode($users);
    }

    function getLogin(Request $request,$email,$password){
        ////->first() kalo cmn satu
        $users = User::Join('table_seminar_user','user_id','id')->where('email','=',$email)->where('password','=',$password)->get();
        if($users){
            $users = User::where('email','=',$email)->where('password','=',$password)->get();
        }
        // var_dump($users);
        return json_encode($users);
    }
    function insertUser(Request $request){
        $temp = new User;
        $temp->alamat_user = $request->input('alamat_user');
        $temp->username = $request->input('username');
        $temp->telepon_user = $request->input('telepon_user');
        $temp->password = $request->input('password');
        $temp->role_id = $request->input('role_id');
        $temp->email = $request->input('email');
        $temp->name = $request->input('name');
        $temp->save();
        $result = array();
        $result["id"] =1;
        $result["message"] = 'Insert Successfull';
        return json_encode($result);

    }
    function updateUser(Request $request, $id){
        $temp= User::find($id);
        $temp->username = $request->input('username');
        $temp->alamat_user = $request->input('alamat_user');
        $temp->telepon_user = $request->input('telepon_user');
        $temp->password = $request->input('password');
        $temp->role_id = $request->input('role_id');
        $temp->email = $request->input('email');
        $temp->name = $request->input('name');
        $temp->update();
        $result = array();
        $result["id"] =1;
        $result["message"] = 'Update Successfull';
        return json_encode($result);
    }
    public function deleteUser($id) {
        $temp= User::find($id);
        $temp->delete();
        $result = array();
        $result["id"] =1;
        $result["message"] = 'Delete Successfull';
        return json_encode($result);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\Kelas;   
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function __construct(){
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    public function index(){
        $data = [
            'title' => 'List User',
            'users' => $this->userModel->all(),
        ];  

        return view('list_user', $data);
    }

    public function profile($nama = "", $kelas = "", $npm = ""){
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'npm' => $npm,
        ];
        return view('profile', $data);
    }

    public function create(){
        $kelas = $this->kelasModel->all();

        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
        ];

        return view('create_user', $data);
    }

    public function edit($id){
        $user = UserModel::findOrFail($id);
        $kelas = $this->kelasModel->all();
        return view('edit_user', compact('user', 'kelas'))->with('title', 'Edit User');
    }

    public function update(UserRequest $request, $id){
        $user = UserModel::findOrFail($id);
        $user->nama = $request->nama;
        $user->npm = $request->npm;
        $user->kelas_id = $request->kelas_id;

        if($request->hasFile('foto')){
            $fileName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('upload/img/'), $fileName);
            $user->foto = 'upload/img/' . $fileName;
        }

        $user->save();
        return redirect()->route('user.index')->with('success', 'User updated successfully');
    }

    public function destroy($id){
        $user = UserModel::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User has been deleted successfully');
    }

    public function store(UserRequest $request) {
        $fotoPath = null;
        if($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = $foto->hashName();
            $fotoPath = $foto->move('upload/img', $fotoName);
        }

        $this->userModel->create([
            'nama' => $request->nama,
            'npm' => $request->npm,
            'kelas_id' => $request->kelas_id,
            'foto' => $fotoPath ? str_replace('\\', '/', $fotoPath) : null,
        ]);

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan');
    }

    public function show($id) {
        $user = $this->userModel->find($id);
        $data = [
            'title' => 'Profile',
            'user' => $user,
        ];
        return view('profile', $data);
    }
}

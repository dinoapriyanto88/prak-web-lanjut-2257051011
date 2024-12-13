<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Models\Kelas;   
use Illuminate\Http\Request;

class UserController extends Controller
{

    public $userModel;
    public $kelasModel;

    public function __construct(){
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    public function index(){
        $data = [
            'title' => 'List User',
            'users' => $this->userModel->getUser(),
        ];  

        return view('list_user', $data);
    }

    public function show($id){
        $user = $this->userModel->getUser($id);
        $data = [
            'title' => 'Profile',
            'user' => $user,
        ];

        return view('profile', $data);
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
        $kelasModel = new Kelas();
        $kelas = $kelasModel->getKelas();

        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
        ];

        return view('create_user', $data);
    }

    public function edit($id){
        $user = UserModel::findOrFail($id);
        $kelasModel = new Kelas();
        $kelas = $kelasModel->getKelas();
        $title = 'Edit User';
        return view('edit-user', compact('user', 'kelas', 'title'));
    }
    public function update(Request $request, $id){
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
        return redirect()->route('user.index')->with('success', 'User updated succesfully');
    }
    public function destroy($id){
        $user = UserModel::findOrFail($id);
        $user->delete();
        return redirect()->to('/user')->with('success', 'User has been deleted successfully');
    }

    public function store(Request $request)
{
    // Validate the input fields including the file upload (if available)
    $validatedData = $request->validate([
        'nama' => 'required|string|max:255',
        'npm' => 'required|string|max:255',
        'kelas_id' => 'required|exists:kelas,id',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image file
    ], [
        'nama.required' => 'Kolom nama masih kosong',
        'npm.required' => 'Kolom NPM masih kosong',
        'kelas_id.required' => 'Kolom kelas masih kosong',
        'kelas_id.exists' => 'Kelas yang dipilih tidak valid',
    ]);

    // Handle the photo upload (if a file is provided)
    if ($request->hasFile('foto')) {
        $foto = $request->file('foto');
        // Generate a unique filename for the uploaded file
        $filename = $foto->getClientOriginalName();
        // Store the file in the 'public/upload/img' folder
        $fotoPath = $foto->storeAs('upload/img', $filename, 'public');
    } else {
        $fotoPath = null; // If no photo is uploaded, set path to null
    }

    // Save the user data including the uploaded photo path
    $user = UserModel::create([
        'nama' => $validatedData['nama'],
        'npm' => $validatedData['npm'],
        'kelas_id' => $validatedData['kelas_id'],
        'foto' => $fotoPath, // Store the path to the uploaded file
    ]);

    // Load the 'kelas' relation for the user
    $user->load('kelas');

    // Return the 'profile' view with user details
    return view('profile', [
        'nama' => $user->nama,
        'npm' => $user->npm,
        'nama_kelas' => $user->kelas->nama_kelas ?? 'Kelas tidak ditemukan',
        'foto' => $user->foto, // Include the file path to the uploaded photo
    ]);


        $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|integer',
            'jurusan' => 'required|string|max:255',
            'semester' => 'required|integer|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $filename = time() . '_' . $foto->getClientOriginalName();
            $fotoPath = $foto->move(('upload/img'), $filename);
        } else {
            $fotoPath = null;
        }

        $this->userModel->create([
            'nama' => $request->input('nama'),
            'npm' => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id'),
            'jurusan' => $request->input('jurusan'), 
            'semester' => $request->input('semester'), 
            'foto' => 'upload/img/' . $filename,
        ]);

        return redirect()->to('/user')->with('success', 'User berhasil ditambahkan');
    }
}
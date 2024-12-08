<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile($nama = "", $kelas = "", $npm = "") {
        $data = ['nama' => $nama, 'kelas' => $kelas, 'npm' => $npm];
        return view('profile', $data);
    }
    
    public function create() {
        $kelas = Kelas::all();
        return view('create_user', compact('kelas'));
    }

    public function store(Request $req) {
        // Validasi data yang diterima
        $validatedData = $req->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas' => 'required|exists:kelas,id',
        ]);
    
        // Simpan data ke dalam database
        $user = UserModel::create([
            'nama' => $validatedData['nama'],
            'npm' => $validatedData['npm'],
            'kelas_id' => $validatedData['kelas'],
        ]);
    
        // Muat data kelas yang terkait dengan user
        $user->load('kelas');
    
        // Tampilkan view profil dengan data yang baru disimpan
        return view('profile', [
            'nama' => $user->nama,
            'npm' => $user->npm,
            'kelas' => $user->kelas->nama_kelas ?? 'Kelas tidak ditemukan',
        ]);
    }
    
    }


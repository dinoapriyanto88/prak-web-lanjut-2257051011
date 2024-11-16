<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile($nama = "", $kelas = "", $npm = "") {
        $data = ['nama' => $nama, 'kelas' => $kelas, 'npm' => $npm];
        return view('profile', $data);
    }
    
    public function create() {
        return view('create_user');
    }
    public function store(Request $req) {
        $data = [
            'nama' => $req->input('nama'),
            'npm' => $req->input('npm'),
            'kelas' => $req->input('kelas'),
        ];
        return view('profile', $data);
    }
}

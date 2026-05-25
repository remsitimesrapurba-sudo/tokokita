<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Mahasiswacontroller extends Controller
{
    // Method untuk halaman daftar mahasiswa
    public function index(){
        return "Ini adalah halaman Daftar Semua Mahasiswa (dari Controller).";
    }
    // Method untuk halaman detail mahasiswa (menerima parameter)
    public function show($nim){
        return "Ini adalah halaman Profil Mahasiswa dengan NIM: " . $nim;
    }
    // Method untuk array data json (simulasi API kecilkecilan)
    public function data(){
        $data = [
            'nama' => 'Christian Rosicky Damanik',
            'nim' => '224520046',
            'jurusan' => 'sistem informasi'
        ];
        return response()->json($data);
    }
}

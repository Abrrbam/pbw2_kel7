<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
    public function index()
    {
        $kosts = DB::table('kost')->select(
            'id_kost', 'nama_kost', 'nama_daerah',
            'kontak', 'tipe_kost', 'alamat',
            'deskripsi', 'harga', 'foto'
        )->limit(10)->get();

        return view('guest.home', ['kosts' => $kosts]);
    }
}

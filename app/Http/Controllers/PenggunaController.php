<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function beranda()
    {
        return view('pengguna.beranda');
    }
}
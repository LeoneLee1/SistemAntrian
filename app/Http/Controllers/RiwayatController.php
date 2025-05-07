<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index(){
        return view('Server.Pages.Riwayat.index');
    }
}

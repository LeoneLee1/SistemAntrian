<?php

namespace App\Http\Controllers;

use App\Models\Tujuan;
use App\Models\Antrian;
use App\Models\Riwayat;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $antrian = Antrian::count();
        $tujuan = Tujuan::count();
        $riwayat = Riwayat::count();

        return view('Server.Pages.Dashboard.index',compact('antrian','tujuan','riwayat'));
    }
}

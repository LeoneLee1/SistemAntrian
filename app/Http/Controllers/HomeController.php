<?php

namespace App\Http\Controllers;

use App\Models\Nomor;
use App\Models\Tujuan;
use App\Models\Antrian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function welcome(){
        
        $antrian = DB::select("SELECT p1.*, p3.name, p3.kode FROM antrians p1
                                LEFT JOIN tujuans p3 ON p3.id = p1.tujuans_id
                                WHERE p1.created_at = (SELECT MIN(p2.created_at) FROM antrians p2 WHERE p2.tujuans_id = p1.tujuans_id)
                                ORDER BY p3.id ASC, p1.nomor;");

        $tujuan = DB::select("SELECT p1.*, p2.nomor FROM tujuans p1
                            LEFT JOIN (
                            SELECT a1.*
                            FROM antrians a1
                            INNER JOIN (
                                SELECT tujuans_id, MIN(created_at) as min_created
                                FROM antrians
                                GROUP BY tujuans_id) 
                                a2 ON a1.tujuans_id = a2.tujuans_id AND a1.created_at = a2.min_created) p2 ON p2.tujuans_id = p1.id;");

        return view('Client.welcome',compact('antrian','tujuan'));
    }

    public function loadData(){

        $antrian = DB::select("SELECT p1.nomor, p1.tujuans_id, p1.id, p3.kode FROM antrians p1
                                LEFT JOIN tujuans p3 ON p3.id = p1.tujuans_id
                                WHERE p1.created_at = (SELECT MIN(p2.created_at) FROM antrians p2 WHERE p2.tujuans_id = p1.tujuans_id)
                                ORDER BY p3.id ASC, p1.nomor;");

        return response()->json($antrian);
    }

    public function ticket(){
        
        $tujuan = Tujuan::all();

        return view('Client.ambilAntrian',compact('tujuan'));
    }

    public function ambilAntrian($name){
        $tujuan = Tujuan::where('name', $name)->first();
        
        $lastNumber = DB::table('nomors')
                    ->where('tujuans_id', $tujuan->id)
                    ->orderByDesc('id')
                    ->select('no_antrian')
                    ->first();
                
        if ($lastNumber) {
            $incrementedNumber = (int) $lastNumber->no_antrian + 1;
        
            $newNomor = str_pad($incrementedNumber, 3, '0', STR_PAD_LEFT);
        } else {
            $newNomor = '001';
        }

        $nomor = new Nomor();
        $nomor->tujuans_id = $tujuan->id;
        $nomor->no_antrian = $newNomor;
        $nomor->save();

        $antrian = new Antrian();
        $antrian->tujuans_id = $tujuan->id;
        $antrian->nomor = $newNomor;

        if ($antrian->save()) {
            toast('Tiket Berhasil dicetak','success');
            return redirect()->back();
        } else {
            toast('Tiket Gagal dicetak','error');
            return redirect()->back();
        }
    }
}

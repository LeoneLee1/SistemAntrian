<?php

namespace App\Http\Controllers;

use App\Models\Nomor;
use App\Models\Tujuan;
use App\Models\Antrian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AntrianController extends Controller
{
    public function index(){

        $antrian = DB::select("SELECT p1.*, p3.name, p3.kode FROM antrians p1 
                                LEFT JOIN tujuans p3 ON p3.id = p1.tujuans_id
                                WHERE p1.created_at = (SELECT MIN(p2.created_at) FROM antrians p2 WHERE p2.tujuans_id = p1.tujuans_id)
                                ORDER BY p3.id ASC, p1.nomor;");

        $tujuan = Tujuan::all();

        return view('Server.Pages.Antrian.index',compact('antrian','tujuan'));
    }

    public function cetakAntrian($name){

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

    public function selesai($id){
        $antrian = Antrian::findOrFail($id);

        if ($antrian->delete()) {
            toast('Selesai Layanan','success');
            return back();
        } else {
            toast('Failed','error');
            return back();
        }
    }
}

<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Tujuan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TujuanController extends Controller
{
    public function json(){
        // $data = Tujuan::orderByDesc('id')->get();
        $data = Tujuan::orderBy('id','ASC')->get();

        return DataTables::of($data)
        ->addIndexColumn()
        ->make(true);
    }

    public function index(){

        $title = 'Delete Tujuan?';
        $text = 'Are you sure you want to delete?';
        confirmDelete($title,$text);

        return view('Server.Pages.Tujuan.index');
    }

    public function create(){
        return view('Server.Pages.Tujuan.create');
    }

    public function insert(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'kode' => 'required|max:11',
        ]);

        $tujuan = new Tujuan();
        $tujuan->name = $request->name;
        $tujuan->kode = $request->kode;

        if ($tujuan->save()) {
            Alert::success('Successfully Create Tujuan');
            return redirect()->route('tujuan');
        } else {
            Alert::error('Failed Create Tujuan');
            return redirect()->back();
        }
    }

    public function show($id){
        $tujuan = Tujuan::findOrFail($id);

        return view('Server.Pages.Tujuan.show',compact('tujuan'));
    }

    public function edit($id){
        $tujuan = Tujuan::findOrFail($id);

        return view('Server.Pages.Tujuan.edit',compact('tujuan'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
            'kode' => 'required|max:11',
        ]);

        $tujuan = Tujuan::findOrFail($id);
        $tujuan->name = $request->name;
        $tujuan->kode = $request->kode;

        if ($tujuan->save()) {
            Alert::success('Successfully Update Tujuan');
            return redirect()->route('tujuan');
        } else {
            Alert::error('Failed Update Tujuan');
            return redirect()->back();
        }
    }

    public function delete($id){
        $tujuan = Tujuan::findOrFail($id);

        if ($tujuan->delete()) {
            Alert::success('Successfully Delete Tujuan');
            return redirect()->back();
        } else {
            Alert::error('Failed Delete Tujuan');
            return redirect()->back();
        }
    }
}

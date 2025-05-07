<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function json(){
        $data = User::orderByDesc('id')->get();

        return DataTables::of($data)
        ->addIndexColumn()
        ->make(true);
    }

    public function index(){

        $title = 'Delete User?';
        $text = 'Are you sure you want to delete?';
        confirmDelete($title,$text);

        return view('Server.Pages.User.index');
    }

    public function create(){
        return view('Server.Pages.User.create');
    }

    public function insert(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|max:255',
            'password' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);

        if ($user->save()) {
            Alert::success('Successfully Create Account');
            return redirect()->route('user');
        } else {
            Alert::error('Failed Create Account');
            return redirect()->back();
        }
    }

    public function show($id){
        $user = User::findOrFail($id);

        return view('Server.Pages.User.show',compact('user'));
    }

    public function edit($id){
        $user = User::findOrFail($id);

        return view('Server.Pages.User.edit',compact('user'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|max:255',
        ]);

        $user = User::findOrFail($id);
        if ($request->password === '' || $request->password === null) {
            $user->name = $request->name;
            $user->username = $request->username;
        } else {
            $user->name = $request->name;
            $user->username = $request->username;
            $user->password = Hash::make($request->password);
        }

        if ($user->save()) {
            Alert::success('Successfully Update Account');
            return redirect()->route('user');
        } else {
            Alert::error('Failed Update Account');
            return redirect()->back();
        }
    }

    public function delete($id){
        $user = User::findOrFail($id);

        if ($user->delete()) {
            Alert::success('Successfully Delete Account');
            return redirect()->back();
        } else {
            Alert::error('Failed Delete Account');
            return redirect()->back();
        }
    }
}

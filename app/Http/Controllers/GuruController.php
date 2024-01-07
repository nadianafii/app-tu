<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    public function index()
    {
        $guru  = User::where("role", "guru")->get();
        return view('data-guru.index', compact('guru'));
    }

    public function create()
    {
        return view('data-guru.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => "guru",
            'password' => Hash::make(substr($request->name, 0, 3) . substr($request->email, 0, 3)),
        ]);

        return redirect()->route('guru.index')->with('success'. 'Berhasil menambahkan data Guru!');
    }

    public function edit($id)
    {
        $staff = User::find($id);
        return view('data-guru.edit', compact('guru'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'nullable|min:5',
        ]);

        $userData = [
            'name' => $request->name,
            'email' => $request->email,
        ];
        if ($request->password !==null) {
            $userData['password'] = Hash::make($request->password);
        }

        User::where('id', $id)->update($userData);

        return redirect()->route('guru.index')->with('success', 'Berhasil mengubah data Guru!');
    }

    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect()->route('guru.index')->with('deleted', 'Berhasil menghapus data Guru!');
    }
}
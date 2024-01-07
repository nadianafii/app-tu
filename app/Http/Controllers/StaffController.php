<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public function index()
    {
        $staff  = User::where("role", "staff")->get();
        return view('data-staff.index', compact('staff'));
    }

    public function create()
    {
        return view('data-staff.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required',
        ]);

        $email = substr($request->email, 0, 3);
        $name = substr($request->name, 0, 3);
        $hashedPassword = Hash::make($name . $email);
    
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hashedPassword,
            'role' => 'staff',
        ]);

        return redirect()->route('staff.index')->with('success', 'Berhasil menambahkan data pengguna!');
    }

    public function edit($id)
    {
        $staff = User::find($id);
        return view('data-staff.edit', compact('staff'));
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

        return redirect()->route('staff.index')->with('success', 'Berhasil mengubah data Staff!');
    }

    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect()->route('staff.index')->with('deleted', 'Berhasil menghapus data Staff!');
    }
}
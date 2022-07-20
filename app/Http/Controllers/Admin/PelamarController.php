<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;

class PelamarController extends Controller
{
    public function index()
    {
        $data = User::orderBy('nama')->get();
        return view('admin.pelamar.index', compact('data') );
    }

    public function create()
    {
        return view('admin.pelamar.create');
    }

    public function store(Request $request)
    {
        $validator = $request->validate(
            [
                'nama' => 'required',
                'tempat_lahir' => 'required',
                'tgl_lahir' => 'date',
                'email' => 'required|unique:pelamar|email',
                'password' => 'confirmed',
            ],
            [

                'nama:required' => 'Nama tidak boleh kosong',
                'password:confirmed' => 'Password tidak sesuai',
            ]
        );

        $data = $request->except('_token', '_method', 'password', 'password_confirmation' );

        if($request->has('password')){
            $data['password'] = bcrypt($request->passwprd);
        }

        if($request->file('foto')){
            $file = $request->file('foto');
            $ext  = $file->getClientOriginalExtension();
            $fileName = $user->nama.'.'.$ext; 
            $request->file('foto')->move("images", $fileName);
            $data['foto'] = $fileName;
        }

        if($request->file('cv')){
            $file = $request->file('cv');
            $ext  = $file->getClientOriginalExtension();
            $fileName = $user->nama.'.'.$ext; 
            $request->file('cv')->move("images", $fileName);
            $data['cv'] = $fileName;
        }

        $soal = User::create($data);

        return redirect('admin/pelamar')->with(['status'=>'Data Pelamar berhasil disimpan!']);
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.pelamar.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $validator = $request->validate(
            [
                'nama' => 'required',
                'tempat_lahir' => 'required',
                'tgl_lahir' => 'date',
                'email' => 'required|unique:pelamar,email,'.$user->id.'|email', 
                'password' => 'confirmed',
            ],
            [

                'nama:required' => 'Nama tidak boleh kosong',
                'password:confirmed' => 'Password tidak sesuai',
            ]
        );
        
        $data = $request->except('_token', '_method', 'password', 'password_confirmation' );
        if($request->has('password')){
            $data['password'] = bcrypt($request->passwprd);
        }
        if($request->file('foto')){
            $file = $request->file('foto');
            $ext  = $file->getClientOriginalExtension();
            $fileName = $user->nama.'.'.$ext; 
            $request->file('foto')->move("images", $fileName);
            $data['foto'] = $fileName;
        }
        if($request->hasFile('cv')){
            $file = $request->file('cv');
            $ext  = $file->getClientOriginalExtension();
            $fileName = 'CV '.$user->email.'.'.$ext; 
            $file->move( public_path('cv'), $fileName);
            $data['cv'] = $fileName;
        }

        $soal = User::where('id', $id)->update($data);
        return redirect('admin/pelamar')->with(['status'=>'Data pelamar berhasil diupdate!']);
    }

    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect('admin/pelamar')->with(['status','Data pelamar berhasil dihapus!']);
    }
}

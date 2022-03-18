<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;

class PelamarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function profil()
    {
        $user = User::find( Auth::guard('web')->id() );
        return view('pelamar.profil', ['user' => $user ]);
    }

    public function profilUpdate(Request $request, $id)
    {
        $validator = $request->validate(
            [
                'nama' => 'required',
                'email' => 'required|unique:admin,email,'.auth()->user()->id,
                'password' => 'confirmed',
            ],
            [

                'nama:required' => 'Nama tidak boleh kosong',
                'password:confirmed' => 'Password tidak sesuai',
            ]
        );

        $user = User::find($id);
        $data = $request->except(['_token', '_method', 'foto']);
            
        if($request->hasFile('foto')){
            $file = $request->file('foto');
            $ext  = $file->getClientOriginalExtension();
            $fileName = $user->id.'_'.$user->nama.'.'.$ext; 
            $file->move( public_path('images'), $fileName);
            $data['foto'] = $fileName;
        }
        $user->update($data);
        return redirect('profil' )->with(['status'=>'Profil berhasil diupdate!']);
        
    }

    
}

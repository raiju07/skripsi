<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Admin;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function home()
    {
        return view('admin.index');
    }

    public function profil()
    {
        $user = Admin::find( Auth::id() );
        return view('admin.profil', ['user' => $user ]);
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

        $user = Admin::find($id);
        $data = $request->except(['_token', '_method', 'foto']);
            
        if($request->hasFile('foto')){
            $file = $request->file('foto');
            $ext  = $file->getClientOriginalExtension();
            $fileName = $user->id.'_'.$user->nama.'.'.$ext; 
            $file->move( public_path('images'), $fileName);
            $data['foto'] = $fileName;
        }
        $user->update($data);
        return redirect('admin/profil' )->with(['status'=>'Profil berhasil diupdate!']);
        
    }

    public function index()
    {
        $data = Admin::where('id', '!=', auth()->id() )->orderBy('nama')->get();
        return view('admin.admin.index', compact('data'));
    }

    public function create()
    {
        return view('admin.admin.create');
    }

    public function store(Request $request)
    {
        $validator = $request->validate(
            [
                'nama' => 'required',
                'email' => 'required|unique:admin',
                //'password' => 'confirmed',
            ],
            [

                'nama:required' => 'Nama tidak boleh kosong',
            ]
        );

        $data = $request->except('_token', '_method', 'foto');
        $data['password'] = bcrypt('password');

        $user = Admin::Create($data);

        if($request->hasFile('foto')){
            $data = [];
            $file = $request->file('foto');
            $ext  = $file->getClientOriginalExtension();
            $fileName = $user->id.'_'.$user->nama.'.'.$ext; 
            $file->move( public_path('images'), $fileName);
            $data['foto'] = $fileName;
        }

        $user->update($data);

        return redirect('admin/admin')->with(['status'=>'Data Admin berhasil disimpan!']);
    }

    public function edit($id)
    {
        $data = Admin::find($id);
        return view('admin.admin.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $user = Admin::find($id);
        $validator = $request->validate(
            [
                'nama' => 'required',
                'email' => 'required|unique:admin,email,'.$user->id,
                'password' => 'confirmed',
            ],
            [

                'nama:required' => 'Nama tidak boleh kosong',
                'password:confirmed' => 'Password tidak sesuai',
            ]
        );

        $data = $request->except(['_token', '_method', 'foto']);
            
        if($request->hasFile('foto')){
            $file = $request->file('foto');
            $ext  = $file->getClientOriginalExtension();
            $fileName = $user->id.'_'.$user->nama.'.'.$ext; 
            $file->move( public_path('images'), $fileName);
            $data['foto'] = $fileName;
        }

        $user->update($data);
        return redirect('admin/admin')->with(['status'=>'Data admin berhasil diupdate!']);
    }

    public function destroy($id)
    {
        Admin::where('id', $id)->delete();
        return redirect('admin/admin')->with(['status'=>'Data admin berhasil dihapus!']);
    }


}
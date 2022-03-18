<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Lowongan;

class LowonganController extends Controller
{
    public function index()
    {
        $data = Lowongan::all();
        return view('admin.lowongan.index', compact('data') );
    }

    public function create()
    {
        return view('admin.lowongan.create');
    }

    public function store(Request $request)
    {
        $validator = $request->validate(
            [
                'departemen' => 'required',
                "jabatan"     => "required",
                "deskripsi"     => "required",
            ],
            [

                'departemen:required' => 'departemen tidak boleh kosong',
                'jabatan:required' => 'jabatan tidak boleh kosong',
                'deskripsi:required' => 'deskripsi tidak boleh kosong',
            ]
        );

        $data = $request->except('_token', '_method');
        $lowongan = Lowongan::Create($data);
        return redirect('admin/lowongan')->with(['status'=>'Data Lowongan berhasil disimpan!']);
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $lowongan = Lowongan::find($id);
        return view('admin.lowongan.edit', compact('lowongan'));
    }

    public function update(Request $request, $id)
    {
        $validator = $request->validate(
            [
                'departemen' => 'required',
                "jabatan"     => "required",
                "deskripsi"     => "required",
            ],
            [

                'departemen:required' => 'departemen tidak boleh kosong',
                'jabatan:required' => 'jabatan tidak boleh kosong',
                'deskripsi:required' => 'deskripsi tidak boleh kosong',
            ]
        );

        $data = $request->except('_token', '_method');
        $lowongan = Lowongan::where('id', $id)->Update($data);
        return redirect('admin/lowongan')->with(['status'=>'Data tagihan berhasil diupdate!']);
    }

    public function destroy($id)
    {
        Lowongan::where('id', $id)->delete();
        return redirect('admin/lowongan')->with(['status' => 'Data tagihan berhasil dihapus!']);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Lamaran;

class LamaranController extends Controller
{
    public function index()
    {
        $data = Lamaran::orderBy('nilai_ujian')->orderBy('nilai_wawancara')->get();
        return view('admin.lamaran.index', compact('data') );
    }

    public function edit($id)
    {
        $lamaran = Lamaran::find($id);
        return view('admin.lamaran.edit', compact('lamaran'));
    }

    public function update(Request $request, $id)
    {
        $validator = $request->validate(
            [
                'nilai_ujian' => 'required:numeric',
                "nilai_wawancara"     => "required:numeric",
                "status"     => "required|string",
            ],
            [

                'nilai_ujian:required' => 'nilai ujian tidak boleh kosong',
                'nilai_wawancara:required' => 'nilai wawancara tidak boleh kosong',
                'status:required' => 'status tidak boleh kosong',
            ]
        );

        $data = $request->except('_token', '_method');
        $hasil = Lamaran::where('id', $id)->Update($data);
        return redirect('admin/lamaran')->with(['status'=>'Data lamaran berhasil diupdate!']);
    }

}

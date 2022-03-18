<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Soal;

class SoalController extends Controller
{

    public function index()
    {
        $data = Soal::all();
        return view('admin.soal.index', compact('data') );
    }

    public function create()
    {
        return view('admin.soal.create');
    }

    public function store(Request $request)
    {
        $validator = $request->validate(
            [
                'soal' => 'required',
                "jawaban"     => "required",
            ],
            [

                'soal:required' => 'Soal tidak boleh kosong',
                'jawaban:required' => 'Soal tidak boleh kosong',
            ]
        );

        $data = $request->except('_token', '_method');
        $soal = Soal::Create($data);
        return redirect('admin/soal')->with(['status'=>'Data Soal berhasil disimpan!']);
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $soal = Soal::find($id);
        return view('admin.soal.edit', compact('soal'));
    }

    public function update(Request $request, $id)
    {
        $validator = $request->validate(
            [
                'soal' => 'required',
                "jawaban"     => "required",
            ],
            [

                'soal:required' => 'Soal tidak boleh kosong',
                'jawaban:required' => 'Soal tidak boleh kosong',
            ]
        );

        $data = $request->except('_token', '_method');
        $soal = Soal::where('id', $id)->Update($data);
        return redirect('admin/soal')->with(['status'=>'Data tagihan berhasil diupdate!']);
    }

    public function destroy($id)
    {
        Soal::where('id', $id)->delete();
        return redirect('admin/soal')->with(['status' => 'Data tagihan berhasil dihapus!']);
    }
}

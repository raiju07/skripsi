<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Soal;
use App\Lamaran;
use App\Jawaban;

class UjianController extends Controller
{
    public function index()
    {
    	if(auth()->user()->lamaran()->count() == 0){
    		return redirect()->back()->with(['status'=>'Silahkan melamar posisi yang diinginkan terlebih dahulu!']);
    	}

    	if(auth()->user()->jawabans()->exists()){
    		return redirect('hasil')->with(['status'=>'Anda sudah mengikuti ujian sebelumnya!']);
    	}

        $data = Soal::all();
        return view('pelamar.ujian.index', compact('data') );
    }

    public function create()
    {
        return view('pelamar.ujian.create');
    }

    public function store(Request $request)
    {
    	//return dd($request);
        $validator = $request->validate([
                'jawaban' => 'required',
                'soal_id.*' => 'required|numeric',
                'jawaban.*' => 'nullable',
            ]);

        $soal_id = $request->soal_id;
        $jawaban_soal = $request->jawaban_soal;
        $jawaban = $request->jawaban;
        $data = [];
        $pelamar_id = auth()->guard('web')->id();
        $lamaran = Lamaran::where('pelamar_id', $pelamar_id)->first();
        $rata = 100 / sizeof($jawaban_soal);
        $nilai = 0;

        foreach ($jawaban as $i => $v) {
        	$nilai += $jawaban_soal[$i] == $v ? $rata : 0;
        	$data[] = [
        		'pelamar_id' => auth()->guard('web')->id(),
        		'soal_id' => $soal_id[$i],
        		'jawaban' => $v,
        	];
        	
        }

        $insert = Jawaban::insert($data);
        $lamaran->update([ 'nilai_ujian' => round($nilai),'status' => 'proses' ]);

        return redirect('/hasil')->with(['status'=>'Data ujian berhasil disimpan!']);
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $lowongan = Lowongan::find($id);
        return view('pelamar.ujian.edit', compact('lowongan'));
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
            ]);

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

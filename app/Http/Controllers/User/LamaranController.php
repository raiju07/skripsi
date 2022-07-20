<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Lamaran;

class LamaranController extends Controller
{

    public function index()
    {
        $lamaran = Lamaran::with([
            'lowongan'
        ])->where('pelamar_id', auth()->guard('web')->user()->id )->get();
        
        $active_ngelamar = Lamaran::where([
            'pelamar_id' =>  auth()->guard('web')->user()->id 
        ])
        ->whereIn('status', ['daftar','proses'])
        ->count() > 0;
        
        $can = Lamaran::where([
            'pelamar_id' =>  auth()->guard('web')->user()->id 
        ])
        ->whereIn('status', [ 'lulus','daftar','proses'])
        ->count() > 0 ? false : true;

        return view('pelamar.lamaran.index', compact('lamaran','active_ngelamar', 'can') );
    }

    public function create()
    {
        return view('pelamar.lamaran.create');
    }

    public function store(Request $request)
    {
        $validator = $request->validate(
            [
                "lowongan_id"     => "required",
            ],
            [
                'lowongan_id:required' => 'Lowongan tidak boleh kosong',
            ]
        );
        
        //if(Lamaran::where('pelamar_id', auth()->guard('web')->user()->id )->exists() && !$gagal){
        $active_ngelamar = Lamaran::where([
            'pelamar_id' =>  auth()->guard('web')->user()->id 
        ])
        ->whereIn('status', ['daftar'])
        ->count() > 0 ? true : false;

        if( $active_ngelamar && Lamaran::where('pelamar_id', auth()->guard('web')->user()->id )->exists()){
            return redirect()->back()->withErrors(['Anda sudah melamar sebelumnya!']);
        }

        $data = $request->except('_token', '_method');
        $data = array_merge($data, ['pelamar_id' => auth()->guard('web')->user()->id ]);
        $store = Lamaran::Create($data);

        $lamaran = Lamaran::with([
            'lowongan'
        ])->where('id', $store->id)->first();

        $status = [ 'status' => 'Data lamaran berhasil disimpan!'];

        return redirect( url('/lamaran') );
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        //$lamaran = Lamaran::find($id);
        //return view('pelamar.lamaran.edit', compact('lamaran'));
    }

    public function update(Request $request, $id)
    {
        $validator = $request->validate(
            [
                "lowongan_id"     => "required",
            ],
            [

                'lowongan_id:required' => 'Lowongan tidak boleh kosong',
            ]
        );

        $data = $request->except('_token', '_method');
        $lamaran = Lamaran::where('id', $id)->Update($data);
        return redirect('/')->with(['status'=>'Data lamaran berhasil diupdate!']);
    }

    public function destroy($id)
    {
        Lamaran::where('id', $id)->delete();
        return redirect('/')->with(['status' => 'Data lamaran berhasil dihapus!']);
    }
}

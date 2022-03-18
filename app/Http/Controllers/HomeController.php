<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lowongan;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('index');
    }

    public function index()
    {
        return view('home');
    }

    public function welcome(Request $request){

        $lowongans = Lowongan::where(function($q) use($request){
            if($request->has('cari')){
                if( $request->filled('cari') && $request->cari != '' ){
                    $q->where('departemen', 'like', '%' . $request->cari . '%');
                    $q->orWhere('jabatan', 'like', '%' . $request->cari . '%');
                    $q->orWhere('deskripsi', 'like', '%' . $request->cari . '%');
                }
            }
        });

        $lowongans = $lowongans->paginate(2);
        $data = '';
        if ($request->ajax()) {

            foreach ($lowongans as $lowongan) {
                $data .= '
                    <div class="col-md-4 align-center">
                        <div class="card shadow rounded">
                            <div class="card-header text-center">
                                <h4 class="card-title">'.$lowongan->jabatan.' '.$lowongan->departemen.'</h4>
                            </div>
                            <div class="card-body p-3">
                                <span class="m-b-15 d-block deskripsi">'.( strlen($lowongan->deskripsi) <= 100 ? $lowongan->deskripsi : substr($lowongan->deskripsi, 0, 100).' <br>....' ).'</span>
                                <small class="text-muted"><a href="'.(route('show.lowongan', $lowongan->id)).'" >selengkapnya</a></small>
                            </div>
                            <div class="card-footer text-right">

                                <form action="'.url('lamaran').'" method="POST" class="d-inline">
                                    <input type="hidden" name="_token" value="'.csrf_token().'"/>
                                    <input type="hidden" name="lowongan_id" value="'.$lowongan->id.'"/>
                                    <button class="btn btn-cyan btn-sm">Lamar sekarang</button>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                ';
            }

            return response()->json($data);
        }
        return view('welcome');
    }

    public function showLowongan($id){
        $lowongan = Lowongan::find($id);
        return view('lowongan', compact('lowongan'));
    }
}

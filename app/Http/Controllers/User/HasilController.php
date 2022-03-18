<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Lamaran;

class HasilController extends Controller
{
    public function index(){
    	$lamaran = Lamaran::where('pelamar_id',auth()->guard('web')->id())->first();
    	return view('pelamar.ujian.hasil', compact('lamaran'));
    }
}

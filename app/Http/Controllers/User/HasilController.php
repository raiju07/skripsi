<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Lamaran;

class HasilController extends Controller
{
    public function index(){
    	$lamarans = Lamaran::where('pelamar_id',auth()->guard('web')->id())->get();
    	return view('pelamar.ujian.hasil', compact('lamarans'));
    }
}

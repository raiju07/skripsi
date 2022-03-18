<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;

class ProfilController extends Controller
{
    public function index()
    {
        //
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $validator = $request->validate(
            [
                'nama' => 'required',
                "email"     => "required|unique",
            ],
            [

                'nama:required' => 'Nama tidak boleh kosong',
                'email:required' => 'Email tidak boleh kosong',
            ]
        );
        $user = User::find($id);
        $data = $request->except('_token', '_method', 'foto');

        if($request->file('foto')){
            $file = $request->file('foto');
            $ext  = $file->getClientOriginalExtension();
            $fileName = $user->nama.'.'.$ext; 
            $request->file('foto')->move("images", $fileName);
            $image = $fileName;
        }

        $user->update($data);

        return redirect('admin/soal')->with(['status'=>'Data Pribadi berhasil disimpan!']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

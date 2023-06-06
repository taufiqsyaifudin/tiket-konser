<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use Illuminate\Http\Request;

class TiketController extends Controller
{
    public function Home()
    {
        return view('home');
    }

    public function PostTiket(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required',
            'telp' => 'required'
        ]);

        Tiket::create([
            'nama'     => $request->nama,
            'email'   => $request->email,
            'telp'   => $request->telp,
            'status' => $request->status == 'on' ? 1 : 0
        ]);

        return redirect()->route('home')->with(['success' => 'Data Berhasil Disimpan!']);
    }
}

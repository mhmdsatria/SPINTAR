<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konsultasi;

class KonsultasiController extends Controller
{
    public function create()
    {
        return view('konsultasi');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'no_wa' => 'required|string|max:20',
            'instansi' => 'nullable|string|max:255',
            'email' => 'required|email',
            'tanggal' => 'required|date',
            'waktu' => 'required',
            'deskripsi' => 'required|string',
            'file' => 'nullable|file|max:2048|mimes:pdf,jpg,jpeg,png,doc,docx',
        ]);

        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('konsultasi_files', 'public');
        }

        Konsultasi::create([
            'nama_lengkap' => $request->nama_lengkap,
            'no_wa' => $request->no_wa,
            'instansi' => $request->instansi,
            'email' => $request->email,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'deskripsi' => $request->deskripsi,
            'file' => $filePath,
        ]);

        return back()->with('success', 'Konsultasi berhasil dikirim!');
    }
}

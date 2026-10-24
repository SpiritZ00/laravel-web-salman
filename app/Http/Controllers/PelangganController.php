<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ubah nama variabelnya di sini
        $dataPelanggan = Pelanggan::all();

        return view('admin.pelanggan.index', compact('dataPelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Jika ingin melakukan debug data form sesuai tugas modul:
        // dd($request->all());
        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'birthday'   => 'required|date',
            'gender'     => 'required|in:Male,Female',
            'email'      => 'required|email',
            'phone'      => 'required|numeric',
        ]);

        Pelanggan::create($request->all());

        return redirect()->route('pelanggan.index')->with('success', 'Penambahan Data Berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['dataPelanggan'] = Pelanggan::findOrFail($id);
        return view('admin.pelanggan.edit', $data);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'birthday'   => 'required|date',
            'gender'     => 'required|in:Male,Female',
            'email'      => 'required|email',
            'phone'      => 'required|numeric',
        ]);

        $dataPelanggan = Pelanggan::findOrFail($id);
        $dataPelanggan->update($request->all());

        return redirect()->route('pelanggan.index')->with('success', 'Data Berhasil Diubah');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataPelanggan = Pelanggan::findOrFail($id);
        $dataPelanggan->delete();

        return redirect()->route('pelanggan.index')->with('success', 'Data Berhasil Dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PropertiJual;

class CRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        $properti = $user->role === 'admin' ? PropertiJual::all() : PropertiJual::where('id_user', $user->id)->get();

        return view('crud.index', compact('properti'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('properti.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        PropertiJual::create([
            'id_kategori' => $request->id_kategori,
            'id_user' => Auth::id(),
            'judul' => $request->judul,
            'no_telepon' => $request->no_telepon,
            'harga' => $request->harga,
            'lokasi' => $request->lokasi,
            'kamar_tidur' => $request->kamar_tidur,
            'kamar_mandi' => $request->kamar_mandi,
            'gambar' => $request->gambar,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('crud.index')->with('success', 'Data berhasil disimpan.');
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
        $properti = PropertiJual::findOrFail($id);

        if (Auth::user()->role !== 'admin' && $properti->id_user !== Auth::id()) {
            return view('crud.edit', compact('properti'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $properti = PropertiJual::findOrFail($id);

        $properti->update($request->all());

        return redirect()->route('crud.index')->with('success', 'Data berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $properti = PropertiJual::findOrFail($id);

        if (Auth::user()->role !== 'admin' && $properti->id_user !== Auth::id()) {
            return redirect()->route('crud.index')->with('error', 'Anda tidak memiliki akses.');
        }

        $properti->delete();

        return redirect()->route('crud.index')->with('success', 'Data berhasil dihapus.');
    }
}

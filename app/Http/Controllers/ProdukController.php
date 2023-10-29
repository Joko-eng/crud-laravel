<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produks = Produk::all();
        return view('produks.index', compact('produks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kode' => 'required',
            'nama' => 'required',
            'stok' => 'required',
            'image'=> 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() .'.'. $file->getClientOriginalExtension();
            $request->file('image')->move('storage/images', $filename);
        }else {
            $filename = null;
        }

        Produk::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'stok' => $request->stok,
            'image'=> $filename
        ]);
        return redirect()->route('produk')->with('succes ', 'Data Berhasil Disimpan');
    
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
        $produks = Produk::findOrFail($id);
        return view('produks/edit', compact('produks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'kode' => 'required',
            'nama' => 'required',
            'stok' => 'required',
        ]);

        $produk = Produk::findOrFail($id);
        $produk->update([
            $produk->kode = $request->kode,
            $produk->nama = $request->nama,
            $produk->stok = $request->stok
        ]);
        return redirect()->route('produk')->with('success', 'produks berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produks = Produk::findOrFail($id);
        $produks->delete();

        return redirect()->route('produk')->with(['succes' => 'Data Berhasil dihapus']);
    }
}

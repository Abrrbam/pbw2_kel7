<?php

namespace App\Http\Controllers;

use App\Models\Kost;
use App\Http\Requests\StoreKostRequest;
use App\Http\Requests\UpdateKostRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use function Laravel\Prompts\table;

class KostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kost/index', [
            'kosts' => DB::table('kosts')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kost/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKostRequest $request)
    {
        $validateData = $request->validate([
            'nama_kost' => 'required',
            'nama_daerah' => 'required',
            'kontak' => 'required',
            'alamat' => 'required',
            'tipe_kost' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'foto' => 'required|image|file|max:2048'
        ]);

        if ($request->file('foto')) {
            $validateData['foto'] = $request->file('foto')->store('/foto-kost');
        }
        Kost::create($validateData);
        return redirect('/kost');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kost $kost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $editKost = DB::table('kosts')->where('id_kost', $id)->get();
        return view('kost/update', [
            'kost' => $editKost[0]
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKostRequest $request, $id)
    {
        $validatedData = $request->validate([
            'nama_kost' => 'required',
            'nama_daerah' => 'required',
            'kontak' => 'required',
            'alamat' => 'required',
            'tipe_kost' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'foto' => 'required|image|file|max:2048'
        ]);

        if ($request->file('foto')) {
            if ($request->fotoLama) {
                Storage::delete($request->fotoLama);
            }
            $validatedData['foto'] = $request->file('foto')->store('/foto-kost');
        }
        Kost::where('id_kost', $id)->update($validatedData);
        return redirect('/kost');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $deleteData = DB::table('kosts')->select('foto')
                ->where('id_kost', $id)
                ->get();
        if ($deleteData[0]->foto) {
            Storage::delete($deleteData[0]->foto);
        }
        Kost::destroy($id);
        return redirect('/kost');
    }
}

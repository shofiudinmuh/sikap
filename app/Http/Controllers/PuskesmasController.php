<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Kota;
use App\Models\Puskesmas;
use Illuminate\Http\Request;

class PuskesmasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kota = Kota::all()->pluck('nama_kota', 'id_kota');
        $kecamatan = Kecamatan::all()->pluck('nama_kecamatan', 'id_kecamatan');
        $kelurahan = Kelurahan::all()->pluck('nama_desa', 'id_desa');

        return view('puskesmas.index', compact('kota', 'kecamatan', 'kelurahan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $puskesmas = Puskesmas::leftJoin('kota', 'kota.id_kota', 'puskesmas.id_kota')
            ->leftJoin('kecamatan', 'kecamatan.id_kecamatan', 'puskesmas.id_kecamatan')
            ->leftJoin('desa', 'desa.id_desa', 'puskesmas.id_desa')
            ->get();

        return datatables()
            ->of($puskesmas)
            ->addIndexColumn()
            ->addColumn('aksi', function ($puskesmas) {
                return '
            <div class="btn-group">
                    <button onclick="editForm(`' . route('puskesmas.update', $puskesmas->id_puskesmas) . '`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                    <button onclick="deleteData(`' . route('puskesmas.destroy', $puskesmas->id_puskesmas) . '`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                </div>
            ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $puskesmas = new Puskesmas();
        $puskesmas->nama_puskesmas = $request->nama_puskesmas;
        $puskesmas->alamat = $request->alamat;
        $puskesmas->telepon = $request->telepon;
        $puskesmas->email = $request->email;
        $puskesmas->id_kota = $request->id_kota;
        $puskesmas->id_kecamatan = $request->id_kecamatan;
        $puskesmas->id_desa = $request->id_desa;

        $puskesmas->save();

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $puskesmas = Puskesmas::find($id);

        return response()->json($puskesmas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $puskesmas = Puskesmas::find($id);
        $puskesmas->nama_puskesmas = $request->nama_puskesmas;
        $puskesmas->alamat = $request->alamat;
        $puskesmas->telepon = $request->telepon;
        $puskesmas->email = $request->email;
        $puskesmas->id_kota = $request->id_kota;
        $puskesmas->id_kecamatan = $request->id_kecamatan;
        $puskesmas->id_desa = $request->id_desa;

        $puskesmas->update();

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $puskesmas = Puskesmas::find($id);
        $puskesmas->delete();

        return response()->json('Data berhasil dihapus', 200);
    }
}
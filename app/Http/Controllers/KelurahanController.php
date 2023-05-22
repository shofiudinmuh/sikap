<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kecamatan = Kecamatan::all()->pluck('nama_kecamatan', 'id_kecamatan');

        return view('kelurahan.index', compact('kecamatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function data()
    {
        $kelurahan = Kelurahan::leftJoin('kecamatan', 'kecamatan.id_kecamatan', 'desa.id_kecamatan')
            ->select('desa.*', 'nama_kecamatan')
            ->get();

        return datatables()
            ->of($kelurahan)
            ->addIndexColumn()
            ->addColumn('aksi', function ($kelurahan) {
                return '
                <div class="btn-group">
                    <button onclick="editForm(`' . route('kelurahan.update', $kelurahan->id_desa) . '`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                    <button onclick="deleteData(`' . route('kelurahan.destroy', $kelurahan->id_desa) . '`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
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
        $kelurahan = new Kelurahan();
        $kelurahan->nama_desa = $request->nama_desa;
        $kelurahan->id_kecamatan = $request->id_kecamatan;
        $kelurahan->save();

        return response()->json('Kelurahan berhasil disimpan', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kelurahan = Kelurahan::find($id);

        return response()->json($kelurahan);
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
        $kelurahan = Kelurahan::find($id);
        $kelurahan->nama_desa = $request->nama_desa;
        $kelurahan->id_kecamatan = $request->id_kecamatan;
        $kelurahan->update();

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
        $kelurahan = Kelurahan::find($id);
        $kelurahan->delete();

        return response()->json('Data berhasil dihapus', 200);
    }
}

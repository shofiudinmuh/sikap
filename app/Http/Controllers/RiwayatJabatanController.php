<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatJabatan;
use App\Http\Controllers\Controller;

class RiwayatJabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $riwayat_jabatan = RiwayatJabatan::with('sk', 'biodata', 'kecamatan', 'desa', 'jabatan')->where('id_biodata', $id)->get();
        // return datatables()
        //     ->of($riwayat_jabatan)
        //     ->addIndexColumn()
        //     // ->addColumn('aksi', function ($riwayat_jabatan) {
        //     //     return '
        //     // <div class="btn-group">
        //     //     <a href="' . route('biodata.show', $riwayat_jabatan->id_biodata) . '" class="btn btn-xs btn-primary btn-flat"><i class="fa fa-eye"></i></a>
        //     //     <a href="' . route('biodata.edit', $riwayat_jabatan->id_biodata) . '" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></a>
        //     //     <button onclick="deleteData(`' . route('biodata.destroy', $biodata->id_biodata) . '`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
        //     //     </div>
        //     // ';
        //     // })
        //     // ->rawColumns(['aksi'])
        //     ->make(true);
        // dd($riwayat_jabatan);
        return view('biodata.jabatan', compact('riwayat_jabatan'));
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
        //
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

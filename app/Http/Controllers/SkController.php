<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Http\Request;
use App\Models\RiwayatJabatan;
use App\Http\Controllers\Controller;
use App\Models\Biodata;
use App\Models\Jabatan;
use App\Models\Sk;

class SkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sk.index');
    }

    public function data()
    {
        $sk = RiwayatJabatan::leftJoin('sk', 'sk.id_sk', 'detail_jabatan.id_sk')
            ->leftJoin('kecamatan', 'kecamatan.id_kecamatan', 'detail_jabatan.id_kecamatan')
            ->leftJoin('desa', 'desa.id_desa', 'detail_jabatan.id_desa')
            ->leftJoin('jabatan', 'jabatan.id_jabatan', 'detail_jabatan.id_jabatan')
            // ->orderBy('id_sk', 'DESC')
            ->get();
        return datatables()
            ->of($sk)
            ->addIndexColumn()
            ->addColumn('aksi', function ($biodata) {
                // return '
                // <div class="btn-group">
                //     <a href="' . route('biodata.show', $biodata->id_biodata) . '" class="btn btn-xs btn-primary btn-flat"><i class="fa fa-eye"></i></a>
                //     <a href="' . route('biodata.edit', $biodata->id_biodata) . '" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></a>
                //     <button onclick="deleteData(`' . route('biodata.destroy', $biodata->id_biodata) . '`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                //     </div>
                // ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function data_kader()
    {
        $biodata = Biodata::leftJoin('kecamatan', 'kecamatan.id_kecamatan', 'biodata.id_kecamatan')
            ->leftJoin('desa', 'desa.id_desa', 'biodata.id_desa')
            ->orderBy('id_biodata', 'DESC')
            ->get();

        // return response()->json($biodata);

        return datatables()
            ->of($biodata)
            ->addIndexColumn()
            ->addColumn('aksi', function ($biodata) {
                return '
            <div class="btn-group">
                <input class="lg-5" type="checkbox" name="id_biodata" wire:model="mySelected"
                    value="' . ($biodata->id_biodata) . '">
                </div>
            ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kecamatan = Kecamatan::all()->pluck('nama_kecamatan', 'id_kecamatan');
        $kelurahan = Kelurahan::all()->pluck('nama_desa', 'id_desa');
        $jabatan = Jabatan::all()->pluck('nama_jabatan', 'id_jabatan');
        $biodata = Biodata::all();

        // dd($biodata)->all();
        return view('sk.create', compact('kecamatan', 'kelurahan', 'jabatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sk = new Sk();
        $sk->no_sk = $request->no_sk;
        $sk->tgl_sk = $request->tgl_sk;
        if ($request->hasFile('path_file')) {
            $file = $request->file('path_file');
            $nama = 'SK-' . date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/file'), $nama);

            $sk->file = "/file/$nama";
        }
        $sk->save();

        Riwayatjabatan::create([
            'tahun' => $request->tahun,
            'id_jabatan' => $request->id_jabatan,
            'id_sk' => $sk->id_sk,
            'id_biodata' => $request->id_biodata,
            'id_desa' => $request->id_desa,
            'id_kecamatan' => $request->id_kecamatan,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Biodata;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\RiwayatJabatan;
use Illuminate\Http\Request;

class BiodataController extends Controller
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
        $bank = Bank::all()->pluck('nama_bank', 'id_bank');
        return view('biodata.index', compact('kota', 'kecamatan', 'kelurahan', 'bank'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $biodata = Biodata::leftJoin('kota', 'kota.id_kota', 'biodata.id_kota')
            ->leftJoin('kecamatan', 'kecamatan.id_kecamatan', 'biodata.id_kecamatan')
            ->leftJoin('desa', 'desa.id_desa', 'biodata.id_desa')
            ->leftJoin('bank', 'bank.id_bank', 'biodata.id_bank')
            ->orderBy('id_biodata', 'DESC')
            ->get();

        return datatables()
            ->of($biodata)
            ->addIndexColumn()
            ->addColumn('aksi', function ($biodata) {
                return '
            <div class="btn-group">
                <a href="' . route('biodata.show', $biodata->id_biodata) . '" class="btn btn-xs btn-primary btn-flat"><i class="fa fa-eye"></i></a>
                <a href="' . route('biodata.edit', $biodata->id_biodata) . '" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></a>
                <button onclick="deleteData(`' . route('biodata.destroy', $biodata->id_biodata) . '`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                </div>
            ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        $kota = Kota::all()->pluck('nama_kota', 'id_kota');
        $kecamatan = Kecamatan::all()->pluck('nama_kecamatan', 'id_kecamatan');
        $kelurahan = Kelurahan::all()->pluck('nama_desa', 'id_desa');
        $bank = Bank::all()->pluck('nama_bank', 'id_bank');

        return view('biodata.create', compact('kota', 'kecamatan', 'kelurahan', 'bank'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $biodata = new Biodata();
        $biodata->nik = $request->nik;
        $biodata->nama_kader = $request->nama_kader;
        $biodata->tempat_lahir = $request->tempat_lahir;
        $biodata->tgl_lahir = $request->tgl_lahir;
        $biodata->alamat = $request->alamat;
        $biodata->nohp = $request->nohp;
        $biodata->email = $request->email;
        $biodata->id_bank = $request->id_bank;
        $biodata->norek = $request->norek;
        $biodata->id_kota = $request->id_kota;
        $biodata->id_kecamatan = $request->id_kecamatan;
        $biodata->id_desa = $request->id_desa;
        if ($request->hasFile('path_foto')) {
            $file = $request->file('path_foto');
            $nama = 'FOTO-' . date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/img'), $nama);

            $biodata->foto = "/img/$nama";
        }

        $biodata->save();

        return redirect(route('biodata.index'))->with('toast_success', 'Data Kader Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $biodata = Biodata::with('bank', 'kota', 'kecamatan', 'desa')->findOrFail($id);

        return view('biodata.show', compact('biodata'));
    }

    //controller riwayat jabatan
    // public function riwayat($id)
    // {
    //     $riwayat_jabatan = RiwayatJabatan::with('sk', 'biodata', 'kecamatan', 'desa', 'jabatan')->where('id_biodata', $id);
    //     return view('biodata.jabatan', compact('riwayat_jabatan'));
    // }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $biodata = Biodata::with('bank', 'kota', 'kecamatan', 'desa')->findOrFail($id);
        $kota = Kota::all()->pluck('nama_kota', 'id_kota');
        $kecamatan = Kecamatan::all()->pluck('nama_kecamatan', 'id_kecamatan');
        $kelurahan = Kelurahan::all()->pluck('nama_desa', 'id_desa');
        $bank = Bank::all()->pluck('nama_bank', 'id_bank');
        return view('biodata.edit', compact('biodata', 'kota', 'kelurahan', 'kecamatan', 'bank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $biodata = Biodata::findOrFail($request->id);
        $biodata->nik = $request->nik;
        $biodata->nama_kader = $request->nama_kader;
        $biodata->tempat_lahir = $request->tempat_lahir;
        $biodata->tgl_lahir = $request->tgl_lahir;
        $biodata->alamat = $request->alamat;
        $biodata->nohp = $request->nohp;
        $biodata->email = $request->email;
        $biodata->id_bank = $request->id_bank;
        $biodata->norek = $request->norek;
        $biodata->id_kota = $request->id_kota;
        $biodata->id_kecamatan = $request->id_kecamatan;
        $biodata->id_desa = $request->id_desa;
        if ($request->hasFile('path_foto')) {
            $file = $request->file('path_foto');
            $nama = 'FOTO-' . date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/img'), $nama);

            $biodata->foto = "/img/$nama";
        }

        $biodata->update();

        // return response()->json('Data berhasil disimpan', 200);
        return redirect(route('biodata.index'))->with('toast_success', 'Data Kader Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $biodata = Biodata::find($id);
        $biodata->delete();

        return response()->json('Data berhasil dihapus', 200);
    }
}

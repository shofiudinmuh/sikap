@extends('layouts.master')

@section('title')
Detail Kader
@endsection

@section('breadcrumb')
@parent
<li class="active">Detail Kader</li>
@endsection

@section('content')
<div class="box">
    <div class="modal-body">
        <div class="row">
            <div class="col-lg-10">
                </br>
                <div class="col-md-2">
                    <div class="mb-2 row">
                        <img class="rounded-circle" src="{{ asset($biodata->foto) }}" alt="{{ $biodata->nama_kader }}"
                            width="120" height="160">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="mb-3 row">
                        <label for="" class="col-sm-2 col-form-label"><strong>NIK</strong></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-md" id="" name="name"
                                value="{{ $biodata->nik }}" readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-2 col-form-label"><strong>Nama</strong></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-md" id="" name="name"
                                value="{{ $biodata->nama_kader }}" readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-2 col-form-label"><strong>Tempat Lahir</strong></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-md" id="" name="name"
                                value="{{ $biodata->tempat_lahir }}" readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-2 col-form-label"><strong>Tanggal Lahir</strong></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-md" id="" name="name"
                                value="{{ $biodata->tgl_lahir }}" readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-2 col-form-label"><strong>Email</strong></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-md" id="" name="name"
                                value="{{ $biodata->email }}" readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-2 col-form-label"><strong>No Telepon</strong></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-md" id="" name="name"
                                value="{{ $biodata->nohp }}" readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-2 col-form-label"><strong>Bank</strong></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-md" id="" name="name"
                                value="{{ $biodata->bank->nama_bank }}" readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-2 col-form-label"><strong>No Rekening</strong></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-md" id="" name="name"
                                value="{{ $biodata->norek }}" readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-2 col-form-label"><strong>Alamat</strong></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-md" id="" name="name"
                                value="{{ $biodata->alamat }}" readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-2 col-form-label"><strong>Kelurahan</strong></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-md" id="" name="name"
                                value="{{ $biodata->desa->nama_desa }}" readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-2 col-form-label"><strong>Kecamatan</strong></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-md" id="" name="name"
                                value="{{ $biodata->kecamatan->nama_kecamatan }}" readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-2 col-form-label"><strong>Kota</strong></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-md" id="" name="name"
                                value="{{ $biodata->kota->nama_kota }}" readonly>
                        </div>
                    </div>
                    </br>
                    <div class="mb-3 row">
                        <div class="col-sm-2 col-form-label">
                            <a href="{{ route('riwayatjabatan.show',$biodata->id_biodata) }}"
                                class="btn btn-success btn-sm btn-flat"><i class="fa fa-briefcase"></i> Riwayat
                                Jabatan</a>
                        </div>
                        <div class="col-sm-10 text-right">
                            <a href="{{ route('biodata.index') }}" class="btn btn-sm btn-flat btn-warning"><i
                                    class="fa fa-arrow-circle-left"></i> Kembali </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- @includeIf('biodata.jabatan') --}}
@endsection
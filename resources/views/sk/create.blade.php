@extends('layouts.master')

@section('title')
Tambah Kader
@endsection

@section('breadcrumb')
@parent
<li class="active">Tambah Kader</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-11">
        <div class="box">
            <form action="{{ route('sk.store') }}" method="post" class="form-biodata" data-toggle="validator"
                enctype="multipart/form-data">
                @csrf
                <div class="box-body">
                    </br>
                    <div class="alert alert-info alert-dismissible" style="display: none;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="icon fa fa-check"></i> Perubahan berhasil disimpan
                    </div>
                    <div class="form-group row mt-2">
                        <label for="" class="col-lg-2 col-lg-offset-1 control-label">Tahun</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control form-control-md" id="tahun" name="tahun"
                                value="{{ date('Y') }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label for="nosk" class="col-lg-2 col-lg-offset-1 control-label">Nomor SK</label>
                        <div class="col-lg-6">
                            <input type="text" name="no_sk" id="no_sk" class="form-control" required autofocus>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label for="tgl_sk" class="col-lg-2 col-lg-offset-1 control-label">Tanggal SK</label>
                        <div class="col-lg-6">
                            <input type="date" name="tgl_sk" id="tgl_sk" class="form-control" required autofocus>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_jabatan" class="col-lg-2 col-lg-offset-1 control-label">Jabatan</label>
                        <div class="col-lg-6">
                            <select name="id_jabatan" id="id_jabatan" class="form-control" required>
                                <option value="">Pilih Jabatan</option>
                                @foreach ($jabatan as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                                @endforeach
                            </select>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_puskesmas" class="col-lg-2 col-lg-offset-1 control-label">Puskesmas</label>
                        <div class="col-lg-6">
                            <select name="id_puskesmas" id="id_puskesmas" class="form-control" required>
                                <option value="">Pilih Puskesmas</option>
                                @foreach ($puskesmas as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                                @endforeach
                            </select>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_kecamatan" class="col-lg-2 col-lg-offset-1 control-label">Kecamatan</label>
                        <div class="col-lg-6">
                            <select name="id_kecamatan" id="id_kecamatan" class="form-control" required>
                                <option value="">Pilih Kecamatan</option>
                                @foreach ($kecamatan as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                                @endforeach
                            </select>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_desa" class="col-lg-2 col-lg-offset-1 control-label">Kelurahan</label>
                        <div class="col-lg-6">
                            <select name="id_desa" id="id_desa" class="form-control" required>
                                <option value="">Pilih Kelurahan</option>
                                @foreach ($kelurahan as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                                @endforeach
                            </select>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="path_file" class="col-lg-2 col-lg-offset-1 control-label">File</label>
                        <div class="col-lg-4">
                            <input type="file" name="path_file" class="form-control" id="path_file"
                                onchange="preview('.tampil_file', this.files[0])">
                            <span class="help-block with-errors"></span>
                            <br>
                            <div class="tampil_file"></div>
                        </div>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-stiped table-bordered">
                            <thead>
                                <th width="5%">No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>No HP</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th width="15%"><i class="fa fa-cog"></i></th>
                            </thead>
                            {{-- <tbody>
                                @foreach ($biodata as $i =>$item)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $item->nik }}</td>
                                    <td>{{ $item->nama_kader }}</td>
                                    <td>{{ $item->nohp }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>
                                        <div class="col-1">
                                            <input class="lg-5" type="checkbox" name="id" wire:model="mySelected"
                                                value="{{ $item->id_biodata }}">
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            {{ $biodata->links() }} --}}
                        </table>
                    </div>
                </div>
                <div class="box-footer text-right">
                    <button class="btn btn-sm btn-flat btn-primary"><i class="fa fa-save"></i> Simpan </button>
                    <a href="{{ route('sk.index') }}" class="btn btn-sm btn-flat btn-warning"><i
                            class="fa fa-arrow-circle-left"></i> Batal </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    let table;
    
    $(function () {
        table = $('.table').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        autoWidth: false,
        ajax: {
            url: '{{ route('sk.data_kader') }}',
        },
        columns: [
            {data: 'DT_RowIndex', searchable: false, sortable: false},
            {data: 'nik'},
            {data: 'nama_kader'},
            {data: 'nohp'},
            {data: 'email'},
            {data: 'alamat'},
            {data: 'aksi', searchable: false, sortable: false},
        ]
        });

        $('#modal-form').validator().on('submit', function (e) {
            if (! e.preventDefault()) {
                $.post($('#modal-form form').attr('action'), $('#modal-form form').serialize())
                    .done((response) => {
                        $('#modal-form').modal('hide');
                        table.ajax.reload();
                    })
                    .fail((errors) => {
                        alert('Tidak dapat menyimpan data');
                        return;
                    });
            }
        });
    });
</script>
@endpush
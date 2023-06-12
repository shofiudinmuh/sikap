@extends('layouts.master')

@section('title')
Riwayat Jabatan
@endsection

@section('breadcrumb')
@parent
<li class="active">Data Kader</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-10">
        {{-- <h3>Riwayat Jabatan {{ $riwayat_jabatan->biodata->nama_kader }}</h3> --}}
        <div class="box">
            <div class="box-header with-border">
            </div>
            <div class="box-body table-responsive">
                <table class="table table-stiped table-bordered">
                    <thead>
                        <th width="5%">No</th>
                        <th>Jabatan</th>
                        <th>Nomor SK</th>
                        <th>Tahun</th>
                        <th>Honor</th>
                        <th>Kelurahan</th>
                        <th>Kecamatan</th>
                        {{-- <th width="15%"><i class="fa fa-cog"></i></th> --}}
                    </thead>
                    <tbody>
                        @foreach ($riwayat_jabatan as $i => $item)
                        <td>{{ ++$i }}</td>
                        <td>{{ $item->jabatan->nama_jabatan }}</td>
                        <td>{{ $item->sk->no_sk }}</td>
                        <td>{{ $item->tahun }}</td>
                        <td>{{ $item->jabatan->gaji }}</td>
                        <td>{{ $item->desa->nama_desa }}</td>
                        <td>{{ $item->kecamatan->nama_kecamatan }}</td>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mb-3 row">
                <div class="col-lg-12 text-right">
                    <a href="{{ route('biodata.index') }}" class="btn btn-sm btn-flat btn-warning"><i
                            class="fa fa-arrow-circle-left"></i> Kembali </a>
                </div>
                </br>
            </div>
        </div>
    </div>
</div>

{{-- @includeIf('biodata.form') --}}
@endsection

@push('scripts')
{{-- <script>
    let table;

    $(function () {
        table = $('.table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('riwayatjabatan.show', '$id') }}',
            },
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'jabatan'},
                {data: 'no_sk'},
                {data: 'tahun'},
                {data: 'honor'},
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

    function addForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Tambah Kader');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=nama_kader]').focus();
    }

    function editForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Edit Kader');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('put');
        $('#modal-form [name=nama_kader]').focus();

        $.get(url)
            .done((response) => {
                $('#modal-form [name=nik]').val(response.nik);
                $('#modal-form [name=nama_kader]').val(response.nama_kader);
                $('#modal-form [name=tempat_lahir]').val(response.tempat_lahir);
                $('#modal-form [name=tgl_lahir]').val(response.tgl_lahir);
                $('#modal-form [name=alamat]').val(response.alamat);
                $('#modal-form [name=nohp]').val(response.nohp);
                $('#modal-form [name=email]').val(response.email);
                $('#modal-form [name=id_bank]').val(response.id_bank);
                $('#modal-form [name=norek]').val(response.norek);
                $('#modal-form [name=id_kecamatan]').val(response.id_kecamatan);
                $('#modal-form [name=id_desa]').val(response.id_desa);
                $('#modal-form [name=id_kota]').val(response.id_kota);
            })
            .fail((errors) => {
                alert('Tidak dapat menampilkan data');
                return;
            });
    }

    function deleteData(url) {
        if (confirm('Yakin ingin menghapus data terpilih?')) {
            $.post(url, {
                    '_token': $('[name=csrf-token]').attr('content'),
                    '_method': 'delete'
                })
                .done((response) => {
                    table.ajax.reload();
                })
                .fail((errors) => {
                    alert('Tidak dapat menghapus data');
                    return;
                });
        }
    }
</script> --}}
@endpush
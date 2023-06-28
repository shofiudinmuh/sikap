<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form">
    <div class="modal-dialog modal-lg" role="document">
        <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('post')

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="nik" class="col-lg-2 col-lg-offset-1 control-label">NIK</label>
                        <div class="col-lg-6">
                            <input type="number" name="nik" id="nik" class="form-control" required autofocus>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_kader" class="col-lg-2 col-lg-offset-1 control-label">Nama</label>
                        <div class="col-lg-6">
                            <input type="text" name="nama_kader" id="nama_kader" class="form-control" required
                                autofocus>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-lg-2 col-lg-offset-1 control-label">Email</label>
                        <div class="col-lg-6">
                            <input type="email" name="email" id="email" class="form-control" required autofocus>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tempat_lahir" class="col-lg-2 col-lg-offset-1 control-label">Tempat Lahir</label>
                        <div class="col-lg-6">
                            <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" required
                                autofocus>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tgl_lahir" class="col-lg-2 col-lg-offset-1 control-label">Tanggal Lahir</label>
                        <div class="col-lg-6">
                            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" required autofocus>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nohp" class="col-lg-2 col-lg-offset-1 control-label">Telepon</label>
                        <div class="col-lg-6">
                            <input type="number" name="nohp" id="nohp" class="form-control" required autofocus>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_bank" class="col-lg-2 col-lg-offset-1 control-label">Bank</label>
                        <div class="col-lg-6">
                            <select name="id_bank" id="id_bank" class="form-control" required>
                                <option value="">Pilih Bank</option>
                                @foreach ($bank as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                                @endforeach
                            </select>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="norek" class="col-lg-2 col-lg-offset-1 control-label">No Rekening</label>
                        <div class="col-lg-6">
                            <input type="number" name="norek" id="norek" class="form-control" required autofocus>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-lg-2 col-lg-offset-1 control-label">Alamat</label>
                        <div class="col-lg-6">
                            <input type="text" name="alamat" id="alamat" class="form-control" required autofocus>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_kota" class="col-lg-2 col-lg-offset-1 control-label">Kota</label>
                        <div class="col-lg-6">
                            <select name="id_kota" id="id_kota" class="form-control" required>
                                <option value="">Pilih Kota</option>
                                @foreach ($kota as $key => $item)
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
                                <option value="">Pilih Kota</option>
                                @foreach ($kelurahan as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                                @endforeach
                            </select>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="path_foto" class="col-lg-2 col-lg-offset-1 control-label">Foto</label>
                        <div class="col-lg-4">
                            <input type="file" name="path_foto" class="form-control" id="path_foto"
                                onchange="preview('.tampil_foto', this.files[0])">
                            <span class="help-block with-errors"></span>
                            <br>
                            <div class="tampil_foto"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-flat btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-sm btn-flat btn-warning" data-dismiss="modal"><i
                            class="fa fa-arrow-circle-left"></i> Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>
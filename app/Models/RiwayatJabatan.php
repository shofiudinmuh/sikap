<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatJabatan extends Model
{
    use HasFactory;

    protected $table = 'detail_jabatan';
    protected $primaryKey = 'id_detail_jabatan';
    protected $guarded = [];

    public function biodata()
    {
        return $this->belongsTo(Biodata::class, 'id_biodata');
    }
    public function sk()
    {
        return $this->belongsTo(Sk::class, 'id_sk');
    }
    public function desa()
    {
        return $this->belongsTo(Kelurahan::class, 'id_desa');
    }
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan');
    }
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'id_jabatan');
    }
}

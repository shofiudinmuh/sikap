<?php

namespace App\Models;

use App\Console\Kernel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;

    protected $table = 'biodata';
    protected $primaryKey = 'id_biodata';
    protected $guarded = [];

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'id_bank');
    }
    public function kota()
    {
        return $this->belongsTo(Kota::class, 'id_kota');
    }
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan');
    }
    public function desa()
    {
        return $this->belongsTo(Kelurahan::class, 'id_desa');
    }
}

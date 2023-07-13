<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;

    protected $fillable = ['nik', 'nama', 'jenis_kelamin', 'tgl_lahir', 'umur_bulan', 'propinsi_id', 'kota_id', 'alamat_pasien'];
    protected $table = 'penduduk';
    public function propinsi()
    {
        return $this->belongsTo(Propinsi::class, 'propinsi_id');
    }

    public function kota()
    {
        return $this->belongsTo(Kota::class, 'kota_id');
    }
}

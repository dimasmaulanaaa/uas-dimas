<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    protected $table = 'kota';

    protected $primaryKey = 'id';

    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'id', 'province_id', 'name',
    ];

    public function propinsi()
    {
        return $this->belongsTo(Propinsi::class, 'province_id', 'id');
    }

    public function penduduk()
    {
        return $this->hasMany(Penduduk::class, 'kota_id', 'id');
    }
}

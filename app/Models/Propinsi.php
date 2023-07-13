<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Propinsi extends Model
{
    protected $table = 'propinsi';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = ['name'];

    // Relationship dengan Kota
    public function kota()
    {
        return $this->hasMany(Kota::class, 'province_id', 'id');
    }
}

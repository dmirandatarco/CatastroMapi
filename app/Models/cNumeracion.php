<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cNumeracion extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_ficha',
        'fecha_generacion',
    ];

    public function ficha()
    {
        return $this->belongsTo('App\Models\Ficha','id_ficha','id_ficha');
    }
}

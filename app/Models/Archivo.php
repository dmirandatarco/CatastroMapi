<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable =[
        'imagen1',
        'imagen2',
        'imagen3',
        'rentas',
        'sunarp',
        'plano',
        'id_ficha',
    ];

    public function ficha()
    {
        return $this->belongsTo('App\Models\Ficha','id_ficha','id_ficha');
    }
}

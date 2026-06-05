<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UbicacionCertificado extends Model
{
    use HasFactory;
    public $timestamps = false;


    protected $fillable = [

        'codi_puerta',
        'tipo_puerta',
        'cuadra',
        'interior',
        'certificado_id',
        'via_id',


    ];

    public function certificados()
    {
        return $this->belongsTo('App\Models\GenerarNumeracion','certificado_id','id');
    }
    public function vias()
    {
        return $this->belongsTo('App\Models\Via','via_id','id_via');
    }
}

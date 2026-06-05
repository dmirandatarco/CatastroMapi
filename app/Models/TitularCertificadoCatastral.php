<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TitularCertificadoCatastral extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'nume_doc',
        'tipo_doc',
        'tipo_persona',
        'nombres',
        'ape_paterno',
        'ape_materno',
        'tipo_persona_juridica',
        'tipo_funcion',
        'nregistro',
        'razon_social',
        'certificado_id',
    ];
    public function certificados()
    {
        return $this->belongsTo('App\Models\GenerarCertificado','certificado_id','id');
    }
}

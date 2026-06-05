<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenerarCertificado extends Model
{
    use HasFactory;
    protected $fillable =[
        'codi_construccion',
        'nume_piso',
        'fecha',
        'mep',
        'ecs',
        'ecc',
        'estr_muro_col',
        'estr_techo',
        'acab_piso',
        'acab_puerta_ven',
        'acab_revest',
        'acab_bano',
        'inst_elect_sanita',
        'area_declarada',
        'area_verificada',
        'uca',
        'bloque',
        'certificado_id',
    ];

    public function ficha()
    {
        return $this->belongsTo('App\Models\Ficha','id_ficha','id_ficha');
    }
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function titulares()
    {
        return $this->hasMany('App\Models\TitularCertificadoCatastral','certificado_id','id');
    }
    public function ubicaciones()
    {
        return $this->hasMany('App\Models\UbicacionCertificadoCatastral','certificado_id','id');
    }
    public function construcciones()
    {
        return $this->hasMany('App\Models\ConstruccionCertificado','certificado_id','id');
    }
}




















<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConstruccionCertificado extends Model
{
    use HasFactory;
    public $timestamps = false;


    protected $fillable = [
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

}

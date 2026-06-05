<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenerarNumeracion extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_uni_cat',
        'dc',
        'area_declarada',
        'area_verificada',
        'porc_bc_terr_legal',
        'porc_bc_terr_fisc',
        'numeracion',
        'clasificacion',
        'codi_uso',
        'tipo_edificacion',
        'cont_en',
        'observaciones',
        'id_ficha',
        'fecha_emision',
        'id_usuario',
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
        return $this->hasMany('App\Models\TitularCertificado','certificado_id','id');
    }
    public function ubicaciones()
    {
        return $this->hasMany('App\Models\UbicacionCertificado','certificado_id','id');
    }
}

















<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class FichaBienComun extends Authenticatable implements AuditableContract
{

    use HasFactory,Notifiable, Auditable;
    public $timestamps = false;
    protected $table = 'tf_fichas_bienes_comunes';
    protected $fillable = [
        'cont_en',
        'clasificacion',
        'area_titulo',
        'area_declarada',
        'area_verificada',
        'en_colindante',
        'en_jardin_aislamiento',
        'en_area_publica',
        'en_area_intangible',
        'cond_declarante',
        'esta_llenado',
        'mantenimiento',
        'observaciones',
        'codi_uso',
        'nume_ficha',
    ];
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'id_ficha';

    public function getRouteKeyName()
    {
        return 'id_ficha';
    }

    public function getKeyName()
    {
        return 'id_ficha';
    }

    public function ficha()
    {
        return $this->belongsTo('App\Models\Ficha');
    }

    public function uso()
    {
        return $this->belongsTo('App\Models\UsosBc','codi_uso','codi_uso');
    }

    public function estadollenado()
    {
        return $this->belongsTo('App\Models\TablaCodigo','esta_llenado','codigo')->where('id_tabla','=','LLE');
    }
}

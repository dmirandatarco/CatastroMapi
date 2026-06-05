<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class FichaRural extends Authenticatable implements AuditableContract
{
    use HasFactory,Notifiable, Auditable;
    public $timestamps = false;
    protected $table = 'tf_ficha_rural';

    protected $fillable = [
        'cuc',
        'codigo_hoja_catastral',
        'codigo_contr_rentas',
        'codigo_predial',
        'unidad_organica',
        'unidad_catastral',
        'cod_pro',
        'cod_dep',
        'cod_dis',
        'proy_cat',
        'uni_terr',
        'nomb_valle',
        'nomb_sector',
        'nomb_predio',
        'num_foto',
        'num_ortofoto',
        'img_satelital',
        'uca_ant',
        'cord_este',
        'cord_norte',
        'datum',
        'zona',
        'codi_uso',
        'clasi_uso',
        'riego',
        'derecho_agua',
        'fuente_hidrica',
        'cercania_rio',
        'cumple_explotacion',
        'llenada_intervension',
        'observaciones',
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

    public function departamento()
    {
        return $this->belongsTo('App\Models\Ubiges','cod_dep','cod_dep');
    }

    public function provincias()
    {
        return $this->hasMany('App\Models\Ubiges','cod_pro','cod_pro');
    }

    public function distritos()
    {
        return $this->hasMany('App\Models\Ubiges','codi_dis','cod_dis');
    }

}

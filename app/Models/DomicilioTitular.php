<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class DomicilioTitular extends Authenticatable implements AuditableContract
{
    use HasFactory, Notifiable, Auditable;
    public $timestamps = false;
    protected $table = 'tf_domicilio_titulares';

    protected $fillable = [
        'id_persona',
        'codi_via',
        'tipo_via',
        'nomb_via',
        'nume_muni',
        'nomb_edificacion',
        'nume_interior',
        'codi_hab_urba',
        'nomb_hab_urba',
        'sector',
        'mzna',
        'lote',
        'sublote',
        'codi_dep',
        'codi_pro',
        'codi_dis',
        'ubicacion',
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

    public function persona()
    {
        return $this->belongsTo('App\Models\Persona');
    }
    public function ficha()
    {
        return $this->belongsTo('App\Models\Ficha');
    }

    public function departamento()
    {
        return $this->belongsTo('App\Models\Ubiges','codi_dep','cod_dep');
    }

    public function provincias()
    {
        return $this->hasMany('App\Models\Ubiges','cod_pro','codi_pro');
    }

    public function distritos()
    {
        return $this->hasMany('App\Models\Ubiges','codi_dis','codi_dis');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Via extends Authenticatable  implements AuditableContract
{
    use HasFactory, Notifiable, Auditable;

    static $rules = [
        'nomb_via' => 'required|max:100',
        'tipo_via' => 'required|max:100',
        'codi_via' => 'required|unique:tf_vias|max:6',
        'fecha_via'=> 'nullable|date',
    ];
    protected $table = 'tf_vias';

    protected $fillable = [
        'nomb_via',
        'tipo_via',
        'codi_via',
        'id_ubi_geo',
        'fecha_via',
        'estado',
    ];
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'id_via';
    public $timestamps = false;

    public function getRouteKeyName()
    {
        return 'id_via';
    }

    public function getKeyName()
    {
        return 'id_via';
    }
    public function hab_urbanas()
    {
        return $this->belongsToMany('App\Models\HabUrbana','tf_vias_hab_urba','id_via','id_hab_urba');
    }

    public function historia_vias()
    {
        return $this->hasMany('App\Models\HistoriaVia');
    }
    public function puertas()
    {
        return $this->hasMany('App\Models\Puerta');
    }
}


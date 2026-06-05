<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Actividades extends Authenticatable implements AuditableContract
{
    use HasFactory, Notifiable, Auditable;

    protected $table = 'tf_actividades';


    protected $fillable = [
        'desc_actividad',
    ];
    public $incrementing = false;

    protected $keyType = 'string';

    public $timestamps = false;

    protected $primaryKey = 'codi_actividad';

    public function getRouteKeyName()
    {
        return 'codi_actividad';
    }

    public function getKeyName()
    {
        return 'codi_actividad';
    }

    public function fichas()
    {
        return $this->belongsToMany('App\Models\Ficha','tf_autorizaciones_funcionamiento','codi_actividad','id_ficha');
    }
}

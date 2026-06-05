<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Colonial extends Authenticatable implements AuditableContract
{
    use HasFactory, Notifiable, Auditable;
    public $timestamps = false;

    protected $table = 'tf_colonial';
    protected $fillable = [
        'inmueble_declarado',
        'nombre_colonial',
        'tipo_arquitectura',
        'uso_actual',
        'uso_original',
        'num_pisos',
        'tipo_fecha',
        'fecha_construccion',
        'observaciones',
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
}

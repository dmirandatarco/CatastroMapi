<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class GanaderiaRural extends Authenticatable implements AuditableContract
{
    use HasFactory,Notifiable, Auditable;
    public $timestamps = false;
    protected $table = 'tf_ganaderia_rural';
    protected $fillable = [
        'tipo_ganaderia',
        'raza_especio',
        'cantidad_ganderia',
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

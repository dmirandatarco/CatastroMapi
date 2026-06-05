<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class UsosBc extends Authenticatable  implements AuditableContract
{
    use HasFactory, Notifiable, Auditable;

    protected $fillable = [
        'desc_uso',
    ];
    protected $table = 'tf_usos_bc';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'codi_uso';
    public $timestamps = false;
    public function getRouteKeyName()
    {
        return 'codi_uso';
    }

    public function getKeyName()
    {
        return 'codi_uso';
    }

    public function ficha_bienes_comunes()
    {
        return $this->hasMany('App\Models\FichaBienComun','codi_uso','codi_uso');
    }
}

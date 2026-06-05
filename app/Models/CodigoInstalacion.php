<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class CodigoInstalacion extends Authenticatable implements AuditableContract
{
    use HasFactory, Notifiable, Auditable;
    public $timestamps = false;

    protected $table = 'tf_codigos_instalaciones';
    protected $fillable = [
        'codi_instalacion',
        'desc_instalacion',
        'material',
        'unidad',
    ];

    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'codi_instalacion';

    public function getRouteKeyName()
    {
        return 'codi_instalacion';
    }

    public function getKeyName()
    {
        return 'codi_instalacion';
    }

    public function instalacions()
    {
        return $this->hasMany('App\Models\Instalacion');
    }
}

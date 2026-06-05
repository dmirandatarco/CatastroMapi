<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class ServicioBasico extends Authenticatable implements AuditableContract
{
    use HasFactory,Notifiable, Auditable;

    protected $primaryKey = 'id_ficha';

    public function getRouteKeyName()
    {
        return 'id_ficha';
    }

    protected $table = 'tf_servicios_basicos';
    public function getKeyName()
    {
        return 'id_ficha';
    }
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = [
        'luz',
        'agua',
        'telefono',
        'desague',
        'gas',
        'internet',
        'tvcable'
    ];

    public function ficha()
    {
        return $this->belongsTo('App\Models\Ficha');
    }
}

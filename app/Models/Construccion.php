<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Construccion extends Authenticatable implements AuditableContract
{
    use HasFactory, Notifiable, Auditable;
    public $timestamps = false;

    protected $table = 'tf_construcciones';
    protected $fillable = [
        'id_ficha',
        'codi_construccion',
        'nume_piso',
        'fecha',
        'mep',
        'ecs',
        'ecc',
        'estr_muro_col',
        'estr_techo',
        'acab_piso',
        'acab_puerta_ven',
        'acab_revest',
        'acab_bano',
        'inst_elect_sanita',
        'area_declarada',
        'area_verificada',
        'uca'
    ];
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'id_construccion';

    public function getRouteKeyName()
    {
        return 'id_construccion';
    }

    public function getKeyName()
    {
        return 'id_construccion';
    }

    public function ficha()
    {
        return $this->belongsTo('App\Models\Ficha');
    }

}

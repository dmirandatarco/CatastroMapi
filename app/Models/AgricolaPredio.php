<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class AgricolaPredio extends Authenticatable implements AuditableContract

{
    use HasFactory, Notifiable, Auditable;

    public $timestamps = false;
    protected $table = 'tf_agricola_predio';

    protected $fillable = [
        'tipo_agricola',
        'area_agricola',
        'descripcion_agricola',
        'grupo_agricola_campo',
        'clase_agricola_campo',
        'area_agricola_campo',
        'grupo_agricola_tierras',
        'clase_agricola_tierras',
        'area_agricola_tierras',
        'numero_plantas',
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

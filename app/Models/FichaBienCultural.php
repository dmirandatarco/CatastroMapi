<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class FichaBienCultural extends Authenticatable implements AuditableContract
{
    use HasFactory,Notifiable, Auditable;
    public $timestamps = false;
    protected $table = 'tf_ficha_bien_cultural';

    protected $fillable = [
        'area_titulo',
        'area_construido',
        'area_libre',
        'descripcion_fachada',
        'descripcion_interior',
        'filiacion_estilistica',
        'intervencion_inmueble',
        'resena_historica',
        'cond_declarante',
        'esta_llenado',
        'nume_habitantes',
        'nume_familias',
        'nume_ficha',
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

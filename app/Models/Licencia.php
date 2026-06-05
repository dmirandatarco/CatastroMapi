<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
class Licencia extends Authenticatable implements AuditableContract
{
    use HasFactory,Notifiable, Auditable;

    protected $fillable = [
        'nroexpediente',
        'fecha_emision',
        'fecha_vencimiento',
        'nrolicencia',
        'administrado1',
        'administrado2',
        'propietario',
        'tipolicencia',
        'uso',
        'zonificacion',
        'alturapisos',
        'alturametros',
        'departamento',
        'provincia',
        'distrito',
        'haburbana',
        'mzna',
        'lote',
        'sublote',
        'calle',
        'nro',
        'interior',
        'areatechada',
        'valorobra',
        'pisosautorizados',
        'nrosotano',
        'semisotano',
        'azotea',
        'calificacion',
        'dictamen',
        'licencia',
        'responsable',
        'codresponsable',
        'pagotramite',
        'recibo',
        'fecha_recibo',
        'observacion',
        'recomendaciones',
        'estado',
    ];
    protected function nroexpediente(): Attribute
    {
        return new Attribute(
            set: function($value){
                return mb_strtoupper($value);
            }
        );
    }

}

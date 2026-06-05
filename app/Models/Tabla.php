<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
class Tabla extends Authenticatable implements AuditableContract
{
    use HasFactory,Notifiable, Auditable;

    public $timestamps = false;
    protected $table = 'tf_tablas';

    protected $fillable = [
        'desc_tabla',
        'ultimo_codigo',
    ];
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'id_tabla';

    public function getRouteKeyName()
    {
        return 'id_tabla';
    }

    public function getKeyName()
    {
        return 'id_tabla';
    }


}

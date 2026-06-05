<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
class TablaCodigo extends Authenticatable implements AuditableContract
{
    use HasFactory,Notifiable, Auditable;
    public $timestamps = false;
    protected $table = 'tf_tablas_codigos';

    protected $fillable = [
        'id_tabla',
        'desc_codigo',
    ];
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = ['codigo','id_tabla'];

    public function getRouteKeyName()
    {
        return 'codigo';
    }

    public function getKeyName()
    {
        return 'codigo';
    }


}

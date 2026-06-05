<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class HistoriaVia extends Authenticatable implements AuditableContract
{
    use HasFactory,Notifiable, Auditable;
    public $timestamps = false;
    protected $table = 'tf_historia_via';

    protected $fillable = [
        'nomb_via_ant',
        'fecha_his_via',
        'id_via',
        'activo'
    ];
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'id_historia_via';

    public function getRouteKeyName()
    {
        return 'id_historia_via';
    }

    public function getKeyName()
    {
        return 'id_historia_via';
    }

    public function Via()
    {
        return $this->belongsTo('App\Models\Via');
    }
}

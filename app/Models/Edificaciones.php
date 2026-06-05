<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Edificaciones extends Authenticatable implements AuditableContract
{
    use HasFactory, Notifiable, Auditable;
    public $timestamps = false;
    protected $table = 'tf_edificaciones';
    protected $fillable = [
        'id_lote',
        'codi_edificacion',
        'tipo_edificacion',
        'nomb_edificacion',
        'clasificacion',
    ];
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'id_edificacion';

    public function getRouteKeyName()
    {
        return 'id_edificacion';
    }

    public function getKeyName()
    {
        return 'id_edificacion';
    }

    public function lote()
    {
        return $this->belongsTo('App\Models\Lote','id_lote','id_lote');
    }

    public function uni_cats()
    {
        return $this->hasMany('App\Models\UniCat');
    }


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Notarias extends Authenticatable implements AuditableContract
{
    use HasFactory,Notifiable, Auditable;
    public $timestamps = false;
    protected $table = 'tf_notarias';

    static $rules = [
        'nomb_notaria' => 'required|max:50'
    ];
    public $incrementing = false;
    protected $fillable = [
        'codi_notaria',
        'nomb_notaria',
        'id_ubi_geo',
        'estado',
    ];

    protected $primaryKey = 'id_notaria';
    protected $keyType = 'string';

    public function getRouteKeyName()
    {
        return 'id_notaria';
    }

    public function getKeyName()
    {
        return 'id_notaria';
    }

    public function ubigeo()
    {
        return $this->belongsTo('App\Models\Ubigeo','id_ubi_geo','id_ubi_geo');
    }

    public function registro_legals()
    {
        return $this->hasMany('App\Models\RegistroLegal');
    }
}

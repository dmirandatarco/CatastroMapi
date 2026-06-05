<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
class Sectore extends Authenticatable implements AuditableContract
{
    use HasFactory,Notifiable, Auditable;
    protected $table = 'tf_sectores';

    static $rules = [
        'codi_sector' => 'required|unique:tf_sectores,codi_sector',
        'nomb_sector' => 'required|max:20',
        'fichaindividual' => 'nullable|numeric',
        'fichacotitular' => 'nullable|numeric',
        'fichaeconomica' => 'nullable|numeric',
        'fichabiencomun' => 'nullable|numeric',
        'fichacultural' => 'nullable|numeric',
        'ficharural' => 'nullable|numeric'

    ];
    protected $fillable = [
        'ubigeo_id',
        'codi_sector',
        'nomb_sector',
        'estado',
        'fichaindividual',
        'fichacotitular',
        'fichaeconomica',
        'fichabiencomun',
        'fichacultural',
        'ficharural'
    ];
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'id_sector';
    public $timestamps = false;
    public function getRouteKeyName()
    {
        return 'id_sector';
    }

    public function getKeyName()
    {
        return 'id_sector';
    }

    public function ubigeo()
    {
        return $this->belongsTo('App\Models\Ubigeo','id_ubi_geo','id_ubi_geo');
    }

    public function manzanas()
    {
        return $this->hasMany('App\Models\Manzana','id_sector','id_sector');
    }
}

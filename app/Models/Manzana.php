<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Manzana extends Authenticatable implements AuditableContract
{
    use HasFactory,Notifiable, Auditable;
    public $timestamps = false;
    protected $table = 'tf_manzanas';
    static $rules = [
        'id_sector' => 'required',
        'codi_mzna' => 'required|max:3',
        'nume_mzna' => 'required|max:15'
    ];
    protected $fillable = [
        'id_sector',
        'codi_mzna',
        'nume_mzna',
        'estado'
    ];
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'id_mzna';

    public function sectore()
    {
        return $this->belongsTo('App\Models\Sectore','id_sector','id_sector');
    }

    public function lotes()
    {
        return $this->hasMany('App\Models\Lote','id_mzna','id_mzna');
    }

    public function getRouteKeyName()
    {
        return 'id_mzna';
    }

    public function getKeyName()
    {
        return 'id_mzna';
    }


}

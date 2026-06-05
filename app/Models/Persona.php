<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Persona extends Authenticatable implements AuditableContract
{
    use HasFactory,Notifiable, Auditable;

    public $timestamps = false;
    protected $table = 'tf_personas';

    protected $fillable = [
        'nume_doc',
        'tipo_doc',
        'tipo_persona',
        'nombres',
        'ape_paterno',
        'ape_materno',
        'tipo_persona_juridica',
        'tipo_funcion',
        'razon_social',
    ];
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'id_persona';

    public function getRouteKeyName()
    {
        return 'id_persona';
    }

    public function getKeyName()
    {
        return 'id_persona';
    }

    public function domiciliotitular($id_ficha)
    {
        return $this->hasMany('App\Models\DomicilioTitular','id_persona','id_persona')->where('id_ficha',$id_ficha)->first();
    }

    public function exoneracion_titulars()
    {
        return $this->hasMany('App\Models\Persona');
    }

    public function titulars()
    {
        return $this->hasMany('App\Models\Titular');
    }

    public function conductors()
    {
        return $this->hasMany('App\Models\Conductor');
    }

    public function litigantes()
    {
        return $this->hasMany('App\Models\Litigante');
    }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class RegistroLegal extends Authenticatable implements AuditableContract
{
    use HasFactory,Notifiable, Auditable;

    protected $fillable = [
        'id_notaria',
        'kardex',
        'fecha_escritura',
    ];
    protected $table = 'tf_registro_legal';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'id_ficha';
    public $timestamps = false;
    public function getRouteKeyName()
    {
        return 'id_ficha';
    }

    public function getKeyName()
    {
        return 'id_ficha';
    }

    public function notaria()
    {
        return $this->belongsTo('App\Models\Notarias','id_notaria','id_notaria');
    }
    public function ficha()
    {
        return $this->belongsTo('App\Models\Ficha');
    }

}

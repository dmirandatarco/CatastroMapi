<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class NormaLegal extends Authenticatable implements AuditableContract
{
    use HasFactory,Notifiable, Auditable;
    public $timestamps = false;
    protected $table = 'tf_norma_legal';
    protected $fillable = [
        'normatividad',
        'fecha_norma',
        'numero_plano',
        'tipo_norma',
    ];
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'id_ficha';

    public function getRouteKeyName()
    {
        return 'id_ficha';
    }

    public function getKeyName()
    {
        return 'id_ficha';
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Ubiges extends Authenticatable implements AuditableContract
{
    use HasFactory, Notifiable, Auditable;
    public $timestamps = false;


    protected $fillable = [
        'cod_dep',
        'cod_pro',
        'codi_dis',
        'descri',
    ];

    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'cod_dep';

    public function getRouteKeyName()
    {
        return 'cod_dep';
    }

    public function getKeyName()
    {
        return 'cod_dep';
    }

}






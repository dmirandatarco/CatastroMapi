<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Lindero extends Authenticatable implements AuditableContract
{
    use HasFactory,Notifiable, Auditable;
    public $timestamps = false;
    protected $table = 'tf_linderos';

    protected $primaryKey = 'id_ficha';

    public function getRouteKeyName()
    {
        return 'id_ficha';
    }

    public function getKeyName()
    {
        return 'id_ficha';
    }
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'fren_campo',
        'fren_titulo',
        'fren_colinda_campo',
        'fren_colinda_titulo',
        'dere_campo',
        'dere_titulo',
        'dere_colinda_campo',
        'dere_colinda_titulo',
        'izqu_campo',
        'izqu_titulo',
        'izqu_colinda_campo',
        'izqu_colinda_titulo',
        'fond_titulo',
        'fond_campo',
        'fond_colinda_campo',
        'fond_colinda_titulo'
    ];

    public function ficha()
    {
        return $this->belongsTo('App\Models\Ficha');
    }
}

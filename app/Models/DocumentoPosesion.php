<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class DocumentoPosesion extends Authenticatable implements AuditableContract
{
    use HasFactory, Notifiable, Auditable;

    public $timestamps = false;
    protected $table = 'tf_documento_posesion';

    protected $fillable = [
        'pru_ob1',
        'pru_ob2',
        'pru_ob3',
        'pru_comp1',
        'pru_comp2',
        'pru_comp3',
        'pru_comp4',
        'pru_comp5',
        'pru_comp6',
        'pru_comp7',
        'pru_comp8',
        'pru_comp9',
        'pru_comp10',
        'pru_comp11',
        'pru_comp12',
        'pru_comp13',
        'pru_comp14',
        'pru_comp15',
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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Imagenes extends Authenticatable implements AuditableContract
{
    use HasFactory,Notifiable, Auditable;

    static $rules = [
        'imagenfachada' => 'required|image|mimes:jpeg',
        'imagenmapa' => 'nullable|image|mimes:jpeg',
    ];
    protected $fillable = [
        'id_lote',
        'imagenfachada',
        'imagenmapa',
        'id_usuario',
    ];
    public $timestamps = false;

}

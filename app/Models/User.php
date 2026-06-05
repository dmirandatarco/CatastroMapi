<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class User extends Authenticatable  implements AuditableContract
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, Auditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'tf_usuarios';


    static $rules = [
        'codi_usuario' => 'required',
        'usuario' => 'required|max:50|unique:tf_usuarios',
        'password' => 'required',
        'nombres' => 'required|regex:/^[a-zA-Z\s]+$/u|max:50',
        'ape_paterno' => 'required|regex:/^[a-zA-Z\s]+$/u|max:50',
        'ape_materno' => 'required|regex:/^[a-zA-Z\s]+$/u|max:50',
        'email' => 'nullable|email|max:50',
        'imagen' => 'nullable'
    ];

    protected $primaryKey = 'id_usuario';

    public function getRouteKeyName()
    {
        return 'id_usuario';
    }

    public function getKeyName()
    {
        return 'id_usuario';
    }

    protected $fillable = [
        'codi_usuario',
        'usuario',
        'password',
        'nombres',
        'ape_paterno',
        'ape_materno',
        'email',
        'fecha_creacion',
        'fecha_cese',
        'imagen',
        'estado',
        'session_id',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];
    public $timestamps = false;

    public function fichas()
    {
        return $this->hasMany('App\Models\Ficha');
    }

}

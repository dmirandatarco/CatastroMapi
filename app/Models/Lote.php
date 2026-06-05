<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Lote extends Authenticatable implements AuditableContract
{
    use HasFactory, Notifiable, Auditable;

    public $timestamps = false;
    protected $table = 'tf_lotes';

    protected $fillable = [
        'id_mzna',
        'codi_lote',
        'id_hab_urba',
        'mzna_dist',
        'lote_dist',
        'sub_lote_dist',
        'estructuracion',
        'zonificacion',
        'cuc',
        'zona_dist',

    ];
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'id_lote';

    protected function zona_dist(): Attribute
    {
        return new Attribute(
            set: function ($value) {
                return mb_strtoupper($value);
            }
        );
    }

    public function getRouteKeyName()
    {
        return 'id_lote';
    }

    public function getKeyName()
    {
        return 'id_lote';
    }

    public function manzana()
    {
        return $this->belongsTo('App\Models\Manzana', 'id_mzna', 'id_mzna');
    }

    public function ficha()
    {
        return $this->belongsTo('App\Models\Ficha', 'id_lote', 'id_lote');
    }

    public function edificaciones()
    {
        return $this->hasMany('App\Models\Edificaciones', 'id_lote', 'id_lote');
    }
    public function puertas()
    {
        return $this->hasMany('App\Models\Puerta', 'id_lote', 'id_lote');
    }

    public function hab_urbana()
    {
        return $this->belongsTo('App\Models\HabUrbana', 'id_hab_urba', 'id_hab_urba');
    }

    public function fichasindividuales()
    {
        return $this->hasMany('App\Models\Ficha', 'id_lote', 'id_lote')->where('tipo_ficha', '=', '01');
    }

    public function imagen()
    {
        return $this->belongsTo('App\Models\Imagenes', 'id_lote', 'id_lote');
    }

    public function areaTotalPorLote()
    {
        return $this->hasMany(UniCat::class, 'id_lote', 'id_lote')
                    ->leftJoin('tf_fichas as tf', 'tf_uni_cat.id_uni_cat', '=', 'tf.id_uni_cat')
                    ->leftJoin('tf_fichas_bienes_comunes as tb', 'tb.id_ficha', '=', 'tf.id_ficha')
                    ->leftJoin('tf_fichas_individuales as ti', 'ti.id_ficha', '=', 'tf.id_ficha')
                    ->leftJoin('tf_construcciones as tc', 'tc.id_ficha', '=', 'tf.id_ficha')
                    ->selectRaw("
                        tf_uni_cat.id_lote,
                        SUM(CASE
                            WHEN tf.tipo_ficha = '04' THEN COALESCE(tb.area_verificada, 0)
                            WHEN tf.tipo_ficha = '01' THEN 
                                CASE 
                                    WHEN COALESCE(SUM(tc.area_verificada), 0) > 0 THEN SUM(tc.area_verificada)
                                    ELSE COALESCE(ti.area_verificada, 0)
                                END
                            ELSE 0
                        END) as totalArea
                    ")
                    ->groupBy('tf_uni_cat.id_lote');
    }
}

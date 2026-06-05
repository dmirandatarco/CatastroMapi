<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use DB;

class UniCat extends Authenticatable implements AuditableContract
{
    use HasFactory, Notifiable, Auditable;
    protected $table = 'tf_uni_cat';

    protected $fillable = [
        'id_lote',
        'id_edificacion',
        'codi_entrada',
        'codi_piso',
        'codi_unidad',
        'tipo_interior',
        'cuc',
        'cuc_antecedente',
        'codi_hoja_catastral',
        'codi_pred_rentas',
        'nume_interior',
        'unid_acum_rentas',
        'codi_cont_rentas'
    ];
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'id_uni_cat';
    public $timestamps = false;
    public function getRouteKeyName()
    {
        return 'id_uni_cat';
    }

    public function getKeyName()
    {
        return 'id_uni_cat';
    }

    public function edificacion()
    {
        return $this->belongsTo('App\Models\Edificaciones','id_edificacion','id_edificacion');
    }

    public function fichasindividuales()
    {
        return $this->hasMany('App\Models\Ficha','id_lote','id_lote')->where('tipo_ficha','=','01');
    }

    public function lote()
    {
        return $this->belongsTo('App\Models\Lote','id_lote','id_lote');
    }
    public function titulares()
    {
        // Reemplaza 'foreign_key' y 'local_key' con las claves adecuadas
        return $this->hasMany(Titular::class, 'foreign_key', 'local_key');
    }

    public function fichas()
    {
        return $this->hasMany('App\Models\Ficha','id_lote','id_lote');
    }


    public function titularesPersonalizados()
    {
        return \DB::table('tf_titulares')
        ->join('tf_fichas', 'tf_fichas.id_ficha', '=', 'tf_titulares.id_ficha')
        ->join('tf_personas as tp', 'tp.id_persona', '=', 'tf_titulares.id_persona')
        ->where('tf_fichas.id_uni_cat', $this->id_uni_cat)
        ->whereIn('tf_fichas.tipo_ficha', ['01', '02'])
        ->orderBy('tf_fichas.fecha_grabado', 'desc')
        ->select(
            'tf_titulares.*',
            DB::raw("CASE
                        WHEN tp.tipo_persona = '1' THEN CONCAT(tp.nombres, ' ', tp.ape_paterno, ' ', tp.ape_materno)
                        WHEN tp.tipo_persona = '2' THEN tp.razon_social
                        ELSE 'Otro'
                     END AS nombres"),
            'tp.nume_doc',
            'tp.tipo_persona'
        )
        ->get();
    }

    public function puertaPersonalizada()
    {
        return $this->hasOneThrough(Puerta::class, Lote::class, 'id_lote', 'id_lote', 'id_lote', 'id_lote')
                    ->join('tf_vias as tv', 'tf_puertas.id_via', '=', 'tv.id_via')
                    ->select('tf_puertas.*', 'tv.nomb_via', 'tv.tipo_via', 'tv.codi_via')
                    ->where('tf_puertas.tipo_puerta', 'P');
    }

    public function usoUniCat()
    {
       return \DB::table('tf_usos')
        ->join('tf_fichas_individuales', 'tf_usos.codi_uso', '=', 'tf_fichas_individuales.codi_uso')
        ->join('tf_fichas', 'tf_fichas_individuales.id_ficha', '=', 'tf_fichas.id_ficha')
        ->where('tf_fichas.id_uni_cat', $this->id_uni_cat)
        ->where('tf_fichas.tipo_ficha', '01')
        ->orderBy('tf_fichas.fecha_grabado', 'desc')
        ->select('tf_usos.*')
        ->first();
    }


    public function areaIndividual()
    {
        return $this->hasOne(Ficha::class, 'id_uni_cat', 'id_uni_cat')
            ->leftJoin('tf_fichas_bienes_comunes as tb', 'tb.id_ficha', '=', 'tf_fichas.id_ficha')
            ->leftJoin('tf_fichas_individuales as ti', 'ti.id_ficha', '=', 'tf_fichas.id_ficha')
            ->leftJoin('tf_construcciones as tc', 'tc.id_ficha', '=', 'tf_fichas.id_ficha')
            ->selectRaw("
                tf_fichas.id_uni_cat,
                CASE
                    WHEN tf_fichas.tipo_ficha = '04' THEN COALESCE(MAX(tb.area_verificada), 0)
                    WHEN tf_fichas.tipo_ficha = '01' THEN 
                        CASE 
                            WHEN COALESCE(SUM(tc.area_verificada), 0) > 0 THEN SUM(tc.area_verificada)
                            ELSE COALESCE(MAX(ti.area_verificada), 0)
                        END
                    ELSE 0
                END as areaInd,
                tf_fichas.tipo_ficha
            ")
            ->groupBy('tf_fichas.id_uni_cat', 'tf_fichas.tipo_ficha');
    }
}

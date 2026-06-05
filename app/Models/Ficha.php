<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Ficha  extends Authenticatable implements AuditableContract
{
    use HasFactory, Notifiable, Auditable;


    public $timestamps = false;
    protected $table = 'tf_fichas';

    protected $primaryKey = 'id_ficha';

    public function getRouteKeyName()
    {
        return 'id_ficha';
    }

    public function getKeyName()
    {
        return 'id_ficha';
    }

    protected $fillable = [
        'tipo_ficha',
        'nume_ficha',
        'id_lote',
        'dc',
        'nume_ficha_lote',
        'id_declarante',
        'fecha_declarante',
        'id_supervisor',
        'fecha_supervision',
        'id_tecnico',
        'fecha_levantamiento',
        'id_verificador',
        'fecha_verificacion',
        'nume_registro',
        'id_uni_cat',
        'id_usuario',
        'fecha_grabado',
        'activo'
    ];

    public $incrementing = false;

    protected $keyType = 'string';

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_usuario', 'id_usuario');
    }

    public function unicat()
    {
        return $this->belongsTo('App\Models\UniCat', 'id_uni_cat', 'id_uni_cat');
    }
    public function fichasUnicatRelacionadas()
    {
        return $this->hasMany('App\Models\Ficha', 'id_uni_cat', 'id_uni_cat');
    }

    public function registro_legals()
    {
        return $this->hasMany('App\Models\RegistroLegal');
    }

    public function exoneraciontitulars()
    {
        return $this->hasMany('App\Models\ExoneracionTitular', 'id_ficha', 'id_ficha');
    }

    public function titular()
    {
        return $this->belongsTo('App\Models\Titular','id_ficha','id_ficha')->orderByRaw("
            CASE 
                WHEN nume_titular ~ '^[0-9]+$' THEN 1 ELSE 2
            END, 
            CASE 
                WHEN nume_titular ~ '^[0-9]+$' THEN nume_titular::INT 
                ELSE NULL 
            END,
            CASE 
                WHEN nume_titular !~ '^[0-9]+$' THEN nume_titular 
                ELSE NULL 
            END
        ");
    }
    
    public function titulars()
    {
        return $this->hasMany('App\Models\Titular','id_ficha','id_ficha')->orderByRaw("
            CASE 
                WHEN nume_titular ~ '^[0-9]+$' THEN 1 ELSE 2
            END, 
            CASE 
                WHEN nume_titular ~ '^[0-9]+$' THEN nume_titular::INT 
                ELSE NULL 
            END,
            CASE 
                WHEN nume_titular !~ '^[0-9]+$' THEN nume_titular 
                ELSE NULL 
            END
        ");
    }

    public function conductors()
    {
        return $this->hasMany('App\Models\Conductor');
    }

    public function litigantes()
    {
        return $this->hasMany('App\Models\Litigante', 'id_ficha', 'id_ficha');
    }

    public function exoneracion_predios()
    {
        return $this->hasMany('App\Models\ExoneracionPredio');
    }

    public function documento_adjuntos()
    {
        return $this->hasMany('App\Models\DocumentoAdjunto', 'id_ficha', 'id_ficha');
    }

    public function serviciobasico()
    {
        return $this->belongsTo('App\Models\ServicioBasico', 'id_ficha', 'id_ficha');
    }

    public function instalacions()
    {
        return $this->hasMany('App\Models\Instalacion', 'id_ficha', 'id_ficha');
    }

    public function construccions()
    {
        return $this->hasMany('App\Models\Construccion', 'id_ficha', 'id_ficha');
    }

    public function generar_numeracions()
    {
        return $this->hasMany('App\Models\GenerarNumeracion', 'id_ficha', 'id_ficha');
    }

    public function ubicacion_certificados()
    {
        return $this->hasMany('App\Models\UbicacionCertificado', 'id_ficha', 'id_ficha');
    }


    public function recap_bbccs()
    {
        return $this->hasMany('App\Models\RecapBbcc');
    }

    public function lindero()
    {
        return $this->belongsTo('App\Models\Lindero', 'id_ficha', 'id_ficha');
    }

    public function autorizacion_anuncios()
    {
        return $this->hasMany('App\Models\AutorizacionAnuncio', 'id_ficha', 'id_ficha');
    }

    public function recap_edificios()
    {
        return $this->hasMany('App\Models\RecapEdificio');
    }

    public function sunarp()
    {
        return $this->belongsTo('App\Models\Sunarp', 'id_ficha', 'id_ficha');
    }

    public function puertas()
    {
        return $this->belongsToMany('App\Models\Puerta', 'tf_ingresos', 'id_ficha', 'id_puerta');
    }

    public function domiciliotitular()
    {
        return $this->belongsTo('App\Models\DomicilioTitular', 'id_ficha', 'id_ficha');
    }

    public function fichaindividual()
    {
        return $this->belongsTo('App\Models\FichaIndividual', 'id_ficha', 'id_ficha');
    }

    public function declarante()
    {
        return $this->belongsTo('App\Models\Persona', 'id_declarante', 'id_persona');
    }

    public function tecnico()
    {
        return $this->belongsTo('App\Models\Persona', 'id_tecnico', 'id_persona');
    }

    public function supervisor()
    {
        return $this->belongsTo('App\Models\Persona', 'id_supervisor', 'id_persona');
    }

    public function verificador()
    {
        return $this->belongsTo('App\Models\Persona', 'id_verificador', 'id_persona');
    }

    public function actividades()
    {
        return $this->belongsToMany('App\Models\Actividades', 'tf_autorizaciones_funcionamiento', 'id_ficha', 'codi_actividad');
    }

    public function lote()
    {
        return $this->belongsTo('App\Models\Lote', 'id_lote', 'id_lote');
    }

    public function fichacotitular()
    {
        return $this->belongsTo('App\Models\FichaCotitularidad', 'id_ficha', 'id_ficha');
    }

    public function conductor()
    {
        return $this->belongsTo('App\Models\Conductor', 'id_ficha', 'id_ficha');
    }

    public function fichaeconomica()
    {
        return $this->belongsTo('App\Models\FichaEconomica', 'id_ficha', 'id_ficha');
    }

    public function puerta()
    {
        return $this->belongsToMany('App\Models\Puerta', 'tf_ingresos', 'id_ficha', 'id_puerta')->limit(1);
    }

    public function fichabiencomun()
    {
        return $this->belongsTo('App\Models\FichaBienComun', 'id_ficha', 'id_ficha');
    }

    public function recapedificio()
    {
        return $this->hasMany('App\Models\RecapEdificio', 'id_ficha', 'id_ficha');
    }

    public function recapbbcc()
    {
        return $this->hasMany('App\Models\RecapBbcc', 'id_ficha', 'id_ficha');
    }

    public function registrolegal()
    {
        return $this->belongsTo('App\Models\RegistroLegal', 'id_ficha', 'id_ficha');
    }

    public function fichabiencultural()
    {
        return $this->belongsTo('App\Models\FichaBienCultural', 'id_ficha', 'id_ficha');
    }

    public function colonial()
    {
        return $this->belongsTo('App\Models\Colonial', 'id_ficha', 'id_ficha');
    }

    public function monumento()
    {
        return $this->belongsTo('App\Models\Monumento', 'id_ficha', 'id_ficha');
    }

    public function tipoarquitecturas()
    {
        return $this->hasMany('App\Models\TipoArquitectura', 'id_ficha', 'id_ficha');
    }

    public function tipomaterials()
    {
        return $this->hasMany('App\Models\TipoMaterial', 'id_ficha', 'id_ficha');
    }

    public function afectacionnaturals()
    {
        return $this->hasMany('App\Models\AfectacionNatural', 'id_ficha', 'id_ficha');
    }

    public function afectacionantropicas()
    {
        return $this->hasMany('App\Models\AfectacionAntropicas', 'id_ficha', 'id_ficha');
    }

    public function intervenciones()
    {
        return $this->hasMany('App\Models\Intervencion', 'id_ficha', 'id_ficha');
    }

    public function normalegals()
    {
        return $this->hasMany('App\Models\NormaLegal', 'id_ficha', 'id_ficha')->where('tipo_norma', 1);
    }

    public function normalegals1()
    {
        return $this->hasMany('App\Models\NormaLegal', 'id_ficha', 'id_ficha')->where('tipo_norma', 2);
    }
    public function sunarpbiencultural()
    {
        return $this->hasOne('App\Models\Sunarp', 'id_ficha', 'id_ficha');
    }
    public function elementoarquitectonico()
    {
        return $this->hasMany('App\Models\ElementoArquitectonico', 'id_ficha', 'id_ficha');
    }
    public function estadoelemento()
    {
        return $this->belongsTo('App\Models\EstadoElemento', 'id_ficha', 'id_ficha');
    }

    public function ficharural()
    {
        return $this->belongsTo('App\Models\FichaRural', 'id_ficha', 'id_ficha');
    }

    public function condicionpredio()
    {
        return $this->belongsTo('App\Models\CondicionPredio', 'id_ficha', 'id_ficha');
    }

    public function documentoposesion()
    {
        return $this->belongsTo('App\Models\DocumentoPosesion', 'id_ficha', 'id_ficha');
    }

    public function caracteristicarural()
    {
        return $this->belongsTo('App\Models\CaracteristicasRural', 'id_ficha', 'id_ficha');
    }

    public function instalacionrural()
    {
        return $this->hasMany('App\Models\InstalacionRural', 'id_ficha', 'id_ficha');
    }

    public function agricolapredios()
    {
        return $this->hasMany('App\Models\AgricolaPredio', 'id_ficha', 'id_ficha');
    }

    public function ganaderiarural()
    {
        return $this->hasMany('App\Models\GanaderiaRural', 'id_ficha', 'id_ficha');
    }

    public function domiciliotitulares()
    {
        return $this->hasMany('App\Models\DomicilioTitular', 'id_ficha', 'id_ficha');
    }

    public function clasificacions()
    {
        return $this->belongsTo('App\Models\TablaCodigo', 'clasificacion', 'codigo')->where('id_tabla', '=', 'CDP');
    }
    public function titulares()
    {
        return $this->hasMany(Titular::class, 'id_ficha', 'id');
    }

    public function archivo()
    {
        return $this->hasOne('App\Models\Archivo','id_ficha','id_ficha');
    }
}

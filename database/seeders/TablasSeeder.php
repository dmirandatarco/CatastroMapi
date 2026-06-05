<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tabla; 


class TablasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tablas = [            
            
            ['id_tabla'=>'ARE'	,'desc_tabla'=>'AREAS','ultimo_codigo'=>NULL],
            ['id_tabla'=>'TPP'	,'desc_tabla'=>'TIPO PERSONA','ultimo_codigo'=>NULL],
            ['id_tabla'=>'TPC'	,'desc_tabla'=>'CARGO DE LOS TRABAJADORES DEL PROYECTO CATASTRAL','ultimo_codigo'=>NULL],
            ['id_tabla'=>'CDC'	,'desc_tabla'=>'CONDICION DEL CONDUCTOR','ultimo_codigo'=>NULL],
            ['id_tabla'=>'CDE'	,'desc_tabla'=>'CONDICION DEL DECLARANTE','ultimo_codigo'=>NULL],
            ['id_tabla'=>'CDP'	,'desc_tabla'=>'CLASIFICACION DEL PREDIO','ultimo_codigo'=>NULL],
            ['id_tabla'=>'CEP'	,'desc_tabla'=>'CONDICION ESPECIAL DEL PREDIO','ultimo_codigo'=>NULL],
            ['id_tabla'=>'CET'	,'desc_tabla'=>'CONDICION ESPECIAL DEL TITULAR','ultimo_codigo'=>NULL],
            ['id_tabla'=>'CNP'	,'desc_tabla'=>'CONDICION DE NUMERACION PUERTA','ultimo_codigo'=>NULL],
            ['id_tabla'=>'CTT'	,'desc_tabla'=>'CONDICION DEL TITULAR','ultimo_codigo'=>NULL],
            ['id_tabla'=>'DFE'	,'desc_tabla'=>'DOCUMENTOS PRESENTADOS EN LA FICHA ECONOMICA','ultimo_codigo'=>NULL],
            ['id_tabla'=>'DOC'	,'desc_tabla'=>'TIPO DE DOCUMENTO','ultimo_codigo'=>NULL],
            ['id_tabla'=>'ECC'	,'desc_tabla'=>'ESTADO DE LA CONSTRUCCION','ultimo_codigo'=>NULL],
            ['id_tabla'=>'ECS'	,'desc_tabla'=>'ESTADO DE CONSERVACION','ultimo_codigo'=>NULL],
            ['id_tabla'=>'ECV'	,'desc_tabla'=>'ESTADO CIVIL','ultimo_codigo'=>NULL],
            ['id_tabla'=>'FAQ'	,'desc_tabla'=>'FORMA DE ADQUISICION DEL PREDIO','ultimo_codigo'=>NULL],
            ['id_tabla'=>'LLE'	,'desc_tabla'=>'ESTADO DEL LLENADO DE LA FICHA','ultimo_codigo'=>NULL],
            ['id_tabla'=>'LOG'	,'desc_tabla'=>'VALOR LOGICO','ultimo_codigo'=>NULL],
            ['id_tabla'=>'MEP'	,'desc_tabla'=>'MATERIAL ESTRUC. PREDOMINANTE','ultimo_codigo'=>NULL],
            ['id_tabla'=>'MFC'	,'desc_tabla'=>'MANTENIMIENTO DE LA FICHA BIENES COMUNES','ultimo_codigo'=>NULL],
            ['id_tabla'=>'MFE'	,'desc_tabla'=>'MANTENIMIENTO DE LA FICHA ECONOMICA','ultimo_codigo'=>NULL],
            ['id_tabla'=>'MFI'	,'desc_tabla'=>'MANTENIMIENTO DE LA FICHA INDIVIDUAL','ultimo_codigo'=>NULL],
            ['id_tabla'=>'PEN'	,'desc_tabla'=>'PREDIO EN','ultimo_codigo'=>NULL],
            ['id_tabla'=>'TDC'	,'desc_tabla'=>'TIPO DE DOCUMENTO DE CONSTRUCCION','ultimo_codigo'=>NULL],
            ['id_tabla'=>'TED'	,'desc_tabla'=>'TIPO DE EDIFICACION','ultimo_codigo'=>NULL],
            ['id_tabla'=>'TIN'	,'desc_tabla'=>'TIPO DE INTERIOR DE PREDIO','ultimo_codigo'=>NULL],
            ['id_tabla'=>'TPA'	,'desc_tabla'=>'TIPO DE PARTIDA REGISTRAL','ultimo_codigo'=>NULL],
            ['id_tabla'=>'TPJ'	,'desc_tabla'=>'TIPO DE PERSONA JURIDICA','ultimo_codigo'=>NULL],
            ['id_tabla'=>'TPR'	,'desc_tabla'=>'TIPO DE PUERTA','ultimo_codigo'=>NULL],
            ['id_tabla'=>'UCA'	,'desc_tabla'=>'UBICACION DE CONSTRUCCION ANTIRREGLAMENTARIA','ultimo_codigo'=>NULL],
            ['id_tabla'=>'VIA'	,'desc_tabla'=>'TIPO DE VIA','ultimo_codigo'=>NULL],
            ['id_tabla'=>'TPE'	,'desc_tabla'=>'TIPO DE PERSONA','ultimo_codigo'=>NULL],
            ['id_tabla'=>'FCH'	,'desc_tabla'=>'TIPO DE FICHA','ultimo_codigo'=>NULL],
            ['id_tabla'=>'EPC'	,'desc_tabla'=>'EVALUACION DEL PREDIO CATASTRAL','ultimo_codigo'=>NULL],
            ['id_tabla'=>'ANU'	,'desc_tabla'=>'TIPO DE ANUNCIO','ultimo_codigo'=>NULL],
            ['id_tabla'=>'DFB'	,'desc_tabla'=>'DECLARATORIA DE FÁBRICA','ultimo_codigo'=>NULL],
            ['id_tabla'=>'HUR'	,'desc_tabla'=>'TIPO DE HABILITACIONES URBANAS','ultimo_codigo'=>NULL],
            ['id_tabla'=>'CTF'	,'desc_tabla'=>'CONDICION DEL TITULAR FORMALIZACION','ultimo_codigo'=>NULL],
            ['id_tabla'=>'CEF'	,'desc_tabla'=>'CONDICION ESPECIAL DEL TITULAR FORMALIZACION','ultimo_codigo'=>NULL],
            ['id_tabla'=>'TIF'	,'desc_tabla'=>'TIPO DE INTERIOR DE PREDIO','ultimo_codigo'=>NULL],
            ['id_tabla'=>'DCF'	,'desc_tabla'=>'DOCUMENTOS FORMALIZACION','ultimo_codigo'=>NULL],
            ['id_tabla'=>'RUT'	,'desc_tabla'=>'RUTAS','ultimo_codigo'=>NULL],
            ['id_tabla'=>'ECH'	,'desc_tabla'=>'ESTADO FICHA','ultimo_codigo'=>NULL],
            ['id_tabla'=>'EDP'	,'desc_tabla'=>'ESTADO DE PROPIEDAD','ultimo_codigo'=>NULL],
            ['id_tabla'=>'TCZ'	,'desc_tabla'=>'CLASE DE ZONA','ultimo_codigo'=>NULL],
            ['id_tabla'=>'CDI'	,'desc_tabla'=>'CATEGORIA DEL INMUEBLE','ultimo_codigo'=>NULL],
            ['id_tabla'=>'FC'	,'desc_tabla'=>'FILIACION CRONOLOGICA','ultimo_codigo'=>NULL],
            ['id_tabla'=>'TDA'	,'desc_tabla'=>'TIPO DE ARQUITECTURA','ultimo_codigo'=>NULL],
            ['id_tabla'=>'FE'	,'desc_tabla'=>'FILIACION ESTILISTICA','ultimo_codigo'=>NULL],
            ['id_tabla'=>'IEI'	,'desc_tabla'=>'INTERVENCIONES EN EL INMUEBLE','ultimo_codigo'=>NULL],
            ['id_tabla'=>'ZON'	,'desc_tabla'=>'ZONIFICIACION','ultimo_codigo'=>NULL],
                    
            
        ];
        foreach ($tablas as $tabla) {
            Tabla::create($tabla);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CodigoInstalacion;


class CodigoInstalacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $codigosInstalacion = [
            ['codi_instalacion' => '01'	, 'desc_instalacion' =>'TANQUE ELEVADO'	,'material'=>'CONCRETO'	,'unidad'=>'M3'],
            ['codi_instalacion' => '02'	, 'desc_instalacion' =>'TANQUE ELEVADO'	,'material'=>'LADRILLO'	,'unidad'=>'M3'],
            ['codi_instalacion' => '03'	, 'desc_instalacion' =>'TANQUE ELEVADO'	,'material'=>'ASBESTO / PLASTICO / FIBRA DE VIDRIO'	,'unidad'=>'M3'],
            ['codi_instalacion' => '05'	, 'desc_instalacion' =>'CISTERNA'	,'material'=>'CONCRETO'	,'unidad'=>'M3'],
            ['codi_instalacion' => '06'	, 'desc_instalacion' =>'PISCINA'	,'material'=>'CONCRETO  ARMADO CON MAYOLICA'	,'unidad'=>'M3'],
            ['codi_instalacion' => '07'	, 'desc_instalacion' =>'PISCINA'	,'material'=>'LADRILLO KING KONG CON PINTURA'	,'unidad'=>'M3'],
            ['codi_instalacion' => '08'	, 'desc_instalacion' =>'ESPEJO DE AGUA'	,'material'=>'CONCRETO'	,'unidad'=>'M3'],
            ['codi_instalacion' => '12'	, 'desc_instalacion' =>'TRIBUNA'	,'material'=>'CONCRETO'	,'unidad'=>'M2'],
            ['codi_instalacion' => '13'	, 'desc_instalacion' =>'RAMPA'	,'material'=>'CONCRETO'	,'unidad'=>'M2'],
            ['codi_instalacion' => '14'	, 'desc_instalacion' =>'PAVIMENTO'	,'material'=>'CONCRETO'	,'unidad'=>'M2'],
            ['codi_instalacion' => '15'	, 'desc_instalacion' =>'PAVIMENTO'	,'material'=>'ASFALTO'	,'unidad'=>'M2'],
            ['codi_instalacion' => '16'	, 'desc_instalacion' =>'AREA LIBRE CON PISO DE MARMOL'	,'material'=>'MARMOL'	,'unidad'=>'M2'],
            ['codi_instalacion' => '17'	, 'desc_instalacion' =>'AREA LIBRE CON PISO DE CERAMICA'	,'material'=>'CERAMICO'	,'unidad'=>'M2'],
            ['codi_instalacion' => '18'	, 'desc_instalacion' =>'AREA LIBRE CON PISO DE LOSETA'	,'material'=>'LOSETA'	,'unidad'=>'M2'],
            ['codi_instalacion' => '19'	, 'desc_instalacion' =>'AREA LIBRE CON PISO DE CEMENTO PULIDO'	,'material'=>'CEMENTO'	,'unidad'=>'M2'],
            ['codi_instalacion' => '20'	, 'desc_instalacion' =>'AREA LIBRE CON PISO DE LAJA'	,'material'=>'LAJA'	,'unidad'=>'M2'],
            ['codi_instalacion' => '21'	, 'desc_instalacion' =>'CERCO O MURO PERIMETRICO'	,'material'=>'PIEDRA'	,'unidad'=>'ML'],
            ['codi_instalacion' => '22'	, 'desc_instalacion' =>'CERCO O MURO PERIMETRICO'	,'material'=>'LADRILLO'	,'unidad'=>'ML'],
            ['codi_instalacion' => '23'	, 'desc_instalacion' =>'CERCO O MURO PERIMETRICO'	,'material'=>'ALUMINIO'	,'unidad'=>'ML'],
            ['codi_instalacion' => '24'	, 'desc_instalacion' =>'CERCO O MURO PERIMETRICO'	,'material'=>'FIERRO'	,'unidad'=>'ML'],
            ['codi_instalacion' => '25'	, 'desc_instalacion' =>'CERCO O MURO PERIMETRICO'	,'material'=>'MADERA'	,'unidad'=>'ML'],
            ['codi_instalacion' => '27'	, 'desc_instalacion' =>'SARDINEL'	,'material'=>'CONCRETO'	,'unidad'=>'M2'],
            ['codi_instalacion' => '28'	, 'desc_instalacion' =>'PARAPETO'	,'material'=>'LADRILLO'	,'unidad'=>'ML'],
            ['codi_instalacion' => '29'	, 'desc_instalacion' =>'CAMPO DEPORTIVO'	,'material'=>'GRASS'	,'unidad'=>'M2'],
            ['codi_instalacion' => '30'	, 'desc_instalacion' =>'CANCHA DEPORTIVA'	,'material'=>'ARCILLA'	,'unidad'=>'M2'],
            ['codi_instalacion' => '31'	, 'desc_instalacion' =>'LOSA DEPORTIVA'	,'material'=>'CONCRETO'	,'unidad'=>'M2'],
            ['codi_instalacion' => '32'	, 'desc_instalacion' =>'CANCHA DE FRONTON'	,'material'=>'CONCRETO'	,'unidad'=>'M2'],
            ['codi_instalacion' => '33'	, 'desc_instalacion' =>'CANCHA DE SQUASH'	,'material'=>'CONCRETO'	,'unidad'=>'M2'],
            ['codi_instalacion' => '34'	, 'desc_instalacion' =>'GRUTA'	,'material'=>'CONCRETO'	,'unidad'=>'M2'],
            ['codi_instalacion' => '35'	, 'desc_instalacion' =>'PILETA'	,'material'=>'CONCRETO'	,'unidad'=>'M3'],
            ['codi_instalacion' => '36'	, 'desc_instalacion' =>'PERGOLA'	,'material'=>'CONCRETO'	,'unidad'=>'M2'],
            ['codi_instalacion' => '37'	, 'desc_instalacion' =>'TORRE PARA ANTENA'	,'material'=>'METALICO'	,'unidad'=>'ML'],
            ['codi_instalacion' => '38'	, 'desc_instalacion' =>'TORRE PARA ANTENA'	,'material'=>'TUBULAR METALICO'	,'unidad'=>'ML'],
            ['codi_instalacion' => '39'	, 'desc_instalacion' =>'PORTONES'	,'material'=>'MADERA'	,'unidad'=>'M2'],
            ['codi_instalacion' => '40'	, 'desc_instalacion' =>'PUERTAS'	,'material'=>'MADERA'	,'unidad'=>'M2'],
            ['codi_instalacion' => '41'	, 'desc_instalacion' =>'TANQUE SEPTICO'	,'material'=>'CONCRETO'	,'unidad'=>'M3'],
            ['codi_instalacion' => '42'	, 'desc_instalacion' =>'ESTACIONAMIENTO'	,'material'=>'CONCRETO'	,'unidad'=>'M2'],
            ['codi_instalacion' => '46'	, 'desc_instalacion' =>'POZOS SUMIDEROS'	,'material'=>'CONCRETO'	,'unidad'=>'M3'],
            ['codi_instalacion' => '47'	, 'desc_instalacion' =>'PATIO DE MANIOBRAS','material'=>	'CONCRETO  / ASFALTO'	,'unidad'=>'M2'],
            ['codi_instalacion' => '48'	, 'desc_instalacion' =>'SUPERFICIE DE RODADURA','material'=>	'CONCRETO  / ASFALTO'	,'unidad'=>'M2'],
            ['codi_instalacion' => '49'	, 'desc_instalacion' =>'VEREDA','material'=>	'CONCRETO  / ASFALTO'	,'unidad'=>'M2'],
            ['codi_instalacion' => '50'	, 'desc_instalacion' =>'HORNOS','material'=>	'CONCRETO  / LADRILLO REFRACTARIO'	,'unidad'=>'M3'],
            ['codi_instalacion' => '51'	, 'desc_instalacion' =>'CHIMENEAS','material'=>	'CONCRETO  / LADRILLO REFRACTARIO'	,'unidad'=>'M3'],
            ['codi_instalacion' => '52'	, 'desc_instalacion' =>'INCINERADORES','material'=>	'CONCRETO  / LADRILLO REFRACTARIO'	,'unidad'=>'M3'],
            ['codi_instalacion' => '53'	, 'desc_instalacion' =>'BOVEDAS'	,'material'=>'CONCRETO'	,'unidad'=>'M3'],
            ['codi_instalacion' => '54'	, 'desc_instalacion' =>'BALANZAS INDUSTRIALES'	,'material'=>'CONCRETO'	,'unidad'=>'M3'],
            ['codi_instalacion' => '26'	, 'desc_instalacion' =>'MURO DE CONTENCION'	,'material'=>'CONCRETO'	,'unidad'=>'M2'],
            ['codi_instalacion' => '55'	, 'desc_instalacion' =>'CERCO O MURO PERIMETRICO'	,'material'=>'ADOBE'	,'unidad'=>'ML'],
            ['codi_instalacion' => '72'	, 'desc_instalacion' =>'RAMPA\,GRADAS Y ESCALERAS DE CONCRETO','material'=>	'ESCALERA DE CONCRETO ARMADO C/ACABADO'	,'unidad'=>'M3'],
            ['codi_instalacion' => '56'	, 'desc_instalacion' =>'COBERTURA SOBRE TECHOS'	,'material'=>'MADERA'	,'unidad'=>'M2'],
            ['codi_instalacion' => '57'	, 'desc_instalacion' =>'COBERTURA SOBRE TECHOS'	,'material'=>'METALICO'	,'unidad'=>'M2'],
            ['codi_instalacion' => '58'	, 'desc_instalacion' =>'CAR PORT'	,'material'=>'MADERA / FIERRO'	,'unidad'=>'M2'],
            ['codi_instalacion' => '59'	, 'desc_instalacion' =>'CERCO ELECTRICO'	,'material'=>'FIERRO'	,'unidad'=>'ML'],
            ['codi_instalacion' => '60'	, 'desc_instalacion' =>'PORTONES'	,'material'=>'METALICO'	,'unidad'=>'M2'],
            ['codi_instalacion' => '61'	, 'desc_instalacion' =>'MONUMENTO'	,'material'=>'CONCRETO'	,'unidad'=>'M3'],
            ['codi_instalacion' => '62'	, 'desc_instalacion' =>'ISLAS SURTIDORES DE GRIFO'	,'material'=>'CONCRETO'	,'unidad'=>'M2'],
            ['codi_instalacion' => '63'	, 'desc_instalacion' =>'CERCO FRONTAL'	,'material'=>'ADOBE'	,'unidad'=>'ML'],
            ['codi_instalacion' => '64'	, 'desc_instalacion' =>'CERCO FRONTAL'	,'material'=>'LADRILLO'	,'unidad'=>'ML'],
            ['codi_instalacion' => '65'	, 'desc_instalacion' =>'CERCO FRONTAL'	,'material'=>'ALUMINIO'	,'unidad'=>'ML'],
            ['codi_instalacion' => '66'	, 'desc_instalacion' =>'CERCO FRONTAL'	,'material'=>'FIERRO'	,'unidad'=>'ML'],
            ['codi_instalacion' => '67'	, 'desc_instalacion' =>'CERCO FRONTAL'	,'material'=>'MADERA'	,'unidad'=>'ML'],
            ['codi_instalacion' => '68'	, 'desc_instalacion' =>'RESERVORIO DE AGUA'	,'material'=>'CONCRETO'	,'unidad'=>'M3'],
            ['codi_instalacion' => '69'	, 'desc_instalacion' =>'MUELLE'	,'material'=>'ACERO/CONCRETO'	,'unidad'=>'M2'],
            ['codi_instalacion' => '73'	, 'desc_instalacion' =>'RAMPA\,GRADAS Y ESCALERAS DE CONCRETO'	,'material'=>'ESCALERA DE CONCRETO ARMADO S/ACABADO'	,'unidad'=>'M3'],
            ['codi_instalacion' => '74'	, 'desc_instalacion' =>'RAMPA\,GRADAS Y ESCALERAS DE CONCRETO'	,'material'=>'RAMPA O GRADA DE CONCRETO C/ENFOFRADO'	,'unidad'=>'M3'],
            ['codi_instalacion' => '75'	, 'desc_instalacion' =>'RAMPA\,GRADAS Y ESCALERAS DE CONCRETO'	,'material'=>'RAMPA DE CONCRETO S/ENFOFRADO'	,'unidad'=>'ML'],
            ['codi_instalacion' => '90'	, 'desc_instalacion' =>'MURO'	,'material'=>'CONCRETO'	,'unidad'=>'ML'],
            ['codi_instalacion' => '91'	, 'desc_instalacion' =>'TANQUE METALICO'	,'material'=>'FIERRO'	,'unidad'=>'M3'],
            ['codi_instalacion' => '92'	, 'desc_instalacion' =>'PORTONES'	,'material'=>'FIERRO'	,'unidad'=>'M2'],
            ['codi_instalacion' => '93'	, 'desc_instalacion' =>'CHIMENEAS'	,'material'=>'METALICO'	,'unidad'=>'M3'],
            ['codi_instalacion' => '95'	, 'desc_instalacion' =>'TANQUE SUPERFICIAL'	,'material'=>'CONCRETO'	,'unidad'=>'M3'],
            ['codi_instalacion' => '96'	, 'desc_instalacion' =>'TANQUE SUPERFICIAL'	,'material'=>'LADRILLO'	,'unidad'=>'M3'],
            ['codi_instalacion' => '04'	, 'desc_instalacion' =>'TANQUE PARA COMBUSTIBLE'	,'material'=>'CONCRETO'	,'unidad'=>'GL'],
            ['codi_instalacion' => '44'	, 'desc_instalacion' =>'POSTES'	,'material'=>'CONCRETO'	,'unidad'=>'U'],
            ['codi_instalacion' => '45'	, 'desc_instalacion' =>'BASES  DE SOPORTE  DE MAQUINAS'	,'material'=>'CONCRETO'	,'unidad'=>'U'],
            ['codi_instalacion' => '09'	, 'desc_instalacion' =>'POZO TUBULAR HASTA 100 M. DE PROFUNDIDAD','material'=>''		,'unidad'=>'U'],
            ['codi_instalacion' => '70'	, 'desc_instalacion' =>'CERCO FRONTAL'	,'material'=>'PIEDRA'	,'unidad'=>'U'],
            ['codi_instalacion' => '71'	, 'desc_instalacion' =>'ANTENA PARABOLICA','material'=>''		,'unidad'=>'U'],
            ['codi_instalacion' => '76'	, 'desc_instalacion' =>'ESCALERA METALICA','material'=>	'ESCALAERA METALICA CARACOL h = 6.00 m(1ro al 3Pis)'	,'unidad'=>'U'],
            ['codi_instalacion' => '77'	, 'desc_instalacion' =>'ESCALERA METALICA','material'=>	'ESCALAERA METALICA CARACOL h = 6.00 m(1ro al 2Pis)'	,'unidad'=>'U'],
            ['codi_instalacion' => '78'	, 'desc_instalacion' =>'ESCALERA METALICA','material'=>	'ESCALAERA METALICA CARACOL h = 3.00M DE UN PISO'	,'unidad'=>'U'],
            ['codi_instalacion' => '94'	, 'desc_instalacion' =>'ANTENAS DE TELEFONIA MOVIL'	,'material'=>''	,'unidad'=>'U'],
            ['codi_instalacion' => '98'	, 'desc_instalacion' =>'POSTE DE ALUMBRADO PUBLICO'	,'material'=>'METAL'	,'unidad'=>'U'],
            ['codi_instalacion' => '10'	, 'desc_instalacion' =>'POZO TUBULAR HASTA 150 M. DE PROFUNDIDAD','material'=>''		,'unidad'=>'U'],
            ['codi_instalacion' => '11'	, 'desc_instalacion' =>'POZO TUBULAR HASTA 200 M. DE PROFUNDIDAD','material'=>''		,'unidad'=>'U'],
            ['codi_instalacion' => '43'	, 'desc_instalacion' =>'TORRES  DE VIGILANCIA','material'=>''		,'unidad'=>'U'],
        ];
        foreach ($codigosInstalacion as $codigo) {
            CodigoInstalacion::updateOrCreate(
                ['codi_instalacion' => $codigo['codi_instalacion']],
                $codigo
            );
        }

            
    }
}

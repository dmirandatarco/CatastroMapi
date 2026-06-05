<?php
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ManzanaController;
use App\Http\Controllers\SectoreController;
use App\Http\Controllers\HabUrbanaController;
use App\Http\Controllers\ViaController;
use App\Http\Controllers\NotariasController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\FichaEconomicaController;
use App\Http\Controllers\FichaCotitularidadController;
use App\Http\Controllers\FichaBienComunController;
use App\Http\Controllers\FichaBienCulturalController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\LineaTiempoController;
use App\Http\Controllers\ProgresoFichasController;


Route::group(['middleware'=>['guest']], function () {
    Route::get('/','App\Http\Controllers\Auth\LoginController@showLoginForm');
    Route::post('/', 'App\Http\Controllers\Auth\LoginController@login')->name('login');
});

Route::group(['middleware'=>['auth']], function () {

    Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');



    Route::resource('user', App\Http\Controllers\UserController::class)->names('user');

    Route::resource('roles', App\Http\Controllers\RoleController::class)->except('show')->names('roles');
    Route::post('subidamasiva', 'App\Http\Controllers\ViaController@subidamasiva')->name('manzana.subidamasiva');

    Route::resource('mantenimiento/manzana', App\Http\Controllers\ManzanaController::class)->except('show,edit,create')->names('manzana');
    Route::resource('mantenimiento/tablacodigo', App\Http\Controllers\TablaCodigoController::class)->except('show,edit,create')->names('tablacodigo');
    Route::resource('mantenimiento/codigoinstalacion', App\Http\Controllers\CodigoIntalacionController::class)->except('show,edit,create')->names('codigoinstalacion');
    Route::resource('mantenimiento/sectore', App\Http\Controllers\SectoreController::class)->except('show,edit,create')->names('sectore');
    Route::resource('mantenimiento/haburbana', App\Http\Controllers\HabUrbanaController::class)->except('show,edit,create')->names('haburbana');
    Route::resource('mantenimiento/vias', App\Http\Controllers\ViaController::class)->except('show,edit')->names('vias');
    Route::resource('ficha', App\Http\Controllers\FichaController::class)->except('show');
    #Route::resource('fichaeconomica', App\Http\Controllers\FichaEconomicaController::class)->except('show');
    #Route::resource('fichacotitularidad', App\Http\Controllers\FichaCotitularidadController::class)->except('show');
    Route::resource('mantenimiento/notaria', App\Http\Controllers\NotariasController::class)->except('show,edit,create')->names('notaria');
    Route::resource('persona', App\Http\Controllers\PersonaController::class)->except('show,edit,create')->names('persona');
    Route::resource('licenciaedificacion', App\Http\Controllers\LicenciaController::class)->except('index','show')->parameters(['licenciaedificacion' => 'licencia'])->names('licenciaedificacion');
    Route::get('/licenciaedificacion/lista', 'App\Http\Controllers\LicenciaController@index')->name('licenciaedificacion.index');
    Route::get('/licenciaedificacion/show/{licencia}', 'App\Http\Controllers\LicenciaController@show')->name('licenciaedificacion.show');
    Route::get('/licenciaedificacion/reporte', 'App\Http\Controllers\LicenciaController@reporte')->name('licenciaedificacion.reporte');
    Route::get('/licenciaedificacion/pdf/{licencia}', 'App\Http\Controllers\LicenciaController@pdf')->name('licenciaedificacion.pdf');

    Route::get('/mantenimiento/supervisores', 'App\Http\Controllers\PersonaController@supervisores')->name('mantenimiento.supervisores');
    Route::get('/mantenimiento/tecnicos', 'App\Http\Controllers\PersonaController@index')->name('mantenimiento.tecnicos');
    Route::get('/mantenimiento/verificadores', 'App\Http\Controllers\PersonaController@verificadores')->name('mantenimiento.verificadores');


    #Route::get('pdf/mpdfprueba', 'App\Http\Controllers\UserController@mpdfprueba')->name('pdf.mpdfprueba');
    Route::get('pdf/individual/{ficha}', 'App\Http\Controllers\FichaController@fichaIndividual')->name('pdf.individual');
    Route::get('pdf/fichasmasivas/{sector}/{manzana}/{tipo_ficha}', 'App\Http\Controllers\FichaController@fichaIndividuales')->name('pdf.fichasmasivas');
    Route::get('pdf/cotitularidad/{ficha}', 'App\Http\Controllers\FichaController@fichaCotitularidad')->name('pdf.cotitularidad');
    Route::get('pdf/economica/{ficha}', 'App\Http\Controllers\FichaController@fichaEconomica')->name('pdf.economica');
    Route::get('pdf/bienescomunes/{ficha}', 'App\Http\Controllers\FichaController@fichaBienescomunes')->name('pdf.bienescomunes');

    Route::get('pdf/informativa/{ficha}', 'App\Http\Controllers\FichaController@fichaInformativa')->name('pdf.informativa');
    Route::get('pdf/numeracion/{ficha}', 'App\Http\Controllers\FichaController@fichaNumeracion')->name('pdf.numeracion');
    Route::get('pdf/certificado/{ficha}', 'App\Http\Controllers\FichaController@certificadocatastral')->name('pdf.certificado');
    Route::get('pdf/generarNumeracion/{ficha}', 'App\Http\Controllers\CNumeracionController@generarNumeracion')->name('pdf.generarNumeracion');
    Route::get('pdf/generarHojaInformativa/{ficha}', 'App\Http\Controllers\CHojaInformativaController@generarHojaInformativa')->name('pdf.generarHojaInformativa');



    Route::get('pdf/rural/{ficha}', 'App\Http\Controllers\FichaController@fichaRural')->name('pdf.rural');
    Route::get('pdf/bienesculturales/{ficha}', 'App\Http\Controllers\FichaController@fichabienesCulturales')->name('pdf.bienesculturales');
    Route::get('pdf/certificadocatastral/{ficha}', 'App\Http\Controllers\FichaController@certificadocatastral')->name('pdf.certificadocatastral');
    Route::get('pdf/gerenciaadministracion/{ficha}', 'App\Http\Controllers\FichaController@gerenciaadministracion')->name('pdf.gerenciaadministracion');
    Route::get('pdf/informeeconomico/{ficha}', 'App\Http\Controllers\FichaController@informeeconomico')->name('pdf.informeeconomico');
    Route::get('pdf/anexoficha/{sector}', 'App\Http\Controllers\FichaController@c')->name('pdf.anexoficha');
    Route::get('excel/anexoficha/{ficha}', 'App\Http\Controllers\FichaController@anexofichaexcel')->name('excel.anexoficha');




    Route::get('/ficha/createcotitularidad/{fichaanterior}', 'App\Http\Controllers\FichaCotitularidadController@createcotitularidad')->name('ficha.createcotitularidad');
    Route::get('/ficha/editcotitularidad/{fichaanterior}', 'App\Http\Controllers\FichaCotitularidadController@editcotitularidad')->name('ficha.editcotitularidad');
    Route::get('/ficha/destroycotitularidad/{fichaanterior}', 'App\Http\Controllers\FichaCotitularidadController@destroycotitularidad')->name('ficha.destroycotitularidad');

    Route::get('/ficha/createindividual', 'App\Http\Controllers\FichaController@createindividual')->name('ficha.createindividual');
    Route::get('/ficha/editindividual/{fichaanterior}', 'App\Http\Controllers\FichaController@editindividual')->name('ficha.editindividual');
    Route::get('/ficha/editrentasindividual/{fichaanterior}', 'App\Http\Controllers\FichaController@editrentasindividual')->name('ficha.editrentasindividual');
    Route::get('/ficha/destroyindividual/{fichaanterior}', 'App\Http\Controllers\FichaController@destroyindividual')->name('ficha.destroyindividual');
    Route::post('mantenimiento/sectore/eliminar/{sectore}', 'App\Http\Controllers\SectoreController@eliminar')->name('sectore.eliminar');
    

    Route::get('/ficha/fichacotitulariadadcreate/{ficha}', 'App\Http\Controllers\FichaCotitularidadController@fichacotitulariadadcreate')->name('ficha.fichacotitulariadadcreate');
    Route::get('/ficha/indexcotitular', 'App\Http\Controllers\FichaCotitularidadController@indexcotitular')->name('ficha.indexcotitular');
    Route::get('/generarnumeracion/indexgenerarcertificado', 'App\Http\Controllers\GenerarNumeracionController@indexgenerarcertificado')->name('generarnumeracion.indexgenerarcertificado');
    Route::get('/generarnumeracion/reportegenerarcertificado', 'App\Http\Controllers\GenerarNumeracionController@reportegenerarcertificado')->name('generarnumeracion.reportegenerarcertificado');
    Route::get('/ficha/generarnumeracioncreate/{fichaanterior}', 'App\Http\Controllers\GenerarNumeracionController@generarnumeracioncreate')->name('ficha.generarnumeracioncreate');


    Route::get('/generarcatastral/indexgenerarcatastral', 'App\Http\Controllers\GenerarcertificadoController@indexgenerarcatastral')->name('generarcatastral.indexgenerarcatastral');
    Route::get('/generarcatastral/reportegenerarcatastral', 'App\Http\Controllers\GenerarcertificadoController@reportegenerarcatastral')->name('generarcatastral.reportegenerarcatastral');
    Route::get('/ficha/generarcatastralcreate/{fichaanterior}', 'App\Http\Controllers\GenerarcertificadoController@generarcatastralcreate')->name('ficha.generarcatastralcreate');




    Route::get('/ficha/indexbiencomun', 'App\Http\Controllers\FichaBienComunController@indexbiencomun')->name('ficha.indexbiencomun');
    Route::get('/ficha/createbiencomun', 'App\Http\Controllers\FichaBienComunController@createbiencomun')->name('ficha.createbiencomun');
    Route::get('/ficha/editbiencomun/{fichaanterior}', 'App\Http\Controllers\FichaBienComunController@editbiencomun')->name('ficha.editbiencomun');
    Route::get('/ficha/destroybiencomun/{fichaanterior}', 'App\Http\Controllers\FichaBienComunController@destroybiencomun')->name('ficha.destroybiencomun');

    Route::get('/ficha/indexbiencultural', 'App\Http\Controllers\FichaBienCulturalController@indexbiencultural')->name('ficha.indexbiencultural');
    Route::get('/ficha/editbiencultural/{fichaanterior}', 'App\Http\Controllers\FichaBienCulturalController@editbiencultural')->name('ficha.editbiencultural');


    Route::get('/ficha/createbiencultural/{fichaanterior?}', 'App\Http\Controllers\FichaBienCulturalController@createbiencultural')->name('ficha.createbiencultural');


    Route::get('/ficha/createeconomica/{fichaanterior}', 'App\Http\Controllers\FichaEconomicaController@createeconomica')->name('ficha.createeconomica');
    Route::get('/ficha/editeconomica/{fichaanterior}', 'App\Http\Controllers\FichaEconomicaController@editeconomica')->name('ficha.editeconomica');
    Route::get('/ficha/indexeconomica', 'App\Http\Controllers\FichaEconomicaController@indexeconomica')->name('ficha.indexeconomica');
    Route::get('/ficha/destroyeconomica/{fichaanterior}', 'App\Http\Controllers\FichaEconomicaController@destroyeconomica')->name('ficha.destroyeconomica');
    Route::get('/ficha/createrural', 'App\Http\Controllers\FichaRuralController@createrural')->name('ficha.createrural');
    Route::get('/ficha/editrural/{fichaanterior}', 'App\Http\Controllers\FichaRuralController@editrural')->name('ficha.editrural');

    Route::get('/lineatiempo', 'App\Http\Controllers\LineaTiempoController@lineatiempo')->name('lineatiempo');

    Route::get('reporte/reportelista', 'App\Http\Controllers\ReporteController@reportelista')->name('reporte.reportelista');
    Route::get('reporte/reportepersona', 'App\Http\Controllers\ReporteController@reportepersona')->name('reporte.reportepersona');
    Route::get('reporte/reportetitulares', 'App\Http\Controllers\ReporteController@reportetitulares')->name('reporte.reportetitulares');
    Route::get('reporte/reporteusuario', 'App\Http\Controllers\ReporteController@reporteusuario')->name('reporte.reporteusuario');
    Route::get('reporte/reporteusuarioauth', 'App\Http\Controllers\ReporteController@reporteusuarioauth')->name('reporte.reporteusuarioauth');
    Route::get('reporte/reportefechas', 'App\Http\Controllers\ReporteController@reportefechas')->name('reporte.reportefechas');
    Route::get('reporte/fichapuerta', 'App\Http\Controllers\ReporteController@fichapuerta')->name('reporte.fichapuerta');
    Route::get('reporte/fichapredio', 'App\Http\Controllers\ReporteController@fichapredio')->name('reporte.fichapredio');
    Route::get('reporte/fichaantiguedad', 'App\Http\Controllers\ReporteController@fichaantiguedad')->name('reporte.fichaantiguedad');
    Route::get('reporte/fichaconstrucciones', 'App\Http\Controllers\ReporteController@fichaconstrucciones')->name('reporte.fichaconstrucciones');
    Route::get('reporte/llenadoficha', 'App\Http\Controllers\ReporteController@llenadoficha')->name('reporte.llenadoficha');
    Route::get('reporte/porlote', 'App\Http\Controllers\ReporteController@porlote')->name('reporte.porlote');
    Route::get('reporte/actividadeconomica', 'App\Http\Controllers\ReporteController@actividadeconomica')->name('reporte.actividadeconomica');
    Route::get('reporte/fichasmasivas', 'App\Http\Controllers\ReporteController@fichasmasivas')->name('reporte.fichasmasivas');

    Route::get('reporte/fichaanexo', 'App\Http\Controllers\ReporteController@fichaanexo')->name('reporte.fichaanexo');


    Route::get('/impresion/verficha', 'App\Http\Controllers\ReporteController@verficha')->name('impresion/verficha');
    Route::get('/impresion/verfichacotitular', 'App\Http\Controllers\ReporteController@verfichacotitular')->name('impresion/verfichacotitular');
    Route::get('/impresion/verfichaeconomicas', 'App\Http\Controllers\ReporteController@verfichaeconomicas')->name('impresion/verfichaeconomicas');
    Route::get('/impresion/verfichabc', 'App\Http\Controllers\ReporteController@verfichabc')->name('impresion/verfichabc');




    Route::get('/impresion/verfichainformativa', 'App\Http\Controllers\ReporteController@verfichainformativa')->name('impresion/verfichainformativa');
    Route::get('/impresion/vercertificado', 'App\Http\Controllers\ReporteController@vercertificado')->name('impresion/vercertificado');
    Route::get('/impresion/veradministracion', 'App\Http\Controllers\ReporteController@veradministracion')->name('impresion/veradministracion');
    Route::get('/impresion/verinformativaeconomica', 'App\Http\Controllers\ReporteController@verinformativaeconomica')->name('impresion/verinformativaeconomica');
    Route::get('/impresion/vercnumeracion', 'App\Http\Controllers\ReporteController@vercnumeracion')->name('impresion/vercnumeracion');

    Route::get('/progresofichas', 'App\Http\Controllers\ProgresoFichasController@index')->name('progresofichas');
    Route::get('/imagenes/ver', 'App\Http\Controllers\ImagenesController@ver')->name('imagenes');

    Route::resource('imagenes', App\Http\Controllers\ImagenesController::class)->names('imagenes');




    #Route::get('/ficha/createbienesculturales', 'App\Http\Controllers\FichaController@createbienesculturales')->name('ficha.createbienesculturales');
    Route::get('/ficha/fichacreateotra/{ficha}', 'App\Http\Controllers\FichaController@fichacreateotra')->name('ficha.fichacreateotra');




    ##################################################################################
    Route::get('reporte/reportefirmas', 'App\Http\Controllers\ReporteController@reportefirmas')->name('reporte.reportefirmas');
    Route::get('reporte/condiciondeclarante', 'App\Http\Controllers\ReporteController@condiciondeclarante')->name('reporte.condiciondeclarante');

    Route::post('editar-ficha-cod-refefencia', 'App\Http\Controllers\FichaController@updateCod')->name('ficha.updateCod');
    Route::post('duplicar-cotitular', 'App\Http\Controllers\FichaController@duplicarCotitular')->name('ficha.duplicarCotitular');

});

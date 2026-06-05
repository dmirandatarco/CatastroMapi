<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        // $role1 = Role::where('name', 'ADMINISTRADOR')->first();
        $role1 = Role::create(['name' => 'ADMINISTRADOR']);
        

        Permission::create(['name' => 'ficha.editrentasindividual', 'description'=> 'Editar Codigo de Contribuyente', 'categoria' => 'Editar'], )->assignRole($role1);




        Permission::create(['name' => 'dashboard', 'description' => 'Ver Estadisticas', 'categoria' => 'Ver'])->assignRole($role1);

        Permission::create(['name' => 'user.index', 'description' => 'Ver la lista de Usuarios', 'categoria' => 'Ver'])->assignRole($role1);
        Permission::create(['name' => 'user.create', 'description' => 'Crear Usuarios', 'categoria' => 'Crear'])->assignRole($role1);
        Permission::create(['name' => 'user.destroy', 'description' => 'Cambiar estado de Usuarios', 'categoria' => 'Eliminar'])->assignRole($role1);
        Permission::create(['name' => 'user.show', 'description' => 'Mostrar Usuarios', 'categoria' => 'Ver'])->assignRole($role1);
        Permission::create(['name' => 'user.edit', 'description' => 'Editar Usuarios', 'categoria' => 'Editar'])->assignRole($role1);


        Permission::create(['name' => 'roles.index', 'description' => 'Ver la lista de Roles', 'categoria' => 'Ver'])->assignRole($role1);
        Permission::create(['name' => 'roles.edit', 'description' => 'Editar Roles', 'categoria' => 'Editar'])->assignRole($role1);
        Permission::create(['name' => 'roles.destroy', 'description' => 'Eliminar Roles', 'categoria' => 'Eliminar'])->assignRole($role1);
        Permission::create(['name' => 'roles.create', 'description' => 'Crear Roles', 'categoria' => 'Crear'])->assignRole($role1);


        Permission::create(['name' => 'manzana.index', 'description' => 'Ver la lista de Manzanas', 'categoria' => 'Ver'])->assignRole($role1);
        Permission::create(['name' => 'manzana.edit', 'description' => 'Editar datos de Manzanas', 'categoria' => 'Editar'])->assignRole($role1);
        Permission::create(['name' => 'manzana.destroy', 'description' => 'Cambiar estado de Usuarios', 'categoria' => 'Eliminar'])->assignRole($role1);
        Permission::create(['name' => 'manzana.create', 'description' => 'Crear Manzanas', 'categoria' => 'Crear'])->assignRole($role1);



        Permission::create(['name' => 'sectore.index', 'description' => 'Ver la lista de Sectores', 'categoria' => 'Ver'])->assignRole($role1);
        Permission::create(['name' => 'sectore.edit', 'description' => 'Editar la lista de Sectores', 'categoria' => 'Editar'])->assignRole($role1);
        Permission::create(['name' => 'sectore.destroy', 'description' => 'Cambiar estado de Sectores', 'categoria' => 'Eliminar'])->assignRole($role1);
        Permission::create(['name' => 'sectore.create', 'description' => 'Crear Sectores', 'categoria' => 'Crear'])->assignRole($role1);



        Permission::create(['name' => 'haburbana.index', 'description' => 'Ver la lista de Habilitaciones Urbanas', 'categoria' => 'Ver'])->assignRole($role1);
        Permission::create(['name' => 'haburbana.edit', 'description' => 'Editar datos de Habilitaciones Urbanas', 'categoria' => 'Editar'])->assignRole($role1);
        Permission::create(['name' => 'haburbana.destroy', 'description' => 'Cambiar estado de Habilitaciones Urbanas', 'categoria' => 'Eliminar'])->assignRole($role1);
        Permission::create(['name' => 'haburbana.create', 'description' => 'Crear Habilitaciones Urbanas', 'categoria' => 'Crear'])->assignRole($role1);


        Permission::create(['name' => 'vias.index', 'description' => 'Ver la lista de Vias', 'categoria' => 'Ver'])->assignRole($role1);
        Permission::create(['name' => 'vias.edit', 'description' => 'Editar datos de Vias', 'categoria' => 'Editar'])->assignRole($role1);
        Permission::create(['name' => 'vias.destroy', 'description' => 'Cambiar estado de Vias', 'categoria' => 'Eliminar'])->assignRole($role1);
        Permission::create(['name' => 'vias.create', 'description' => 'Crear Vias', 'categoria' => 'Crear'])->assignRole($role1);




        Permission::create(['name' => 'notaria.index', 'description' => 'Ver Notaria', 'categoria' => 'Ver'])->assignRole($role1);
        Permission::create(['name' => 'notaria.edit', 'description' => 'Editar datos de Notaria', 'categoria' => 'Editar'])->assignRole($role1);
        Permission::create(['name' => 'notaria.destroy', 'description' => 'Cambiar estado de Notaria', 'categoria' => 'Eliminar'])->assignRole($role1);
        Permission::create(['name' => 'notaria.create', 'description' => 'Crear Notaria', 'categoria' => 'Crear'])->assignRole($role1);


        Permission::create(['name' => 'reporte.index', 'description' => 'Vista de Reportes', 'categoria' => 'Reportes'])->assignRole($role1);
        Permission::create(['name' => 'lineatiempo', 'description' => 'Ver Linea Tiempo Fichas', 'categoria' => 'Ver'])->assignRole($role1);
        Permission::create(['name' => 'progresofichas', 'description' => 'Ver Progreso de Fichas', 'categoria' => 'Ver'])->assignRole($role1);


        Permission::create(['name' => 'persona.edit', 'description' => 'Editar datos de Persona', 'categoria' => 'Editar'])->assignRole($role1);
        Permission::create(['name' => 'supervisor.edit', 'description' => 'Editar datos de Supervisor', 'categoria' => 'Editar'])->assignRole($role1);
        Permission::create(['name' => 'tecnicos.edit', 'description' => 'Editar datos de Tecnicos', 'categoria' => 'Editar'])->assignRole($role1);
        Permission::create(['name' => 'verificadores.edit', 'description' => 'Editar datos de Verificadores', 'categoria' => 'Editar'])->assignRole($role1);

        Permission::create(['name' => 'persona.create', 'description' => 'Crear Persona', 'categoria' => 'Crear'])->assignRole($role1);
        Permission::create(['name' => 'supervisor.create', 'description' => 'Crear Supervisor', 'categoria' => 'Crear'])->assignRole($role1);
        Permission::create(['name' => 'tecnicos.create', 'description' => 'Crear Tecnicos', 'categoria' => 'Crear'])->assignRole($role1);
        Permission::create(['name' => 'verificadores.create', 'description' => 'Crear Verificadores', 'categoria' => 'Crear'])->assignRole($role1);


        Permission::create(['name' => 'mantenimiento.supervisores', 'description'              => 'Ver lista de Supervisores', 'categoria' => 'Ver'])->assignRole($role1);
        Permission::create(['name' => 'mantenimiento.tecnicos', 'description'                  => 'Ver lista de Tecnicos', 'categoria' => 'Ver'])->assignRole($role1);
        Permission::create(['name' => 'mantenimiento.verificadores', 'description'             => 'Ver lista de Verificadores', 'categoria' => 'Ver'])->assignRole($role1);

        Permission::create(['name' => 'pdf.individual', 'description'                          => 'Ver Pdf de Ficha Individual', 'categoria' => 'Ver'])->assignRole($role1);
        Permission::create(['name' => 'pdf.cotitularidad', 'description'                       => 'Ver Pdf de Ficha Cotitularidad', 'categoria' => 'Ver'])->assignRole($role1);
        Permission::create(['name' => 'pdf.economica', 'description'                           => 'Ver Pdf de Ficha Economica', 'categoria' => 'Ver'])->assignRole($role1);
        Permission::create(['name' => 'pdf.bienescomunes', 'description'                       => 'Ver Pdf de Ficha Bienes Comunes', 'categoria' => 'Ver'])->assignRole($role1);

        Permission::create(['name' => 'pdf.informativa', 'description'                         => 'Ver Pdf de Ficha Informativa', 'categoria' => 'Ver'])->assignRole($role1);
        Permission::create(['name' => 'pdf.bienesculturales', 'description'                    => 'Ver Pdf de Ficha Bienes Culturales', 'categoria' => 'Ver'])->assignRole($role1);
        Permission::create(['name' => 'pdf.rural', 'description'                               => 'Ver Pdf de Ficha Rural', 'categoria' => 'Ver'])->assignRole($role1);


        Permission::create(['name' => 'ficha.createcotitularidad', 'description'               => 'Crear Ficha Cotitularidad', 'categoria' => 'Crear'])->assignRole($role1);
        Permission::create(['name' => 'ficha.editcotitularidad', 'description'                 => 'Editar Ficha Cotitularidad', 'categoria' => 'Editar'])->assignRole($role1);
        Permission::create(['name' => 'ficha.editcultural', 'description'                      => 'Editar Ficha Bien Cultural', 'categoria' => 'Editar'])->assignRole($role1);
        Permission::create(['name' => 'ficha.destroycotitularidad', 'description'              => 'Eliminar Ficha Cotitularidad', 'categoria' => 'Eliminar'])->assignRole($role1);
        Permission::create(['name' => 'ficha.editeconomica', 'description'                     => 'Editar Ficha Economica', 'categoria' => 'Editar'])->assignRole($role1);
        Permission::create(['name' => 'ficha.destroyeconomica', 'description'                  => 'Eliminar Ficha Economica', 'categoria' => 'Eliminar'])->assignRole($role1);
        Permission::create(['name' => 'ficha.editindividual', 'description'                    => 'Editar Ficha Individual', 'categoria' => 'Editar'])->assignRole($role1);
        Permission::create(['name' => 'ficha.destroyindividual', 'description'                 => 'Eliminar Ficha Individual', 'categoria' => 'Eliminar'])->assignRole($role1);
        Permission::create(['name' => 'ficha.indexeconomica', 'description'                    => 'Ver Lista de Ficha Economica', 'categoria' => 'Ver'])->assignRole($role1);
        Permission::create(['name' => 'ficha.indexcotitular', 'description'                    => 'Ver Lista de Ficha Cotitularidad', 'categoria' => 'Ver'])->assignRole($role1);
        Permission::create(['name' => 'ficha.indexbiencultural', 'description'                 => 'Ver Lista de Ficha Bienes Culturales', 'categoria' => 'Ver'])->assignRole($role1);
        Permission::create(['name' => 'ficha.createeconomica', 'description'                   => 'Crear Ficha Economica', 'categoria' => 'Crear'])->assignRole($role1);
        Permission::create(['name' => 'ficha.createbiencomun', 'description'                   => 'Crear Ficha de Bienes Comunes', 'categoria' => 'Crear'])->assignRole($role1);
        Permission::create(['name' => 'ficha.createbiencultural', 'description'                => 'Crear Ficha Bien Cultural', 'categoria' => 'Crear'])->assignRole($role1);
        Permission::create(['name' => 'ficha.createrural', 'description'                       => 'Crear Ficha Rural', 'categoria' => 'Crear'])->assignRole($role1);
        Permission::create(['name' => 'ficha.createindividual', 'description'                  => 'Crear Ficha Individual', 'categoria' => 'Crear'])->assignRole($role1);

        Permission::create(['name' => 'impresiones', 'description'                             => 'Ver impresiones', 'categoria' => 'Ver'])->assignRole($role1);

        Permission::create(['name' => 'impresion.verficha', 'description'                      => 'Ver Impresion de Ficha', 'categoria' => 'Ver'])->assignRole($role1);
        Permission::create(['name' => 'impresion.verfichainformativa', 'description'           => 'Ver Impresion de Ficha Informativa', 'categoria' => 'Ver'])->assignRole($role1);
        Permission::create(['name' => 'impresion.vercertificado', 'description'                => 'Ver Impresion de Certificado', 'categoria' => 'Ver'])->assignRole($role1);
        Permission::create(['name' => 'impresion.veradministracion', 'description'             => 'Ver Impresion de Administracion', 'categoria' => 'Ver'])->assignRole($role1);
        Permission::create(['name' => 'impresion.verinformativaeconomica', 'description'       => 'Ver Impresion de Informe Economico', 'categoria' => 'Ver'])->assignRole($role1);
        Permission::create(['name' => 'impresion.vercnumeracion', 'description'                => 'Ver Impresion de Certificado de Numeracion', 'categoria' => 'Ver'])->assignRole($role1);
        Permission::create(['name' => 'impresion.verccatastral', 'description'                 => 'Ver Impresion de Certificado Catastral', 'categoria' => 'Ver'])->assignRole($role1);

        /*Falta Seedear*/
        Permission::create(['name' => 'ficha.editbiencomun', 'description'                 => 'Editar Ficha Bien Comun', 'categoria' => 'Editar'])->assignRole($role1);
        Permission::create(['name' => 'ficha.destroybiencomun', 'description'                 => 'Eliminar Ficha Bien Comun', 'categoria' => 'Eliminar'])->assignRole($role1);

        Permission::create(['name' => 'reporte.reportepersona', 'description'                  => 'Reporte por Persona', 'categoria' => 'Reportes'])->assignRole($role1);
        Permission::create(['name' => 'reporte.reporteusuario', 'description'                  => 'Reporte por Usuario', 'categoria' => 'Reportes'])->assignRole($role1);
        Permission::create(['name' => 'reporte.reportefechas', 'description'                   => 'Reporte por Fechas', 'categoria' => 'Reportes'])->assignRole($role1);
        Permission::create(['name' => 'reporte.fichapuerta', 'description'                     => 'Reporte por Puerta', 'categoria' => 'Reportes'])->assignRole($role1);
        Permission::create(['name' => 'reporte.fichapredio', 'description'                     => 'Reporte por Predio', 'categoria' => 'Reportes'])->assignRole($role1);
        Permission::create(['name' => 'reporte.fichaconstrucciones', 'description'             => 'Reporte por Construcciones', 'categoria' => 'Reportes'])->assignRole($role1);
        Permission::create(['name' => 'reporte.fichaantiguedad', 'description'                 => 'Reporte por Antiguedad', 'categoria' => 'Reportes'])->assignRole($role1);
        Permission::create(['name' => 'imagenes', 'description'                                => 'Subir Imagenes', 'categoria' => 'Reportes'])->assignRole($role1);
        Permission::create(['name' => 'reporte.llenadoficha', 'description'                  => 'Reporte Llenado de fichas', 'categoria' => 'Reportes'])->assignRole($role1);
        Permission::create(['name' => 'reporte.porlote', 'description'                  => 'Reporte por Lote', 'categoria' => 'Reportes'])->assignRole($role1);
        Permission::create(['name' => 'reporte.actividadeconomica', 'description'                  => 'Reporte por Actividad Economica', 'categoria' => 'Reportes'])->assignRole($role1);
        Permission::create(['name' => 'reporte.fichasmasivas', 'description'                  => 'Reporte de Fichas Masivas', 'categoria' => 'Reportes'])->assignRole($role1);



        ##########################################################################################
        Permission::create(['name' => 'reporte.reportefirmas', 'description'                        => 'Reporte por Firmas', 'categoria' => 'Reportes'])->assignRole($role1);
        Permission::create(['name' => 'visormapas', 'description'                        => 'Visor de Mapas', 'categoria' => 'Ver'])->assignRole($role1);

        // Permission::create(['name' => 'licenciaedificacion.index', 'description'                    => 'Lista de Licencia de Edificaciones', 'categoria' => 'Editar'])->assignRole($role1);
        // Permission::create(['name' => 'licenciaedificacion.show', 'description'                     => 'Ver Licencia de Edificacion', 'categoria' => 'Editar'])->assignRole($role1);
        // Permission::create(['name' => 'licenciaedificacion.create', 'description'                   => 'Crear Licencia de Edificacion', 'categoria' => 'Crear'])->assignRole($role1);
        // Permission::create(['name' => 'licenciaedificacion.edit', 'description'                     => 'Editar Licencia de Edificacion', 'categoria' => 'Editar'])->assignRole($role1);
        // Permission::create(['name' => 'licenciaedificacion.destroy', 'description'                  => 'Anular Licencia de Edificacion', 'categoria' => 'Editar'])->assignRole($role1);
        // Permission::create(['name' => 'licenciaedificacion.reporte', 'description'                  => 'Reporte de Licencia de Edificacion', 'categoria' => 'Editar'])->assignRole($role1);
        // Permission::create(['name' => 'licenciaedificacion.pdf', 'description'                      => 'Descargar PDF de Licencia de Edificacion', 'categoria' => 'Editar'])->assignRole($role1);
    }
}
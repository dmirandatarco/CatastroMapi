@extends('layout.master')
@push('plugin-styles')
<link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
@endpush
@section('content')
<div class="row inbox-wrapper">
    <div class="col-md-12">
        <div class="card">
        <div class="card-body">
            <div class="row">
            <h4 class="mb-3">Subir imagen lote</h4>
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
                </div>
            @endif
            {!!Form::open(array('url'=>'imagenes/ver','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
            <div class="form-group row">
                <div class="col-md-1" style="padding-top: 10px">
                        <span> <strong> Sector </strong></span>
                    <br>                              
                </div>
                <div class="col-md-3">
                    <div class="input-group" id="buscarFecha">
                        <select class="form-control" id="buscarSector" name="buscarSector"  data-live-search="true">
                            <option value="0" {{ $sector2 == '0' ? 'selected' : '' }} >TODOS</option>
                            @foreach($sectores as $sector)
                                <option value="{{$sector->id_sector}}" {{ $sector2 == $sector->id_sector ? 'selected' : '' }} >{{$sector->nomb_sector}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                </div>
                <div class="col-md-1" style="padding-top: 10px">
                        <span> <strong> Manzana </strong></span>
                    <br>                              
                </div>
                <div class="col-md-3">
                    <select class="form-control" id="buscarManzana" name="buscarManzana"  data-live-search="true">
                        <option value="0" {{ $manzana2 == '0' ? 'selected' : '' }} >TODOS</option>
                    </select>
                    <br>                              
                </div>
                
                <div class="col-md-2 mb-5">
                    <div class="input-group">
                        <button type="submit"  id="buscar" class="btn btn-primary"><i data-feather="search"></i> Buscar</button>
                    </div>
                </div>
            </div>
            
            {{Form::close()}}
            <div class="table-responsive ">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nº Ficha</th>
                            <th>Sector</th>
                            <th>Manzana</th>
                            <th>Lote</th>
                            <th>Subir Imagen</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ficha as $ficha)
                            <tr>
                                <td>{{$ficha->fichaindividual->nume_ficha}}</td>
                                <td>{{$ficha->lote->manzana->sectore->nomb_sector}}</td>
                                <td>{{$ficha->lote->manzana->codi_mzna}}</td>
                                <td>{{$ficha->lote->codi_lote}}</td>
                                <td>
                                    <button type="button" class="btn btn-success btn-icon " data-bs-toggle="modal" data-bs-target="#Agregar" data-id="{{$ficha->id_ficha}}"
                                        data-fachada="{{$ficha->fichaindividual->imagen_lote}}" data-plano="{{$ficha->fichaindividual->imagen_plano}}" data-imagen1="{{$ficha->archivo?->imagen1}}" data-imagen2="{{$ficha->archivo?->imagen2}}"
                                        data-imagen3="{{$ficha->archivo?->imagen3}}" data-sunarpdf="{{$ficha->archivo?->sunarp}}" data-rentaspdf="{{$ficha->archivo?->rentas}}" data-planopdf="{{$ficha->archivo?->plano}}">
                                        <i data-feather="image"></i>
                                    </button>
                                </td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>

<div class="modal fade" id="Agregar" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Subir Imagenes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <div class="modal-body">
            <form action="{{route('imagenes.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                {{csrf_field()}}
                
                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="fachada" class="form-label">IMAGEN PRINCIPAL:</label>
                        <input type="file"  accept="image/jpeg" class="form-control imagenfachada" id="fachada" name="fachada" value="{{old('fachada')}}">
                        @error('fachada')
                            <span class="error-message" style="color:red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-1">
                        <div class="btn-group">
                            <a class="btn btn-success btn-icon me-2" href=""  target="_blank"id="imagenfachada">
                                <i data-feather="image"></i>
                            </a>
                            <button class="btn btn-danger btn-icon mb-5 eliminar-imagen"
                                type="button"
                                id="eliminarimagenfachada"
                                data-tipo="fachada">
                                <i data-feather="trash" ></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="plano" class="form-label">IMAGEN PLANO:</label>
                        <input type="file"  accept="image/jpeg" class="form-control plano" id="plano" name="plano" value="{{old('plano')}}">
                        @error('plano')
                            <span class="error-message" style="color:red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-1">
                        <div class="btn-group">
                            <a class="btn btn-success btn-icon me-2" href=""  target="_blank"id="imagenplano">
                                <i data-feather="image"></i>
                            </a>
                            <button class="btn btn-danger btn-icon mb-5 eliminar-imagen" type="button" id="eliminarimagenplano" data-tipo="plano" >
                                <i data-feather="trash" ></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-5 mb-3">
                        <label for="imagen1" class="form-label">IMAGEN 1:</label>
                        <input type="file"  accept="image/jpeg" class="form-control imagen3" id="imagen1" name="imagen1" value="{{old('imagen1')}}">
                        @error('imagen1')
                            <span class="error-message" style="color:red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-1 mb-3">
                        <div class="btn-group">
                            <a class="btn btn-success btn-icon me-2" href=""  target="_blank"id="imagenimagen1">
                                <i data-feather="image"></i>
                            </a>
                            <button class="btn btn-danger btn-icon mb-5 eliminar-imagen" type="button" id="eliminarimagenimagen1" data-tipo="imagen1" >
                                <i data-feather="trash" ></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-5 mb-3">
                        <label for="imagen2" class="form-label">IMAGEN 2:</label>
                        <input type="file"  accept="image/jpeg" class="form-control imagen2" id="imagen2" name="imagen2" value="{{old('imagen2')}}">
                        @error('imagen2')
                            <span class="error-message" style="color:red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-1">
                        <div class="btn-group">
                            <a class="btn btn-success btn-icon me-2" href=""  target="_blank"id="imagenimagen2">
                                <i data-feather="image"></i>
                            </a>
                            <button class="btn btn-danger btn-icon mb-5 eliminar-imagen" type="button" id="eliminarimagenimagen2" data-tipo="imagen2" >
                                <i data-feather="trash" ></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-5 mb-3">
                        <label for="imagen3" class="form-label">IMAGEN 3:</label>
                        <input type="file"  accept="image/jpeg" class="form-control imagen3" id="imagen3" name="imagen3" value="{{old('imagen3')}}">
                        @error('imagen3')
                            <span class="error-message" style="color:red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-1">
                        <div class="btn-group">
                            <a class="btn btn-success btn-icon me-2" href=""  target="_blank"id="imagenimagen3">
                                <i data-feather="image"></i>
                            </a>
                            <button class="btn btn-danger btn-icon mb-5 eliminar-imagen" type="button" id="eliminarimagenimagen3" data-tipo="imagen3" >
                                <i data-feather="trash" ></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="pdfplano" class="form-label">PDF PLANO:</label>
                        <input type="file" class="form-control pdfplano" id="pdfplano" name="pdfplano" value="{{old('pdfplano')}}">
                        @error('pdfplano')
                            <span class="error-message" style="color:red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-1">
                        <div class="btn-group">
                            <a class="btn btn-success btn-icon me-2" href=""  target="_blank"id="imagenpdfplano">
                                <i data-feather="image"></i>
                            </a>
                            <button class="btn btn-danger btn-icon mb-5 eliminar-imagen" type="button" id="eliminarimagenpdfplano" data-tipo="pdfplano" >
                                <i data-feather="trash" ></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="pdfsunarp" class="form-label">PDF SUNARP:</label>
                        <input type="file" class="form-control pdfsunarp" id="pdfsunarp" name="pdfsunarp" value="{{old('pdfsunarp')}}">
                        @error('pdfsunarp')
                            <span class="error-message" style="color:red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-1">
                        <div class="btn-group">
                            <a class="btn btn-success btn-icon me-2" href=""  target="_blank"id="imagenpdfsunarp">
                                <i data-feather="image"></i>
                            </a>
                            <button class="btn btn-danger btn-icon mb-5 eliminar-imagen" type="button" id="eliminarimagenpdfsunarp" data-tipo="pdfsunarp" >
                                <i data-feather="trash" ></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-5 mb-3">
                        <label for="pdfrentas" class="form-label">PDF RENTAS:</label>
                        <input type="file"  class="form-control pdfrentas" id="pdfrentas" name="pdfrentas" value="{{old('pdfrentas')}}">
                        @error('pdfrentas')
                            <span class="error-message" style="color:red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-1">
                        <div class="btn-group">
                            <a class="btn btn-success btn-icon me-2 mb-5 " href=""  target="_blank" id="imagenpdfrentas">
                                <i data-feather="image" ></i>
                            </a>
                            <button class="btn btn-danger btn-icon mb-5 eliminar-imagen" type="button" id="eliminarimagenpdfrentas" data-tipo="pdfrentas">
                                <i data-feather="trash" ></i>
                            </button>
                        </div>
                    </div>
                    <input type="hidden" name="id_ficha" id="id_ficha" class="id_ficha">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>    
            </form>
            
        </div>
    </div>
    <form action="{{route('imagenes.destroy','test')}}" method="POST" autocomplete="off" id="formEliminar">
        {{method_field('delete')}}
        {{csrf_field()}}
            <div class="modal-footer">
            <input type="hidden" name="id_eliminar" id="id_eliminar">
            <input type="hidden" name="tipo_eliminar" id="tipo_eliminar">
    </form>
</div>

@endsection

@push('plugin-scripts')
<script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
@endpush


@push('custom-scripts')

<script>

$(document).ready(function () {

    $('.eliminar-imagen').click(function () {
        const tipo = $(this).data('tipo');

        $('#tipo_eliminar').val(tipo);
        $('#formEliminar').submit();
    });

    const modalAgregar = document.getElementById('Agregar');

    function actualizarArchivo(valor, enlace, eliminar, ruta) {
        // Limpiar siempre el estado anterior
        $(enlace).attr('href', '').hide();
        $(eliminar).hide();

        // Mostrarlo nuevamente si la ficha actual tiene archivo
        if (valor && valor !== 'null' && valor !== 'undefined') {
            $(enlace)
                .attr('href', ruta + valor)
                .show();

            $(eliminar).show();
        }
    }

    modalAgregar.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;

        const id            = button.getAttribute('data-id');
        const imagenFachada = button.getAttribute('data-fachada');
        const imagenPlano   = button.getAttribute('data-plano');
        const imagen1       = button.getAttribute('data-imagen1');
        const imagen2       = button.getAttribute('data-imagen2');
        const imagen3       = button.getAttribute('data-imagen3');
        const pdfPlano      = button.getAttribute('data-planopdf');
        const pdfRentas     = button.getAttribute('data-rentaspdf');
        const pdfSunarp     = button.getAttribute('data-sunarpdf');

        $('#id_ficha').val(id);
        $('#id_eliminar').val(id);

        // Limpiar archivos seleccionados anteriormente
        $(modalAgregar).find('input[type="file"]').val('');

        actualizarArchivo(
            imagenFachada,
            '#imagenfachada',
            '#eliminarimagenfachada',
            '{{$base}}/imageneslotes/'
        );

        actualizarArchivo(
            imagenPlano,
            '#imagenplano',
            '#eliminarimagenplano',
            '{{$base}}/imagenesplanos/'
        );

        actualizarArchivo(
            imagen1,
            '#imagenimagen1',
            '#eliminarimagenimagen1',
            '{{$base}}/archivos/'
        );

        actualizarArchivo(
            imagen2,
            '#imagenimagen2',
            '#eliminarimagenimagen2',
            '{{$base}}/archivos/'
        );

        actualizarArchivo(
            imagen3,
            '#imagenimagen3',
            '#eliminarimagenimagen3',
            '{{$base}}/archivos/'
        );

        actualizarArchivo(
            pdfPlano,
            '#imagenpdfplano',
            '#eliminarimagenpdfplano',
            '{{$base}}/archivos/'
        );

        actualizarArchivo(
            pdfSunarp,
            '#imagenpdfsunarp',
            '#eliminarimagenpdfsunarp',
            '{{$base}}/archivos/'
        );

        actualizarArchivo(
            pdfRentas,
            '#imagenpdfrentas',
            '#eliminarimagenpdfrentas',
            '{{$base}}/archivos/'
        );
    });
});


</script>
@if($manzana2==0)
    @if($sector2==0)
        <script>

        $("#buscarSector").change(agregarValores);

        function agregarValores(){
            limpiarselect();
            $('#buscarManzana').append("<option value='0' >TODOS</option>");
            <?php foreach ($manzanas as $manzana): ?>
                if('{{$manzana->id_sector}}'==$("#buscarSector option:selected").val()){
                    $('#buscarManzana').append("<option value='{{$manzana->id_mzna}}' >{{$manzana->codi_mzna}}</option>");
                }
            <?php endforeach ?>
        }
        function limpiarselect(){
            $('#buscarManzana').empty();
        }

        </script>
    @else
    <script>
        limpiarselect();
        $('#buscarManzana').append("<option value='0' >TODOS</option>");
        <?php foreach ($manzanas as $manzana): ?>
            if('{{$manzana->id_sector}}'=='{{$sector2}}'){
                $('#buscarManzana').append("<option value='{{$manzana->id_mzna}}' >{{$manzana->codi_mzna}}</option>");
            }
        <?php endforeach ?>

        $('#buscarManzana').val('{{$manzana2}}')
        
        function limpiarselect(){
            $('#buscarManzana').empty();
        }
        $("#buscarSector").change(agregarValores2);
        function agregarValores2(){
            limpiarselect();
            $('#buscarManzana').append("<option value='0' >TODOS</option>");
            <?php foreach ($manzanas as $manzana): ?>
                if('{{$manzana->id_sector}}'==$("#buscarSector option:selected").val()){
                    $('#buscarManzana').append("<option value='{{$manzana->id_mzna}}' >{{$manzana->codi_mzna}}</option>");
                }
            <?php endforeach ?>
        }
    </script>
    @endif
@else
<script>
    limpiarselect();
    $('#buscarManzana').append("<option value='0' >TODOS</option>");
    <?php foreach ($manzanas as $manzana): ?>
        if('{{$manzana->id_sector}}'=='{{$sector2}}'){
            $('#buscarManzana').append("<option value='{{$manzana->id_mzna}}' >{{$manzana->codi_mzna}}</option>");
        }
    <?php endforeach ?>

    $('#buscarManzana').val('{{$manzana2}}')
    
    function limpiarselect(){
        $('#buscarManzana').empty();
    }
    $("#buscarSector").change(agregarValores2);
    function agregarValores2(){
        limpiarselect();
        $('#buscarManzana').append("<option value='0' >TODOS</option>");
        <?php foreach ($manzanas as $manzana): ?>
            if('{{$manzana->id_sector}}'==$("#buscarSector option:selected").val()){
                $('#buscarManzana').append("<option value='{{$manzana->id_mzna}}' >{{$manzana->codi_mzna}}</option>");
            }
        <?php endforeach ?>
    }
</script>

@endif
@endpush
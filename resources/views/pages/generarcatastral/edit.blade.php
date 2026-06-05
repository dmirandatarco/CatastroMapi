@extends('layout.master')
@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" rel="stylesheet" />
@endpush
@section('content')

<form action="{{route('licenciaedificacion.update',$licencia)}}" method="post" class="form-horizontal" enctype="multipart/form-data">
{{method_field('patch')}}
{{csrf_field()}}
<div class="col-md-12 grid-margin stretch-card" >
  <div class="card">
    <input type="hidden" value="{{$licencia->id}}" name="id_licencia">
    <div class="card-body">
      <div class="row">
        <div class="row form-group">
          <h4 class="mb-3"> CREAR LICENCIA</h4>
          <h5 class="modal-title mb-3">Ubicacion del Inmueble</h5>
          <div class="col-md-4">
              <div class="mb-3">
              <label for="nroexpediente" class="form-label">Expediente N°:</label>
              <input type="text" class="form-control nroexpediente" id="nroexpediente" name="nroexpediente" value="{{old('nroexpediente',$licencia->nroexpediente)}}" placeholder="Numero de Expdiente">
              @error('nroexpediente')
                  <span class="error-message" style="color:red">{{ $message }}</span>
              @enderror
              </div>
          </div>
          <div class="col-md-8">
              <div class="mb-3">
              <label for="nrolicencia" class="form-label">N° de Licencia:</label>
              <input type="text" class="form-control nrolicencia" id="nrolicencia"  name="nrolicencia" value="{{old('nrolicencia',$licencia->nrolicencia)}}" placeholder="Numero ded Licencia">
              @error('nrolicencia')
                  <span class="error-message" style="color:red">{{ $message }}</span>
              @enderror
              </div>
          </div>
          <div class="col-md-5">
              <div class="mb-3">
              <label for="administrado1" class="form-label">Administrado 1</label>
              <input type="text" class="form-control administrado1" id="administrado1"  name="administrado1" value="{{old('administrado1',$licencia->administrado1)}}" placeholder="Nombre y Apellido Administrado">
              @error('administrado1')
                  <span class="error-message" style="color:red">{{ $message }}</span>
              @enderror
              </div>
          </div>
          <div class="col-md-5">
              <div class="mb-3">
              <label for="administrado2" class="form-label">Administrado 2</label>
              <input type="text" class="form-control administrado2" id="administrado2"  name="administrado2" value="{{old('administrado2',$licencia->administrado2)}}" placeholder="Nombre y Apellido Administrado">
              @error('administrado2')
                  <span class="error-message" style="color:red">{{ $message }}</span>
              @enderror
              </div>
          </div>

          <div class="col-md-2">
              <div class="mb-3">
              <label for="propietario" class="form-label">Propietario</label>
                  <div class="form-check form-switch mt-2">
                      <input type="checkbox" class="form-check-input" name="propietario"  id="propietario" @checked(old('propietario',$licencia->propietario))>
                      <label class="form-check-label" for="propietario"> NO / SI</label>
                  </div>
              </div>
          </div>

          <div class="col-md-3">
              <div class="mb-3">
              <label for="tipolicencia" class="form-label">Licencia de:</label>
              <input type="text" class="form-control tipolicencia" id="tipolicencia" name="tipolicencia" value="{{old('tipolicencia',$licencia->tipolicencia)}}" placeholder="Tipo de Licencia">
              @error('tipolicencia')
                  <span class="error-message" style="color:red">{{ $message }}</span>
              @enderror
              </div>
          </div>
          <div class="col-md-3">
              <div class="mb-3">
              <label for="uso" class="form-label">Uso:</label>
              <input type="text" class="form-control uso" id="uso" name="uso" value="{{old('uso',$licencia->uso)}}" placeholder="Uso">
              @error('uso')
                  <span class="error-message" style="color:red">{{ $message }}</span>
              @enderror
              </div>
          </div>
          <div class="col-md-3">
              <div class="mb-3">
              <label for="zonificacion" class="form-label">Zonificacion:</label>
              <input type="text" class="form-control zonificacion" id="zonificacion" name="zonificacion" value="{{old('zonificacion',$licencia->zonificacion)}}" placeholder="Zonificación">
              @error('zonificacion')
                  <span class="error-message" style="color:red">{{ $message }}</span>
              @enderror
              </div>
          </div>
          <div class="col-md-3">
              <div class="row">
                  <div class="col-md-6">
                      <div class="mb-3">
                          <label for="alturapisos" class="form-label">Altura Pisos:</label>
                          <input type="text" class="form-control alturapisos" id="alturapisos" name="alturapisos" value="{{old('alturapisos',$licencia->alturapisos)}}" placeholder="altura pisos">
                          @error('alturapisos')
                              <span class="error-message" style="color:red">{{ $message }}</span>
                          @enderror
                      </div>
                  </div>

                  <div class="col-md-6">
                      <div class="mb-3">
                          <label for="alturametros" class="form-label">Altura Metros:</label>
                          <input type="text" class="form-control alturametros" id="alturametros" name="alturametros" value="{{old('alturametros',$licencia->alturametros)}}" placeholder="altura metros">
                          @error('alturametros')
                              <span class="error-message" style="color:red">{{ $message }}</span>
                          @enderror
                      </div>
                  </div>
              </div>
          </div>

          <h5 class="modal-title">Ubicacion del Inmueble</h5>

          <div class="col-md-4">
              <div class="mb-3">
              <label for="departamento" class="form-label">Departamento</label>
              <input type="text" class="form-control departamento" id="departamento" name="departamento" value="{{old('departamento',$licencia->departamento)}}" placeholder="Departamento">
              @error('departamento')
                  <span class="error-message" style="color:red">{{ $message }}</span>
              @enderror
              </div>
          </div>
          <div class="col-md-4">
              <div class="mb-3">
              <label for="provincia" class="form-label">Provincia:</label>
              <input type="text" class="form-control provincia" id="provincia" name="provincia" value="{{old('provincia',$licencia->provincia)}}" placeholder="Provincia">
              @error('provincia')
                  <span class="error-message" style="color:red">{{ $message }}</span>
              @enderror
              </div>
          </div>
          <div class="col-md-4">
              <div class="mb-3">
              <label for="distrito" class="form-label">Distrito:</label>
              <input type="text" class="form-control distrito" id="distrito" name="distrito" value="{{old('distrito',$licencia->distrito)}}" placeholder="Distrito">
              @error('distrito')
                  <span class="error-message" style="color:red">{{ $message }}</span>
              @enderror
              </div>
          </div>

          <div class="col-md-3">
              <div class="mb-3">
              <label for="haburbana" class="form-label">Urbanizacion / A.H. / Otro:</label>
              <input type="text" class="form-control haburbana" id="haburbana" name="haburbana" value="{{old('haburbana',$licencia->haburbana)}}" placeholder="Habilitación Urbana">
              @error('haburbana')
                  <span class="error-message" style="color:red">{{ $message }}</span>
              @enderror
              </div>
          </div>
          <div class="col-md-1">
              <div class="mb-3">
              <label for="mzna" class="form-label">Mz.:</label>
              <input type="text" class="form-control mzna" id="mzna" name="mzna" value="{{old('mzna',$licencia->mzna)}}" placeholder="Manzana">
              @error('mzna')
                  <span class="error-message" style="color:red">{{ $message }}</span>
              @enderror
              </div>
          </div>
          <div class="col-md-1">
              <div class="mb-3">
              <label for="lote" class="form-label">Lote:</label>
              <input type="text" class="form-control lote" id="lote" name="lote" value="{{old('lote',$licencia->lote)}}" placeholder="Lote">
              @error('lote')
                  <span class="error-message" style="color:red">{{ $message }}</span>
              @enderror
              </div>
          </div>
          <div class="col-md-1">
              <div class="mb-3">
              <label for="sublote" class="form-label">SubLote:</label>
              <input type="text" class="form-control sublote" id="sublote" name="sublote" value="{{old('sublote',$licencia->sublote)}}" placeholder="Sub lote">
              @error('sublote')
                  <span class="error-message" style="color:red">{{ $message }}</span>
              @enderror
              </div>
          </div>
          <div class="col-md-4">
              <div class="mb-3">
              <label for="calle" class="form-label">Av. / Jr. / Calle:</label>
              <input type="text" class="form-control calle" id="calle" name="calle" value="{{old('calle',$licencia->calle)}}" placeholder="Calle">
              @error('calle')
                  <span class="error-message" style="color:red">{{ $message }}</span>
              @enderror
              </div>
          </div>
          <div class="col-md-1">
              <div class="mb-3">
              <label for="nro" class="form-label">N°:</label>
              <input type="text" class="form-control nro" id="nro" name="nro" value="{{old('nro',$licencia->nro)}}" placeholder="Nº">
              @error('nro')
                  <span class="error-message" style="color:red">{{ $message }}</span>
              @enderror
              </div>
          </div>
          <div class="col-md-1">
              <div class="mb-3">
              <label for="interior" class="form-label">Int.:</label>
              <input type="text" class="form-control interior" id="interior" name="interior" value="{{old('interior',$licencia->interior)}}" placeholder="int.">
              @error('interior')
                  <span class="error-message" style="color:red">{{ $message }}</span>
              @enderror
              </div>
          </div>


          <div class="col-md-4">
              <div class="mb-3">
              <label for="areatechada" class="form-label">Area Techada Total:</label>
              <input type="number"  step="0.01" class="form-control areatechada" id="areatechada" name="areatechada" value="{{old('areatechada',$licencia->areatechada)}}" placeholder="Area Techada">
              @error('areatechada')
                  <span class="error-message" style="color:red">{{ $message }}</span>
              @enderror
              </div>
          </div>
          <div class="col-md-4">
              <div class="mb-3">
              <label for="valorobra" class="form-label">Valor de Obra:</label>
              <input type="number"  step="0.01" class="form-control valorobra" id="valorobra" name="valorobra" value="{{old('valorobra',$licencia->valorobra)}}" placeholder="Valor de Obra">
              @error('valorobra')
                  <span class="error-message" style="color:red">{{ $message }}</span>
              @enderror
              </div>
          </div>
          <div class="col-md-4">
              <div class="mb-3">
              <label for="pisosautorizados" class="form-label">Pisos Autorizados:</label>
              <input type="text" class="form-control pisosautorizados" id="pisosautorizados" name="pisosautorizados" value="{{old('pisosautorizados',$licencia->pisosautorizados)}}" placeholder="Pisos Autorizados">
              @error('pisosautorizados')
                  <span class="error-message" style="color:red">{{ $message }}</span>
              @enderror
              </div>
          </div>

          <div class="col-md-4">
              <div class="mb-3">
              <label for="nrosotano" class="form-label">N° Sotano(s):</label>
              <input type="text" class="form-control nrosotano" id="nrosotano" name="nrosotano" value="{{old('nrosotano',$licencia->nrosotano)}}" placeholder="Nº Sotanos">
              @error('nrosotano')
                  <span class="error-message" style="color:red">{{ $message }}</span>
              @enderror
              </div>
          </div>
          <div class="col-md-4">
              <div class="mb-3">
              <label for="semisotano" class="form-label">Semisotano:</label>
              <input type="text" class="form-control semisotano" id="semisotano" name="semisotano" value="{{old('semisotano',$licencia->semisotano)}}" placeholder="Semisotano">
              @error('semisotano')
                  <span class="error-message" style="color:red">{{ $message }}</span>
              @enderror
              </div>
          </div>
          <div class="col-md-4">
              <div class="mb-3">
              <label for="azotea" class="form-label">Azotea:</label>
              <input type="text" class="form-control azotea" id="azotea" name="azotea" value="{{old('azotea',$licencia->azotea)}}" placeholder="Azotea">
              @error('azotea')
                  <span class="error-message" style="color:red">{{ $message }}</span>
              @enderror
              </div>
          </div>

          <div class="col-md-6">
              <div class="mb-3">
              <label for="dictamen" class="form-label">Aprobado con dictamen:</label>
              <input type="text" class="form-control dictamen" id="dictamen" name="dictamen" value="{{old('dictamen',$licencia->dictamen)}}" placeholder="Aprobado por Dictamen">
              @error('dictamen')
                  <span class="error-message" style="color:red">{{ $message }}</span>
              @enderror
              </div>
          </div>
          <div class="col-md-3">
              <div class="mb-3">
              <label for="calificacion" class="form-label">Calificación:</label>
              <input type="text" class="form-control calificacion" id="calificacion" name="calificacion" value="{{old('calificacion',$licencia->calificacion)}}" placeholder="Calificacion">
              @error('calificacion')
                  <span class="error-message" style="color:red">{{ $message }}</span>
              @enderror
              </div>
          </div>
          <div class="col-md-3"></div>

          <div class="col-md-6">
              <div class="mb-3">
              <label for="licencia" class="form-label">Modalidad de Licencia:</label>
              <input type="text" class="form-control licencia" id="licencia" name="licencia" value="{{old('licencia',$licencia->licencia)}}" placeholder="Modalidad de Licencia">
              @error('licencia')
                  <span class="error-message" style="color:red">{{ $message }}</span>
              @enderror
              </div>
          </div>
          <div class="col-md-4">
              <div class="mb-3">
              <label for="responsable" class="form-label">Responsable:</label>
              <input type="text" class="form-control responsable" id="responsable" name="responsable" value="{{old('responsable',$licencia->responsable)}}" placeholder="Responsable de obra">
              @error('responsable')
                  <span class="error-message" style="color:red">{{ $message }}</span>
              @enderror
              </div>
          </div>
          <div class="col-md-2">
              <div class="mb-3">
              <label for="codresponsable" class="form-label">Cod. Responsable:</label>
              <input type="text" class="form-control codresponsable" id="codresponsable" name="codresponsable" value="{{old('codresponsable',$licencia->codresponsable)}}" placeholder="codigo de responsable">
              @error('codresponsable')
                  <span class="error-message" style="color:red">{{ $message }}</span>
              @enderror
              </div>
          </div>

          <div class="col-md-4">
              <div class="mb-3">
              <label for="pagotramite" class="form-label">Pago por derecho de tramite:</label>
              <input type="number" step="0.01" class="form-control pagotramite" id="pagotramite" name="pagotramite" value="{{old('pagotramite',$licencia->pagotramite)}}" placeholder="Pago Tramite">
              @error('pagotramite')
                  <span class="error-message" style="color:red">{{ $message }}</span>
              @enderror
              </div>
          </div>
          <div class="col-md-4">
              <div class="mb-3">
              <label for="recibo" class="form-label">Nro de Recibo:</label>
              <input type="text" class="form-control recibo" id="recibo" name="recibo" value="{{old('recibo',$licencia->recibo)}}" placeholder="Nº de Recibo">
              @error('recibo')
                  <span class="error-message" style="color:red">{{ $message }}</span>
              @enderror
              </div>
          </div>
          <div class="col-md-4">
              <div class="mb-3">
              <label for="fecha_recibo" class="form-label">Fecha de Recibo:</label>
              <input type="date" class="form-control fecha_recibo" id="fecha_recibo" name="fecha_recibo" value="{{old('fecha_recibo',$licencia->fecha_recibo)}}">
              @error('fecha_recibo')
                  <span class="error-message" style="color:red">{{ $message }}</span>
              @enderror
              </div>
          </div>

          <div class="col-md-12">
              <h6 class="mb-3">Descripcion</h6>
              <div class="mb-3">
                  <div>
                      <textarea class="form-control" name="observacion" id="observacion" rows="5" placeholder="Observaciones">{{old('observacion',$licencia->observacion)}}</textarea>
                  </div>
                  @error('observacion')
                      <span class="error-message" style="color:red">{{ $message }}</span>
                  @enderror
              </div>
          </div>

          <div class="col-md-12">
            <h6 class="mb-3">Recomendaciones</h6>
            <div class="mb-3">
                <textarea class="form-control" name="recomendaciones" id="recomendaciones" rows="10" placeholder="recomendaciones">{{old('recomendaciones',$licencia->recomendaciones)}}</textarea>
                @error('recomendaciones')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
          </div>
        </div>
        <span class="spanrequired">(*)Campos Obligatorios</span>
        <div class="modal-footer">
            <a href="{{route('licenciaedificacion.index')}}">
                <button type="button" class="btn btn-secondary">Cerrar</button>
            </a>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </div>
  </div>
</div>
</form>

@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
  <script src="{{ asset('assets/plugins/ckeditor/ckeditor.js') }}"></script>
  <script src="{{ asset('assets/plugins/ckeditor/es.js') }}"></script>
@endpush


@push('custom-scripts')
<script>

ClassicEditor
.create( document.querySelector( '#observacion' ),{
  language: 'es',
})
.then(editor => {
    editor.keystrokes.set( 'space', ( key, stop ) => {
        editor.execute( 'input', { text: '\u00a0' } );
        stop();
    } );
})
.catch( error => {
    console.error( error );
} );

ClassicEditor
.create( document.querySelector( '#recomendaciones' ),{
  language: 'es',
})
.then(editor => {
    editor.keystrokes.set( 'space', ( key, stop ) => {
        editor.execute( 'input', { text: '\u00a0' } );
        stop();
    } );
})
.catch( error => {
    console.error( error );
} );

</script>
@endpush
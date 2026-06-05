@extends('layout.master')
@push('plugin-styles')
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
@endpush
@section('content')


<div class="row">
    <div class="col-md-12 grid-margin stretch-card" >
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <form action="{{route('vias.update',$via)}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    {{method_field('patch')}}
                    {{csrf_field()}}
                    <div class="row form-group">
                        <h4 class="mb-4"> Editar Via {{$via->nomb_via}}</h4>
                        
                        <div class="mb-3 col-md-6">
                            <label for="recipient-name" class="form-label">Nombre:</label>
                            <input type="text" class="form-control nomb_via" id="nomb_via" name="nomb_via" value="{{$via->nomb_via}}">
                            @error('nomb_via')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="recipient-name" class="form-label">Tipo:</label>
                            <input type="text" class="form-control tipo_via" id="tipo_via" name="tipo_via" value="{{$via->tipo_via}}">
                            @error('tipo_via')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="recipient-name" class="form-label">Codigo:</label>
                            <input type="text" class="form-control codi_via" id="codi_via" name="codi_via" value="{{$via->codi_via}}">
                            @error('codi_via')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="recipient-name" class="form-label">Fecha:</label>
                            <input type="date" class="form-control fecha_via" id="fecha_via" name="fecha_via" value="{{$via->fecha_via}}">
                            @error('fecha_via')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Habilitación Urbana</label>
                            <select class="form-select" data-width="100%" data-live-search="true" name="hab_urb_id[]" id="hab_urb_id" multiple>
                                @foreach($hab_urbanas as $hab_urb)
                                    <option value="{{ str_pad($hab_urb->id_hab_urba, 10, '0', STR_PAD_LEFT) }}" 
                                        {{ in_array($hab_urb->id_hab_urba, $hab_urbanas_vias->pluck('id_hab_urba')->toArray()) ? 'selected' : '' }}>
                                        {{ $hab_urb->nomb_hab_urba }}
                                    </option>
                                @endforeach
                            </select>
                            @error('hab_urb_id')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
@endpush

@push('custom-scripts')
<script>
$('#hab_urb_id').select2();
</script>
@endpush
@extends('layout.master')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card" >
        <div class="card">
            <div class="card-header">
                <h4 class="text-center">¿Desea Agregar ficha adicional?</h4>
            </div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
                    </div>
                @endif
                <form action="{{route('ficha.createcotitularidad','test')}}" method="get" class="form-horizontal" enctype="multipart/form-data">
                {{csrf_field()}}
                <div style="text-align-last: center;">
                    <h4 class="mb-3">Cantidad de Cotitulares</h4>
                    <input type="number" class="form-control" name="cantidad_cotitutal">
                    @error('cantidad_cotitutal')
                        <span class="error-message" style="color:red">{{ $message }}</span>
                    @enderror
                    <input type="hidden" name="fichaanterior" class="fichaanterior" value="{{$ficha->id_ficha}}">
                </div>
                <br></br>
                    <div style="text-align-last: center;">
                        <button type="submit" class="btn btn-primary"><i data-feather="plus-circle"></i> Agregar Ficha Cotitularidad</button>
                        <a href="{{route('reporte.reportelista')}}">
                            <button type="button" class="btn btn-info" ><i data-feather="x-circle"></i> Cancelar</button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection





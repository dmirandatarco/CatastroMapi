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
                <div style="text-align-last: center;">
                    <a href="{{route('ficha.createeconomica',$ficha)}}">
                        <button type="button" class="btn btn-primary"><i data-feather="plus-circle"></i> Agregar Ficha Economica</button>
                        <a href="{{route('reporte.reportelista')}}">
                            <button type="button" class="btn btn-info" ><i data-feather="x-circle"></i> Cancelar</button>
                        </a>
                    </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </div>
                
            </div>
        </div>
    </div>
</div>

@endsection





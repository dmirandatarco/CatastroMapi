@extends('layout.master')
@push('plugin-styles')
<link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush
@section('content')
<div class="row inbox-wrapper">
    <div class="col-md-12">
        <div class="card">
            <div style="text-align-last: right !important;margin: 10px 10px 0px 0px;">
                <button type="button" class="btn btn-success btn-icon printer" onclick="window.print();">
                    <i data-feather="printer"></i>
                </button>
            </div>
            <div class="card-body">
                <div class="row">
                    <h4 class="mb-3">Listado de Roles</h4>
                    <div class="mb-5">
                        <a href="{{ route('roles.create')}}">
                            <button type="button" class="btn btn-primary mb-2 mb-md-0 ">
                                <i data-feather="user-plus"></i><b> &nbsp; Crear Rol</b>
                            </button>
                        </a>

                    </div>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table id="roles" class="table">
                            <thead>
                                <tr>
                                    <th>Numero</th>
                                    <th>Nombre</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $role)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$role->name}}</td>
                                    <td>

                                        <a href="{{ route('roles.edit',$role) }}">
                                            <button type="submit" class="btn btn-icon btn-primary"><i data-feather="edit"></i></button>
                                        </a>

                                    </td>
                                    <td>

                                        <form action="{{ route('roles.destroy',$role) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-icon"><i data-feather="trash-2"></i></button>
                                        </form>

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

@endsection

@push('plugin-scripts')
<script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
@endpush

@push('custom-scripts')

<script>
    $(function() {
        'use strict';

        $(function() {
            $('#roles').DataTable({
                "aLengthMenu": [
                    [10, 30, 50, -1],
                    [10, 30, 50, "All"]
                ],
                "language": {
                    "lengthMenu": "Mostrar  _MENU_  registros por paginas",
                    "zeroRecords": "Nada encontrado - disculpa",
                    "info": "Mostrando la página page _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles.",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    "search": "Buscar:",
                    "paginate": {
                        "next": "Siguiente",
                        "previous": "Anterior",
                    }
                },
                "columnDefs": [{
                    targets: [2, 3],
                    orderable: false
                }]
            });
        });

    });
</script>
@endpush
@extends('layout.master')

@section('content')
<div class="row inbox-wrapper">
    <div class="col-md-12">
        <div class="card">
        <div class="card-body">
            <div class="row">
            <h4 class="mb-3">Editar Rol</h4>
            {!! Form::model($role, ['route'=>['roles.update',$role], 'method'=>'put'])!!}

            <div class="mb-5">
                <input type="text" class="form-control" name="name" placeholder="Nombre del Rol" value="{{$role->name}}">
                @error('name')
                <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
            <h4 class="mb-3">Permisos</h4>

                <div class="row">
                @php
                    $currentCategory = null;
                    @endphp

                    @foreach($permissions as $permission)
                        @if ($currentCategory !== $permission->categoria)
                            @if($currentCategory!='')
                                </div>
                            @endif
                            @php
                                $currentCategory = $permission->categoria;
                            @endphp

                            <div class="col-md-4">
                                <h3 class="mb-3">Categoría: {{ $currentCategory }}</h3>

                        @endif
                            <div class="form-check form-switch mb-2">
                                {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'form-check-input']) !!}
                                <label class="form-check-label" for="formSwitch1">{{ $permission->description }}</label>
                            </div>
                    @endforeach
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3" style="float:right">Guardar</button>
        {!! Form::close()!!}
        </div>
        </div>
    </div>
</div>

@endsection

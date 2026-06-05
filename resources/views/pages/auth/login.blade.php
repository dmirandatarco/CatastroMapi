@extends('layout.master2')

@section('content')
    <div class="page-content d-flex align-items-center justify-content-center">

        <div class="row w-100 mx-0 auth-page">
            <div class="col-md-10 col-xl-8 mx-auto">
                <div class="card">
                    <div class="row">
                        <div class="col-md-5 pe-md-0">
                            <div class="auth-side-wrapper imagen_principal"
                                style="background-image: url({{ asset('storage/img/muni.jpg') }} );">

                            </div>
                        </div>
                        <div class="col-md-7 ps-md-0">

                            <div class="auth-form-wrapper px-4 py-5">
                                <a href="#" class="noble-ui-logo d-block mb-2">MUNICIPALIDAD DISTRITAL DE MACHUPICCHU</a>
                                <form class="forms-sample" method="post" action="{{ route('login') }}">
                                    {{ csrf_field() }}
                                    <div class="mb-3">
                                        <label for="userEmail" class="form-label">Usuario</label>
                                        <input type="text" class="form-control no-transform" id="userEmail" placeholder="Usuario"
                                            name="usuario" >
                                        @error('usuario')
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="userPassword" class="form-label">Contraseña</label>
                                        <input type="password" class="form-control no-transform" id="userPassword"
                                            autocomplete="current-password" placeholder="Contraseña" name="password" >
                                        @error('password')
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-primary me-2 mb-2 mb-md-0">Iniciar Sesión</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

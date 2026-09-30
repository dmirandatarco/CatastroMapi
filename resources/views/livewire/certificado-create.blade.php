<div class="card">
    <div class="card-body">
        <h4 class="mb-2">{{ $tipo === 'numeracion' ? 'Certificado de numeración' : 'Certificado negativo catastral' }}</h4>
        <p class="text-muted">Ficha {{ $fichaanterior->nume_ficha }} · Completa los datos pendientes. Los datos disponibles se toman de la ficha.</p>
        <form wire:submit.prevent="register">
            @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    <strong>Revisa los datos antes de emitir.</strong>
                    <ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                </div>
            @endif
            @if($puertas->count() > 1)
                <div class="mb-4">
                    <label for="puerta-certificado" class="form-label">Puerta de referencia</label>
                    <select id="puerta-certificado" class="form-select" wire:model="puertaId">
                        <option value="">Selecciona la puerta que corresponde</option>
                        @foreach($puertas as $puerta)
                            <option value="{{ $puerta->id_puerta }}">{{ $puerta->via?->tipo_via }} {{ $puerta->via?->nomb_via }} · N.º {{ $puerta->nume_muni }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
            <div class="row">
                @foreach($campos as $key => $campo)
                    @if(!in_array($key, $autocompletados))
                        @include('livewire.partials.campo-certificado')
                    @endif
                @endforeach
            </div>
            <div class="row mb-3">
                @foreach(['foto' => 'Vista frontal / fotografía', 'plano' => 'Plano de ubicación'] as $key => $label)
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="archivo-{{ $key }}">{{ $label }}</label>
                        @if(isset($imagenes[$key]))
                            <p class="text-success">Imagen disponible en la ficha. Se conservará una copia en el certificado.</p>
                            <details><summary>Usar otra imagen para esta emisión</summary>
                        @endif
                        <input id="archivo-{{ $key }}" type="file" accept="image/jpeg,image/png" class="form-control" wire:model="{{ $key }}">
                        <small class="text-muted">JPG o PNG, hasta 8 MB.</small>
                        @if(isset($imagenes[$key]))</details>@endif
                        @error($key)<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                @endforeach
            </div>
            <details class="border rounded p-3 mb-4" @if(collect($errors->keys())->contains(fn($key) => in_array(str_replace('datos.', '', $key), $autocompletados))) open @endif>
                <summary>Revisar datos completados automáticamente ({{ count($autocompletados) }})</summary>
                <p class="text-muted mt-2">Los ajustes se guardan en este certificado y no modifican la ficha.</p>
                <div class="row">
                    @foreach($campos as $key => $campo)
                        @if(in_array($key, $autocompletados))
                            @include('livewire.partials.campo-certificado')
                        @endif
                    @endforeach
                </div>
            </details>
            <button class="btn btn-primary" type="submit" wire:loading.attr="disabled">
                <span wire:loading.remove wire:target="register">Generar y guardar en el historial</span>
                <span wire:loading wire:target="register">Guardando certificado…</span>
            </button>
            <span wire:loading wire:target="foto,plano" class="ms-2 text-muted">Cargando imagen…</span>
        </form>
    </div>
</div>

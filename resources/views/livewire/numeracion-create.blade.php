<div class="cc" wire:init="cargarUbicacion">
    @include('livewire.partials.estilos-certificado')
    <div class="cc-header">
        <div><div class="cc-eyebrow">Catastro · Nueva emisión</div><h3>Certificado de numeración</h3><p class="cc-description">Completa la solicitud y el número asignado. Los datos del predio vienen de su ficha.</p></div>
        <span class="cc-badge">Ficha {{ $fichaanterior->nume_ficha }}</span>
    </div>
    <form wire:submit.prevent="register">
        @if($errors->any())<div class="alert alert-danger" role="alert"><strong>Revisa lo siguiente:</strong><ul class="mb-0 mt-2">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
        <div class="row">
            <div class="col-lg-7">
                @foreach([
                    'Datos de la solicitud' => ['fut', 'expediente', 'solicitante', 'informe'],
                    'Numeración municipal' => ['numero_municipal', 'tipo_numero', 'estado_numeracion', 'cuadra', 'lado'],
                    'Recibo de pago' => ['recibo', 'monto_recibo', 'fecha_recibo'],
                ] as $titulo => $keys)
                    <section class="cc-panel">
                        <h5><span class="cc-step">{{ $loop->iteration }}</span>{{ $titulo }}</h5>
                        <div class="row mt-3">
                            @foreach($keys as $key)
                                <div class="{{ in_array($key, ['solicitante', 'informe', 'lado']) ? 'col-12' : 'col-sm-6' }} mb-3">
                                    <label for="cn-{{ $key }}" class="cc-label">{{ $campos[$key][0] }} @if(str_contains($campos[$key][2], 'required'))<span class="text-danger">*</span>@endif</label>
                                    <input id="cn-{{ $key }}" class="form-control" type="{{ $campos[$key][1] }}" @if($key === 'solicitante') wire:model.lazy="datos.{{ $key }}" @else wire:model.defer="datos.{{ $key }}" @endif @if($key === 'monto_recibo') step="0.01" min="0" @endif @if(preg_match('/max:(\d+)/', $campos[$key][2], $limite) && $campos[$key][1] === 'text') maxlength="{{ $limite[1] }}" @endif>
                                    @error('datos.'.$key)<div class="text-danger">{{ $message }}</div>@enderror
                                </div>
                            @endforeach
                        </div>
                        @if($titulo === 'Numeración municipal')
                            <label for="cn-foto" class="cc-label">Fotografía de la puerta <span class="text-danger">*</span></label>
                            <input id="cn-foto" type="file" class="form-control" wire:model="foto" accept="image/jpeg,image/png">
                            <div class="cc-muted mt-2">JPG o PNG · máximo 8 MB</div>
                            <div wire:loading wire:target="foto" class="cc-muted mt-2">Cargando fotografía…</div>
                            @error('foto')<div class="text-danger">{{ $message }}</div>@enderror
                            @if($foto && in_array(strtolower($foto->getClientOriginalExtension()), ['jpg', 'jpeg', 'png']))<img class="cc-photo mt-3" src="{{ $foto->temporaryUrl() }}" alt="Fotografía de la puerta seleccionada">@endif
                        @endif
                        @if($loop->last)
                            <div class="cc-footer"><div class="cc-muted">Correlativo automático al guardar.<br>La emisión se conserva en el historial.</div><button type="submit" class="cc-submit" wire:loading.attr="disabled" wire:target="register,foto"><span wire:loading.remove wire:target="register">Generar certificado</span><span wire:loading wire:target="register">Generando…</span></button></div>
                        @endif
                    </section>
                @endforeach
            </div>
            <aside class="col-lg-5">
                <section class="cc-panel">
                    <h5>Datos de la ficha</h5><p class="cc-description">Se incorporan automáticamente.</p>
                    <div class="cc-code">@foreach(['ubigeo' => 'Ubigeo', 'sector' => 'Sector', 'manzana' => 'Manzana', 'lote' => 'Lote'] as $key => $label)<div><small>{{ $label }}</small><strong>{{ $resumen[$key] ?: '—' }}</strong></div>@endforeach</div>
                    <p class="cc-fixed">Cusco · Urubamba · Machupicchu</p>
                    @foreach(['titulares' => 'Titulares / cotitulares', 'direccion' => 'Ubicación · puerta principal P', 'tipo_puerta' => 'Tipo de puerta', 'tipo_numeracion' => 'Tipo de numeración'] as $key => $label)
                        <div class="cc-muted mt-3 mb-1">{{ $label }}</div><div class="cc-name">{{ $resumen[$key] ?: 'Falta registrar este dato en la ficha.' }}</div>
                    @endforeach
                </section>
                @include('livewire.partials.ubicacion-certificado')
                <section class="cc-panel"><h5>Observaciones</h5><p class="cc-description mb-3">El solicitante se incorpora automáticamente al texto establecido.</p><div class="cc-fixed" style="white-space:pre-line">{{ $observaciones }}</div></section>
            </aside>
        </div>
    </form>
</div>

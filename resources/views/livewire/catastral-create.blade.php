<div class="cc" wire:init="cargarUbicacion">
    @include('livewire.partials.estilos-certificado')
    <div class="cc-header">
        <div>
            <div class="cc-eyebrow">Catastro · Nueva emisión</div>
            <h3>Certificado catastral</h3>
            <p class="cc-description">Completa los datos de la solicitud. La información del predio ya viene de la ficha.</p>
        </div>
        <span class="cc-badge">Ficha {{ $fichaanterior->nume_ficha }}</span>
    </div>
    <form wire:submit.prevent="register">
        @if($errors->any())
            <div class="alert alert-danger" role="alert"><strong>Revisa lo siguiente:</strong><ul class="mb-0 mt-2">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
        @endif
        <div class="row">
            <div class="col-lg-7">
                <section class="cc-panel">
                    <h5><span class="cc-step">1</span> Datos de la solicitud</h5>
                    <p class="cc-description">Estos son los datos que necesitas completar para emitir el certificado.</p>
                    <div class="cc-block">
                        <label for="cc-naturaleza" class="cc-label">Naturaleza del predio <span class="text-danger">*</span></label>
                        <input id="cc-naturaleza" class="form-control" wire:model.defer="datos.naturaleza" maxlength="150" placeholder="Escribe la naturaleza del predio">
                        @error('datos.naturaleza')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="cc-block">
                        <label for="cc-solicitante" class="cc-label">¿Quién solicita el certificado? <span class="text-danger">*</span></label>
                        <input id="cc-solicitante" class="form-control" wire:model.defer="datos.solicitante" maxlength="250" placeholder="Nombres y apellidos o razón social" autocomplete="off">
                        @error('datos.solicitante')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="cc-block">
                        <label for="cc-observaciones" class="cc-label">Observaciones</label>
                        <textarea id="cc-observaciones" class="form-control" wire:model.defer="datos.observaciones" rows="5" maxlength="1800" placeholder="Agrega las observaciones del certificado"></textarea>
                        <div class="cc-muted mt-2">El texto inicial incluye a los titulares. Puedes ajustarlo según la solicitud.</div>
                        @error('datos.observaciones')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                </section>
                <section class="cc-panel">
                    <h5><span class="cc-step">2</span> Recibo de pago</h5>
                    <div class="row mt-3">
                        <div class="col-sm-6 mb-3">
                            <label for="cc-recibo" class="cc-label">Número de recibo <span class="text-danger">*</span></label>
                            <input id="cc-recibo" class="form-control" wire:model.defer="datos.recibo" maxlength="50" placeholder="Ej. 004-03155">
                            @error('datos.recibo')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="cc-fecha" class="cc-label">Fecha del recibo <span class="text-danger">*</span></label>
                            <input id="cc-fecha" type="date" class="form-control" wire:model.defer="datos.fecha_recibo">
                            @error('datos.fecha_recibo')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="cc-footer">
                        <div class="cc-muted">El correlativo se asigna automáticamente<br>al guardar en el historial.</div>
                        <button class="cc-submit" type="submit" wire:loading.attr="disabled" wire:target="register"><span wire:loading.remove wire:target="register">Generar certificado</span><span wire:loading wire:target="register">Generando…</span></button>
                    </div>
                </section>
            </div>
            <aside class="col-lg-5">
                <section class="cc-panel">
                    <h5>Datos de la ficha</h5>
                    <p class="cc-description">Se incorporan automáticamente al certificado.</p>
                    <div class="cc-code" aria-label="Código de referencia catastral">
                        @foreach(['ubigeo' => 'Ubigeo', 'sector' => 'Sector', 'manzana' => 'Manzana', 'lote' => 'Lote'] as $key => $label)
                            <div><small>{{ $label }}</small><strong>{{ $resumen[$key] ?: '—' }}</strong></div>
                        @endforeach
                    </div>
                    <div class="cc-muted mb-1">Titulares / cotitulares</div>
                    <div class="cc-name">{{ $resumen['titulares'] ?: 'Sin titulares registrados en la ficha.' }}</div>
                    <div class="cc-muted mt-3 mb-1">Dirección · puerta principal P</div>
                    <div class="cc-name">{{ $resumen['direccion'] ?: 'Falta registrar la dirección de la puerta principal P.' }}</div>
                    <div class="cc-stats">
                        <div class="cc-stat"><small>Área verificada</small><strong>{{ is_numeric($resumen['area']) ? number_format((float)$resumen['area'], 2) : '—' }}</strong> m²</div>
                        <div class="cc-stat"><small>Perímetro</small><strong>{{ $resumen['perimetro'] ?? '—' }}</strong> m</div>
                    </div>
                    @if($resumen['perimetro'] === null)<p class="text-danger mt-2">Revisa los cuatro linderos de campo en la ficha para calcular el perímetro.</p>@endif
                    <div class="cc-fixed mt-3">UTM WGS 84 · Zona 18S</div>
                </section>
                <section class="cc-panel">
                    <h5>Imágenes de la ficha</h5>
                    <p class="cc-description mb-3">Se incorporan y conservan con esta emisión.</p>
                    <div class="row">
                        @foreach(['foto' => 'Fotografía'] as $key => $label)
                            <div class="col-6">
                                @if(isset($imagenes[$key]))
                                    <img class="cc-photo" src="{{ route('certificados.catastral.imagen', ['ficha' => $fichaanterior, 'tipo' => $key]) }}" alt="{{ $label }} de la ficha">
                                @elseif($key === 'plano')
                                    <div class="cc-empty">Plano pendiente · puedes generar el certificado</div>
                                @else
                                    <div class="cc-empty">Falta {{ strtolower($label) }} en la ficha</div>
                                @endif
                                <div class="cc-muted text-center mt-2">{{ $label }}</div>
                            </div>
                        @endforeach
                    </div>
                    <div class="cc-fixed mt-3">La leyenda, la base legal y el texto final se incluyen automáticamente con el formato establecido.</div>
                </section>
                @include('livewire.partials.ubicacion-certificado')
            </aside>
        </div>
    </form>
</div>

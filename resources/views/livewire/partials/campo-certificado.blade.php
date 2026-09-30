<div class="{{ $campo[1] === 'textarea' ? 'col-12' : 'col-md-6 col-xl-4' }} mb-3" wire:key="campo-{{ $key }}">
    <label class="form-label" for="certificado-{{ $key }}">{{ $campo[0] }} {{ str_starts_with($campo[2], 'required') ? '*' : '(opcional)' }}</label>
    @if($campo[1] === 'textarea')
        <textarea id="certificado-{{ $key }}" rows="3" class="form-control" wire:model.defer="datos.{{ $key }}"></textarea>
    @else
        <input id="certificado-{{ $key }}" type="{{ $campo[1] }}" @if($campo[1] === 'number') step="0.01" @endif class="form-control" wire:model.defer="datos.{{ $key }}">
    @endif
    @error('datos.'.$key)<span class="text-danger">{{ $message }}</span>@enderror
</div>

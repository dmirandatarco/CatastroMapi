<div>
    <div class="row form-group">
        <h4 class="mb-4"> DOMICILIO FISCAL DEL TITULAR CATASTRAL</h4>

        <div class="col-md-3">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">30</div> UBICACION</label>
                <select class="form-select"  data-width="100%" data-live-search="true" name="ubicacionpersona" id="ubicacionpersona" wire:model="ubicacionpersona" >
                    <option value="0" {{ old('tipo_puerta') == '0' ? 'selected' : '' }}>SELECCIONE</option>
                    <option value="01" {{ old('tipo_puerta') == '01' ? 'selected' : '' }}>IGUAL A UNIDAD UU.CC.</option>
                    <option value="02" {{ old('tipo_puerta') == '02' ? 'selected' : '' }}>OTROS</option>
                </select>
                @error('ubicacionpersona')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
    </div><!-- Row -->
    @if($ubicacionpersona==2)
    <div class="row form-group">
        <div class="col-md-4">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">31</div> DEPARTAMENTO</label>
                <input type="text" class="form-control" placeholder=""  name="deparamentootros">
                @error('deparamentootros')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-4">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">32</div> PROVINCIA</label>
                <input type="text" class="form-control" placeholder="" name="provinciaotros">
                @error('provinciaotros')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-4">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">33</div> DISTRITO</label>
                <input type="text" class="form-control" placeholder="" name="distritootros">
                @error('distritootros')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
    </div><!-- Row -->
    <div class="row form-group">
        <div class="col-md-2">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">5</div> CÓDIGO DE VIA</label>
                <input type="text" class="form-control" placeholder="" name="codigoviaotros" maxlength="6">
                @error('codigoviaotros')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-2">
            <div class="mb-">
                <label class="form-label d-inline-flex" > <div class="divcuadro">6</div> TIPO DE VIA</label>
                <input type="text" class="form-control" placeholder="" name="tipoviaotros">
                @error('tipoviaotros')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-4">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">7</div> NOMBRE DE VIA</label>
                <input type="text" class="form-control" placeholder="" name="nombreviaotros">
                @error('nombreviaotros')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-2">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">9</div> N° MUNICIPAL</label>
                <input type="text" class="form-control" placeholder="" name="nmunicipalotros" maxlength="6">
                @error('nmunicipalotros')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-2">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">13</div> N. INTERIOR</label>
                <input type="text" class="form-control" placeholder="" name="ninteriorotros" maxlength="4">
                @error('ninteriorotros')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
    </div><!-- Row -->
    <div class="row form-group">
        <div class="col-md-2">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">14</div> CÓDIGO URBANO</label>
                <input type="text" class="form-control" placeholder="" name="codigohurbanootros">
                @error('codigohurbanootros')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-3">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">15</div> NOMBRE DE LA HABILITACIÓN URBANA</label>
                <input type="text" class="form-control" placeholder="" name="nombrehhurbanaotros">
                @error('nombrehhurbanaotros')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-2">
            <div class="mb-2">
                <label class="form-label d-inline-flex" > <div class="divcuadro">16</div> ZONA/SECTOR/ETAPA</label>
                <input type="text" class="form-control" placeholder="" name="zonaootros" maxlength="20">
                @error('zonaootros')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-2">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">17</div> MANZANA</label>
                <input type="text" class="form-control" placeholder="" name="manzanaotros" maxlength="3">
                @error('manzanaotros')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-1">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">18</div> LOTE</label>
                <input type="text" class="form-control" placeholder="" name="loteotros" wire:model="loteotros" maxlength="5">
                @error('loteotros')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-2">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">19</div> SUB-LOTE</label>
                <input type="text" class="form-control" placeholder="" name="subloteotros" wire:model="subloteotros" maxlength="6">
                @error('subloteotros')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
    </div><!-- Row -->
    @endif
</div>

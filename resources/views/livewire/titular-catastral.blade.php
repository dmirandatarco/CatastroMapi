<div>
    <div class="row form-group">
        <h4 class="mb-4"> IDENTIFICACIÓN DEL TITULAR CATASTRAL</h4>
        <div class="col-md-3">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">20</div> TIPO DE TITULAR</label>
                <select class="form-select"  data-width="100%" data-live-search="true" name="tipo_persona" id="tipo_persona" wire:model="tipoTitular" >
                    <option value="0" {{ old('tipo_puerta') == '' ? 'selected' : '' }}>SELECCIONE</option>
                    <option value="1" {{ old('tipo_puerta') == '1' ? 'selected' : '' }}>PERSONA NATURAL</option>
                    <option value="2" {{ old('tipo_puerta') == '2' ? 'selected' : '' }}>PERSONA JURIDICA</option>
                </select>
                @error('tipo_persona')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        
        @if($tipoTitular == 1)
        <div class="col-md-3">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">21</div> ESTADO CIVIL</label>
                <select class="form-select"  data-width="100%" data-live-search="true" name="esta_civil1" id="esta_civil1" wire:model="esta_civil1" >
                    <option value="0" {{ old('tipo_puerta') == '0' ? 'selected' : '' }}>SELECCIONE</option>
                    <option value="01" {{ old('tipo_puerta') == '01' ? 'selected' : '' }}>SOLTERO (A)</option>
                    <option value="02" {{ old('tipo_puerta') == '02' ? 'selected' : '' }}>CASADO (A)</option>
                    <option value="03" {{ old('tipo_puerta') == '03' ? 'selected' : '' }}>DIVORCIADO (A)</option>
                    <option value="04" {{ old('tipo_puerta') == '04' ? 'selected' : '' }}>VIUDO (A)</option>
                    <option value="05" {{ old('tipo_puerta') == '05' ? 'selected' : '' }}>CONVIVIENTE</option>
                </select>
                @error('esta_civil1')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-3">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">22</div> TIPO DOC. IDENTIDAD</label>
                <select class="form-select"  data-width="100%" data-live-search="true" name="tipo_doc1" id="tipo_doc1" wire:model="tipo_doc1" >
                    <option value="0" {{ old('tipo_doc1') == '0' ? 'selected' : '' }}>SELECCIONE</option>
                    <option value="01" {{ old('tipo_doc1') == '01' ? 'selected' : '' }}>NO PRESENTE DOC.</option>
                    <option value="02" {{ old('tipo_doc1') == '02' ? 'selected' : '' }}>DNI</option>
                    <option value="03" {{ old('tipo_doc1') == '03' ? 'selected' : '' }}>CARNET DE IDENTIDAD DE POLICIA NACIONAL</option>
                    <option value="04" {{ old('tipo_doc1') == '04' ? 'selected' : '' }}>CARNET DE IDENTIDAD DE FUERZAS ARMADAS</option>
                    <option value="05" {{ old('tipo_doc1') == '05' ? 'selected' : '' }}>PARTIDA DE NACIMIENTO</option>
                    <option value="06" {{ old('tipo_doc1') == '06' ? 'selected' : '' }}>PASAPORTE</option>
                    <option value="07" {{ old('tipo_doc1') == '07' ? 'selected' : '' }}>CARNET DE EXTRANJERIA</option>
                    <option value="08" {{ old('tipo_doc1') == '08' ? 'selected' : '' }}>OTROS</option>
                </select>
                @error('tipo_doc1')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-3">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">23</div> N° DOC.</label>
                <input type="text" class="form-control" placeholder="" name="nume_doc1" id="nume_doc1" wire:model.lazy="nume_doc1" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                @error('nume_doc1')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-4">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">24</div> NOMBRES</label>
                <input type="text" class="form-control" placeholder="" name="nombres1" id="nombres1" wire:model="nombres1" onkeydown="return /[a-z]/i.test(event.key)">
                @error('nombres1')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->            
        <div class="col-md-4">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">25</div> APELLIDO PATERNO</label>
                <input type="text" class="form-control" placeholder="" name="ape_paterno1" id="ape_paterno1" wire:model="ape_paterno1" onkeydown="return /[a-z]/i.test(event.key)">
                @error('ape_paterno1')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-4">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">26</div> APELLIDO MATERNO</label>
                <input type="text" class="form-control" placeholder="" name="ape_materno1" id="ape_materno1" wire:model="ape_materno1" onkeydown="return /[a-z]/i.test(event.key)">
                @error('ape_materno1')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
            @if($esta_civil1==2 || $esta_civil1==4)
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label d-inline-flex" > <div class="divcuadro">22</div> TIPO DOC. IDENTIDAD</label>
                        <select class="form-select"  data-width="100%" data-live-search="true" name="tipo_doc2" id="tipo_doc2" wire:model="tipo_doc2" >
                            <option value="0" {{ old('tipo_puerta') == '0' ? 'selected' : '' }}>SELECCIONE</option>
                            <option value="01" {{ old('tipo_puerta') == '01' ? 'selected' : '' }}>NO PRESENTE DOC.</option>
                            <option value="02" {{ old('tipo_puerta') == '02' ? 'selected' : '' }}>DNI</option>
                            <option value="03" {{ old('tipo_puerta') == '03' ? 'selected' : '' }}>CARNET DE IDENTIDAD DE POLICIA NACIONAL</option>
                            <option value="04" {{ old('tipo_puerta') == '04' ? 'selected' : '' }}>CARNET DE IDENTIDAD DE FUERZAS ARMADAS</option>
                            <option value="05" {{ old('tipo_puerta') == '05' ? 'selected' : '' }}>PARTIDA DE NACIMIENTO</option>
                            <option value="06" {{ old('tipo_puerta') == '06' ? 'selected' : '' }}>PASAPORTE</option>
                            <option value="07" {{ old('tipo_puerta') == '07' ? 'selected' : '' }}>CARNET DE EXTRANJERIA</option>
                            <option value="08" {{ old('tipo_puerta') == '08' ? 'selected' : '' }}>OTROS</option>
                        </select>
                        @error('tipo_doc2')
                            <span class="error-message" style="color:red">{{ $message }}</span>
                        @enderror
                    </div>
                </div><!-- Col -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label d-inline-flex" > <div class="divcuadro">23</div> N° DOC.</label>
                        <input type="text" class="form-control" placeholder="" name="nume_doc2" id="nume_doc2" wire:model.lazy="nume_doc2" >
                        @error('nume_doc2')
                            <span class="error-message" style="color:red">{{ $message }}</span>
                        @enderror
                    </div>
                </div><!-- Col -->
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label d-inline-flex" > <div class="divcuadro">24</div> NOMBRES</label>
                        <input type="text" class="form-control" placeholder="" name="nombres2" id="nombres2"  wire:model="nombres2" onkeydown="return /[a-z]/i.test(event.key)">
                        @error('nombres2')
                            <span class="error-message" style="color:red">{{ $message }}</span>
                        @enderror
                    </div>
                </div><!-- Col -->            
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label d-inline-flex" > <div class="divcuadro">25</div> APELLIDO PATERNO</label>
                        <input type="text" class="form-control" placeholder="" name="ape_paterno2" id="ape_paterno2"  wire:model="ape_paterno2" onkeydown="return /[a-z]/i.test(event.key)">
                        @error('ape_paterno2')
                            <span class="error-message" style="color:red">{{ $message }}</span>
                        @enderror
                    </div>
                </div><!-- Col -->
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label d-inline-flex" > <div class="divcuadro">26</div> APELLIDO MATERNO</label>
                        <input type="text" class="form-control" placeholder="" name="ape_materno2" id="ape_materno2" wire:model="ape_materno2" onkeydown="return /[a-z]/i.test(event.key)">
                        @error('ape_materno2')
                            <span class="error-message" style="color:red">{{ $message }}</span>
                        @enderror
                    </div>
                </div><!-- Col -->
            @endif
        @endif
        @if($tipoTitular == 2)
        <div class="col-md-3">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">27</div> Nº DE R.U.C.</label>
                <input type="text" class="form-control" placeholder="" name="nume_doc3" wire:model.lazy="nume_doc3"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="11">
                @error('nume_doc3')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-3">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">28</div> RAZON SOCIAL</label>
                <input type="text" class="form-control" placeholder="" name="razon_social" wire:model="razon_social">
                @error('razon_social')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-3">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">29</div> PERSONA JURIDICA</label>
                <select class="form-select"  data-width="100%" data-live-search="true" name="tipo_persona_juridica" id="tipo_persona_juridica">
                    <option value="0" {{ old('tipo_puerta') == '0' ? 'selected' : '' }}>SELECCIONE</option>
                    <option value="01" {{ old('tipo_puerta') == '01' ? 'selected' : '' }}>EMPRESA</option>
                    <option value="02" {{ old('tipo_puerta') == '02' ? 'selected' : '' }}>COOPERATIVA</option>
                    <option value="03" {{ old('tipo_puerta') == '03' ? 'selected' : '' }}>ASOCIACIÓN</option>
                    <option value="04" {{ old('tipo_puerta') == '04' ? 'selected' : '' }}>FUNDACIÓN</option>
                    <option value="05" {{ old('tipo_puerta') == '05' ? 'selected' : '' }}>OTROS</option>
                </select>
                @error('tipo_persona_juridica')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        @endif
    </div><!-- Row --> 
</div>

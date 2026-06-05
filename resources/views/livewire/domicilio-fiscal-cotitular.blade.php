<div>
    <div class="row form-group">
        <h4 class="mb-4"> DOMICILIO FISCAL DEL COTITULAR CATASTRAL</h4>
        <div class="col-md-2">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">39</div> DEPARTAMENTO</label>
                <input type="text" class="form-control" placeholder=""  name="deparamentoconductor">
                @error('deparamentoconductor')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-2">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">40</div> PROVINCIA</label>
                <input type="text" class="form-control" placeholder="" name="provinciaconductor">
                @error('provinciaconductor')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-2">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">41</div> DISTRITO</label>
                <input type="text" class="form-control" placeholder="" name="distritoconductor">
                @error('distritoconductor')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-2">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">42</div> TELÉFONO</label>
                <input type="text" class="form-control" placeholder=""  name="telefonoconductor">
                @error('telefonoconductor')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-1">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">43</div> ANEXO</label>
                <input type="text" class="form-control" placeholder=""  name="anexoconductor">
                @error('anexoconductor')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-1">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">44</div> FAX</label>
                <input type="text" class="form-control" placeholder="" name="faxconductor">
                @error('faxconductor')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-2">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">45</div> EMAIL</label>
                <input type="text" class="form-control" placeholder="" name="emailconductor">
                @error('emailconductor')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
    </div><!-- Row -->
    <div class="row form-group">
        <div class="col-md-1">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">7</div> C. VIA</label>
                <input type="text" class="form-control" placeholder="" name="codigoviaconductor">
                @error('codigoviaconductor')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-1">
            <div class="mb-">
                <label class="form-label d-inline-flex" > <div class="divcuadro">8</div> T. VIA</label>
                <input type="text" class="form-control" placeholder="" name="tipoviaconductor">
                @error('tipoviaconductor')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-4">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">9</div> NOMBRE DE VIA</label>
                <input type="text" class="form-control" placeholder="" name="nombreviaconductor">
                @error('nombreviaconductor')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-2">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">10</div> N° MUNICIPAL</label>
                <input type="text" class="form-control" placeholder="" name="nmunicipalconductor">
                @error('nmunicipalconductor')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-2">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">14</div> NOMB. EDIFICACION</label>
                <input type="text" class="form-control" placeholder="" name="nomb_edificacionconductor">
                @error('nomb_edificacionconductor')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-2">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">17</div> N. INTERIOR</label>
                <input type="text" class="form-control" placeholder="" name="ninteriorconductor">
                @error('ninteriorconductor')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
    </div><!-- Row -->
    <div class="row form-group">
        <div class="col-md-2">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">18</div> CÓDIGO URBANO</label>
                <input type="text" class="form-control" placeholder="" name="codigohurbanoconductor">
                @error('codigohurbanoconductor')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-3">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">19</div> NOMBRE DE LA HABILITACIÓN URBANA</label>
                <input type="text" class="form-control" placeholder="" name="nombrehhurbanaconductor">
                @error('nombrehhurbanaconductor')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-2">
            <div class="mb-2">
                <label class="form-label d-inline-flex" > <div class="divcuadro">20</div> ZONA/SECTOR/ETAPA</label>
                <input type="text" class="form-control" placeholder="" name="zonaconductor">
                @error('zonaconductor')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-2">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">21</div> MANZANA</label>
                <input type="text" class="form-control" placeholder="" name="manzanaconductor">
                @error('manzanaconductor')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-1">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">22</div> LOTE</label>
                <input type="text" class="form-control" placeholder="" name="loteconductor">
                @error('loteconductor')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-2">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">23</div> SUB-LOTE</label>
                <input type="text" class="form-control" placeholder="" name="subloteconductor">
                @error('subloteconductor')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
    </div><!-- Row -->
</div>

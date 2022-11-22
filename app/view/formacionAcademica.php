<?php __extends("main") ?>

<?php __open("body") ?>
<div class="row justify-content-center p-5">
    <div class=" col-sm-6">
<div class="row justify-content-between text-left">
    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Nivel Educativo<span class="text-danger"> *</span></label> <select name="usuario[id_nivel_academico]" class="form-control">
    <option value="" disabled selected>----Seleccionar-----</option>
        <?php foreach($nivelesEducativos as $nivel): ?>
            <option id="<?php echo $nivel->nivel ?>" value="<?php echo $nivel->id ?>"><?php echo $nivel->nivel ?></option>
        <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Ultimo Titulo Obtenido<span class="text-danger"> *</span></label> <select name="usuario[id_titulo_obtenido]" class="form-control">
        <option value="" disabled selected>----Seleccionar-----</option>
        <option value="1"> Ing. Mecanico </option>
        </select>
    </div>
</div>
<div class="row justify-content-between text-left">
    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Instituo Educativo<span class="text-danger"> *</span></label> <select name="usuario[id_instituto_educativo]" class="form-control">
        <option value="" disabled selected>----Seleccionar-----</option>
        <option value="1"> Universidad Simon Bolivar </option>
        </select>
    </div>
    <div class="none">
        <div class="none form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3"> Especifique<span class="text-danger"> *</span></label> <input class="form-control" type="text" id="fname" name="fname" placeholder="Universidad Ejemplo" onblur="validate(1)"> </div>
    </div>
</div>
<div class="row justify-content-between text-left mt-5">
    <div class="checkbox-circle" style="margin-bottom: 48px;">
        <label>
            <input type="checkbox" class="cuarto-nivel-boton form-check-label" onclick="mostrarOpcionesCuartoNivel()">Seleccione si posee formacion de cuarto Nivel
            <span class="checkmark"></span>
        </label>
    </div>
</div>
<div class="row justify-content-between text-left none cuarto-nivel">
    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Nivel Educativo<span class="text-danger"> *</span></label> <select name="estado" class="form-control">
        <option value="" disabled selected>----Seleccionar-----</option>
        <option value="1"> Bachiller </option>
        </select>
    </div>
    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Ultimo Titulo Obtenido<span class="text-danger"> *</span></label> <select name="municipio" class="form-control">
        <option value="" disabled selected>----Seleccionar-----</option>
        <option value="1"> Ing. Mecanico </option>
        </select>
    </div>
</div>
<div class="row justify-content-between text-left none cuarto-nivel" >
    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Instituo Educativo<span class="text-danger"> *</span></label> <select name="estado" class="form-control">
        <option value="" disabled selected>----Seleccionar-----</option>
        <option value="1"> Universidad Simon Bolivar </option>
        </select>
    </div>
    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3"> Especifique<span class="text-danger"> *</span></label> <input class="form-control" type="text" id="fname" name="fname" placeholder="Universidad Ejemplo" onblur="validate(1)"> </div>
</div>
<div class="d-flex justify-content-between mt-5">
    <a href="#tab_2" class="btn btn-danger" onclick="cambiarPaso(this)">Anterior</a>

    <a href="#tab_4" class="btn btn-danger" onclick="cambiarPaso(this)">Siguiente</a>
</div>
    </div>
</div>
<?php __close() ?>
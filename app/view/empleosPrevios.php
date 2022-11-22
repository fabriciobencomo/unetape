<?php __extends("main") ?>

<?php __open("body") ?>
<div class="row justify-content-center p-5">
    <div class=" col-sm-6">
        <div class="row justify-content-between text-left">
            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Nombre de la empresa<span class="text-danger"> *</span></label> <input class="form-control" type="text" id="empresa" name="usuario[empresa_previa]" onblur="validate(1)"> </div>
            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Cargo Desempeñado<span class="text-danger"> *</span></label> <input class="form-control" type="text" id="cargo" name="usuario[cargo_previo]" onblur="validate(2)"> </div>
        </div>
        <div class="row justify-content-between text-left">
            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Tiempo de Servicio<span class="text-danger"> *</span></label> <select name="usuario[id_tiempo_servicio]" class="form-control">
                    <option value="" disabled selected>----Seleccionar-----</option>
                    <?php foreach ($tiempoServicio as $tiempo) : ?>
                        <option id="<?php echo $tiempo->tiempo_servicio ?>" value="<?php echo $tiempo->id ?>"><?php echo $tiempo->tiempo_servicio ?></option>
                    <?php endforeach; ?>
                </select>

            </div>
        </div>
        <div class="d-flex justify-content-between mt-5">
            <a href="#tab_3" class="btn btn-danger" onclick="cambiarPaso(this)">Anterior</a>
            <button class="btn btn-danger" type="submit" onclick="camposVacios()">Enviar</button>
        </div>
    </div>
</div>
<?php __close() ?>
<?php __extends("main") ?>

<?php __open("body") ?>

<div class="row justify-content-center p-5">
    <div class=" col-sm-4">
        <div class="d-flex justify-content-center align-items-center flex-column">
            <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label px-3">Cedula<span class="text-danger"> *</span></label> <input class="form-control form-control-lg" type="number" id="cedula" name="usuario[cedula]" onblur="validate(3)" value="<?php echo s($usuario->fecha); ?>"> </div>
            <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label px-3">Contraseña<span class="text-danger"> *</span></label> <input class="form-control form-control-lg" type="password" id="password" name="usuario[password]"> </div>
            <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label px-3">Repetir ontraseña<span class="text-danger"> *</span></label> <input class="form-control form-control-lg" type="password"> </div>
        </div>
        <div class="d-flex justify-content-end mt-5">
            <a href="#tab_2" class="btn btn-danger" onclick="cambiarPaso(this)">Siguiente</a>
        </div>
    </div>
</div>
<?php __close() ?>

<?php __open("scripts") ?>
<script>

</script>
<?php __close() ?>
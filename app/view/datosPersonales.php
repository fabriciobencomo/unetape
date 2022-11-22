<?php __extends("main") ?>

<?php __open("body") ?>
<div class="row justify-content-center p-5">
    <div class=" col-sm-6">
        <div class="row justify-content-between text-left">
            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Nombres<span class="text-danger"> *</span></label> <input class="form-control" type="text" id="name" name="usuario[nombres]" placeholder="Ingrese Nombres" onblur="validate(1)" value="<?php echo s($usuario->nombres); ?>"> </div>
            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Apellidos<span class="text-danger"> *</span></label> <input class="form-control" type="text" id="name" name="usuario[apellidos]" placeholder="Ingrese Apellidos" onblur="validate(2)" value="<?php echo s($usuario->apellidos); ?>"> </div>
        </div>
        <div class="row justify-content-between text-left">
            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Correo Electronico<span class="text-danger"> *</span></label> <input class="form-control" type="mail" id="mail" name="usuario[email]" placeholder="example@example.com" onblur="validate(1)" value="<?php echo s($usuario->email); ?>"> </div>
            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Numero Telefonico<span class="text-danger"> *</span></label> <input class="form-control" type="text" id="mob" name="usuario[telefono]" placeholder="" onblur="validate(4)"> </div>
        </div>
        <div class="row justify-content-between text-left">
            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Fecha de Nacimiento<span class="text-danger"> *</span></label> <input class="form-control" type="date" id="fechaDeNacimiento" name="usuario[fecha_nacimiento]" placeholder="" onblur="validate(3)" value="<?php echo s($usuario->fecha); ?>"> </div>
            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Foto de Perfil</label> <input class="form-control" type="file" accept="image/jpeg, image/png" id="fotoPerfil" name="fotoPerfil"> </div>
        </div>
        <div class="row justify-content-between text-left">
            <div class="form-group col-sm-6 flex-column d-flex form-holder"> <label class="form-control-label px-3">Sexo<span class="text-danger"> *</span></label> <select name="usuario[sexo]" class="form-control">
                    <option value="" disabled selected>----Seleccionar-----</option>
                    <option value="M"> Masculino </option>
                    <option value="F"> Femenino </option>
                </select>
            </div>
            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Estado Civil<span class="text-danger"> *</span></label> <select name="usuario[id_estado_civil]" class="form-control">
                    <option value="" disabled selected>----Seleccionar-----</option>
                    <option value="" disabled selected>----Seleccionar-----</option>
                    <?php foreach ($estadosCiviles as $civil) : ?>
                        <option id="<?php echo $civil->estado ?>" value="<?php echo $civil->id ?>"><?php echo $civil->estado ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

        </div>
        <div class="row justify-content-between text-left">

            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Numero de Hijos<span class="text-danger"> *</span></label> <select name="usuario[num_hijos]" class="form-control">
                    <option value="" disabled selected>----Seleccionar-----</option>
                    <option value="0">N/A</option>
                    <?php for ($i = 1; $i <= 10; $i++) : ?>
                        <option value="<?php echo $i; ?>"> <?php echo $i ?></option>
                    <?php endfor; ?>
                </select>

            </div>
            <div class="form-group col-sm-6 flex-column d-flex form-holder"> <label class="form-control-label px-3">Estado<span class="text-danger"> *</span></label> <select name="usuario[id_estado]" class="form-control">
                    <option value="" disabled selected>----Seleccionar-----</option>
                    <?php foreach ($estados as $estado) : ?>
                        <option id="<?php echo $estado->estado ?>" value="<?php echo $estado->id_estado ?>"><?php echo $estado->estado ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

        </div>
        <div class="row justify-content-between text-left">
            <div class="form-group col-12 flex-column d-flex"> <label class="form-control-label px-3">Direccion Actual<span class="text-danger"> *</span></label> <textarea class="form-control" name="usuario[direccion]" id="direccion" cols="5" rows="5" onblur="validate(20)"></textarea> </div>
        </div>
        <div class="d-flex justify-content-between mt-5">
            <a href="#tab_1" class="btn btn-danger" onclick="cambiarPaso(this)">Anterior</a>

            <a href="#tab_3" class="btn btn-danger" onclick="cambiarPaso(this)">Siguiente</a>
        </div>
    </div>
</div>
<?php __close() ?>
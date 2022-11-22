<?php __extends("main") ?>

<?php __open("body") ?>
<!-- Hero -->
<div class="p-5 text-center header">
    <div>
        <?php if (isset($registrado) && $registrado == 1) : ?>
            <div class="alert alert-success d-flex justify-content-center">
                Se Ha Registrado Correctamente
            </div>
        <?php endif; ?>
        <h1 class="mb-3 text-danger"><span data-mdb-toggle="animation" data-mdb-animation-start="onLoad" data-mdb-animation="fade-in" data-mdb-animation-duration="1000" data-mdb-animation-delay="200">Bienvenido <br> ¡Unete al Talento Petroquimico! </span> </h1>
        <p class="mb-3 p-3">Petroquimica de Venezuela te da la mas cordial <br><strong>Bievenida</strong> y te brinda la oportunidad de postularte para participar <br> en nuestros procesos de seleccion personal.</p>
        <a id="main-boton" class="btn btn-danger rounded-pill p-3" role="button" href="<?= __link("login") ?>">Continuar</a>
    </div>
</div>
<!-- Hero -->
<?php __close() ?>
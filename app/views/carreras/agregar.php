<?php include_once APPROOT . '/views/includes/header.inc.php'; ?>
<!-- formulario de registro -->
<?php if (estalogeado()) { ?>

<div class="container">
    <div class="row">

        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="row mt-3">
                <div class="col-sm-7" style="text-align: center;">
                    <i class="fa fa-user text-success"></i>
                </div>
                <div class="row mt-3"></div>
                <div class="col-sm-7" style="text-align: center;">
                    <h4>Agregar carreras</h4>
                </div>


            </div>
            <!-- mostar errores -->

            <div class="alert alert-warning <?= (isset($data['msg_error']) && !empty($data['msg_error'])) ? 'd-block' : 'd-none'; ?>">
                <?= (isset($data['msg_error']) && !empty($data['msg_error'])) ? $data['msg_error'] : ''; ?>
            </div>
            <form class="" action="<?php URLROOT ?>/carreras/agregar" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" aria-describedby="helpId" required>
                        </div>
                    </div>
                </div>

                <div class="row-mt-4" style="margin-top: 20px;
                                             align-items: center;">
                    <div class="col-sm-8"><button type="submit" class="btn btn-success">Agregar</button></div>

                </div>




            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>

<?php } else { ?>

<div class="alert alert-info">Usted no esta autorizado</div>

<?php } ?>
<?php include_once APPROOT . '/views/includes/footer.inc.php'; ?>
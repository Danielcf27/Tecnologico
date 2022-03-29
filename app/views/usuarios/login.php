<?php include_once APPROOT . '/views/includes/header.inc.php'; ?>

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
                    <h4>Iniciar sesión</h4>
                </div>


            </div>
            <!-- mostar errores -->

            <div class="alert alert-warning <?= (isset($data['msg_error']) && !empty($data['msg_error'])) ? 'd-block' : 'd-none'; ?>">
                <?= (isset($data['msg_error']) && !empty($data['msg_error'])) ? $data['msg_error'] : ''; ?>
            </div>
            <form class="" action="<?php URLROOT ?>/usuarios/login" method="POST">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="mb-3">
                            <label for="usuario_id" class="form-label">Id</label>
                            <input type="text" name="usuario_id" id="usuario_id" class="form-control" placeholder="Id" aria-describedby="helpId" require>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="mb-3">
                            <label for="usuario_nombre" class="form-label">Contraseña</label>
                            <input type="password" name="usuario_password" id="usuario_password" class="form-control" placeholder="Contraseña" aria-describedby="helpId" require>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    
                        <button type="submit" class="btn btn-success" style="align-items: flex-end;">Registrar</button>
                    </div>
                    <div class="col-sm-4"></div>
                    </div>
                    </form>
                </div>
                </div>
        </div>

<?php include_once APPROOT . '/views/includes/footer.inc.php'; ?>
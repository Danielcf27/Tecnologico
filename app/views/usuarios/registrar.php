<?php include_once APPROOT . '/views/includes/header.inc.php'; ?>
<!-- formulario de registro -->
<div class="container">
    <div class="row">

        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="row mt-3" style="background: #eceff1;">
                <div class="col-sm-11">
                    <h4>Registro</h4>
                </div>
                <div class="col-sm-1"><i class="fa fa-user text-info"></i></div>
            </div>
            <!-- mostar errores -->

            <div class="alert alert-warning <?php (isset($data['msg_error']) && empty($data['msg_error'])) ? 'd-block' : 'd-none'; ?>">
                <?php (isset($data['msg_error']) && empty($data['msg_error'])) ? $data['msg_error']: 'd-none'; ?>
            </div>
            <form class="" action="<?php URLROOT ?>/usuarios/registrar" method="POST">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="mb-3">
                            <label for="usuario_id" class="form-label">Id</label>
                            <input type="text" name="usuario_id" id="usuario_id" class="form-control" placeholder="Id" aria-describedby="helpId" require>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="mb-3">
                            <label for="usuario_nombre" class="form-label">Nombre de usuario</label>
                            <input type="text" name="usuario_nombre" id="usuario_nombre" class="form-control" placeholder="Nombre" aria-describedby="helpId" require>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-7">
                        <div class="mb-3">
                            <label for="usuario_password" class="form-label">Password</label>
                            <input type="password" name="usuario_password" id="usuario_password" class="form-control" placeholder="Password" aria-describedby="helpId" require>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="mb-3">
                            <label for="usuario_email" class="form-label">Confirmación de password</label>
                            <input type="password" name="conf_password" id="conf_password" class="form-control" placeholder="confirmación de password" aria-describedby="helpId" require>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-7">
                        <div class="mb-3">
                            <label for="usuario_email" class="form-label">Password</label>
                            <input type="email" name="usuario_email" id="usuario_email" class="form-control" placeholder="Email" aria-describedby="helpId" require>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                            <button type="submit" class="btn btn-lg btn-success">Registrar</button>
                        </div>
                        <div class="col-sm-4"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once APPROOT . '/views/includes/footer.inc.php'; ?>
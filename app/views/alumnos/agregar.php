<?php include_once APPROOT . '/views/includes/header.inc.php'; ?>
<!-- formulario de registro -->
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
                    <h4>Agregar alumnos</h4>
                </div>


            </div>
            <!-- mostar errores -->

            <div class="alert alert-warning <?= (isset($data['msg_error']) && !empty($data['msg_error'])) ? 'd-block' : 'd-none'; ?>">
                <?= (isset($data['msg_error']) && !empty($data['msg_error'])) ? $data['msg_error'] : ''; ?>
            </div>
            <form class="" action="<?php URLROOT ?>/alumnos/agregar" method="POST">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="mb-3">
                            <label for="alumno_no_control" class="form-label">Numero de control</label>
                            <input type="text" name="alumno_no_control" id="alumno_no_control" class="form-control" placeholder="Numero de control" aria-describedby="helpId" required>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="mb-3">
                            <label for="alumno_nombre" class="form-label">Nombre de usuario</label>
                            <input type="text" name="alumno_nombre" id="alumno_nombre" class="form-control" placeholder="Nombre del alumno" aria-describedby="helpId" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-6">
                            <label for="alumno_fotografia" class="form-label">Fotografia</label>
                            <input type="file" name="alumno_fotografia" id="alumno_fotografia" class="form-control" placeholder="Sube tu foto aqui" aria-describedby="helpId">
                        </div>
                    </div>
                </div>

                
                    <div class="row-mt-4">
                        <div class="col-sm-8"><button type="submit" class="btn btn-success">Agregar</button></div>
                        
                    </div>

                    
               

            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>


<?php include_once APPROOT . '/views/includes/footer.inc.php'; ?>
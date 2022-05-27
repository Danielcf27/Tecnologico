<?php

use Dompdf\Options;

 include_once APPROOT . '/views/includes/header.inc.php'; ?>
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
                    <h4>Agregar materias</h4>
                </div>


            </div>
            <!-- mostar errores -->

            <div class="alert alert-warning <?= (isset($data['msg_error']) && !empty($data['msg_error'])) ? 'd-block' : 'd-none'; ?>">
                <?= (isset($data['msg_error']) && !empty($data['msg_error'])) ? $data['msg_error'] : ''; ?>
            </div>
            <form class="" action="<?php URLROOT ?>/materias/agregar" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">nombre de la materia</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="" aria-describedby="helpId" required>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="mb-3">
                            <label for="cantidad_creditos" class="form-label">Cantidad de creditos</label>
                            <input type="text" name="cantidad_creditos" id="cantidad_creditos" class="form-control" placeholder="" aria-describedby="helpId" required>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="mb-3">
                            <label for="carreras" class="form-label">Carrera</label>
                        <select name="carrera" id="carrera">
                            <?php
                            foreach($data['carreras'] as $registro){ ?>

                                <option value="<?= $registro->carrera_id; ?>" <?php ($registro->carrera_id==$data['carrera'])?'selected':'';?>><?= $registro->nombre; ?> </option>
                            <?php } 

                            ?>
                        </select>
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


<?php include_once APPROOT . '/views/includes/footer.inc.php'; ?>
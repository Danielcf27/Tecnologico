<?php include_once APPROOT . '/views/includes/header.inc.php'; ?>

<!--tabla de materias-->
<?php if (estalogeado()) { ?>

    <div class="row">
        <div class="col-sm-7"></div>


        <div class="col-sm-1">

            <a class="btn btn-primary" href="<?= URLROOT; ?>/materias/agregar"><i class="fa fa-plus"></i></a>
        </div>
        <div class="col-sm-4"></div>

    </div>
    <br>

    <table class="table table-striped table-sm table-bordered table-hover table-responsive">
        <thead>
            <tr>

                <th>Nombre</th>
                <th>Cantidad de creditos</th>
                <th>Carrera</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody id="materias">
            <?php foreach ($data['materias'] as $registro) { ?>
                <tr>

                    <td><?= $registro->nombre; ?></td>
                    <td><?= $registro->cantidad_creditos; ?></td>
                    <td><?= $registro->carrera; ?></td>
                    <td>
                        <a class="btn btn-warning" href="<?= URLROOT; ?>/materias/editar/<?= $registro->id; ?>"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-danger" href="<?= URLROOT; ?>/materias/borrar/<?= $registro->id; ?>"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>

            <?php } ?>
        </tbody>
    </table>

    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <li class="page-item <?= ($data['pagina'] <= 1) ? 'disabled' : ''; ?>">
                <a class="page-link" href="<?= ($data['pagina'] <= 1) ? '#' : URLROOT .
                                                '/materias/index/' . $data['limite'] . '/' . $data['pag_previa']; ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="visually-hidden">Anterior</span>
                </a>
            </li>
            <!-- desplegar numero de paginas -->
            <?php for ($i = 1; $i <= $data['paginas']; $i++) { ?>
                <li class="page-item <?= ($data['pagina'] == $i) ? 'active' : '' ?>"><a class="page-link" href="<?= URLROOT .
                                                                                                                    '/materias/index/' . $data['limite'] . '/' . $i; ?>"><?= $i ?></a></li>
            <?php } ?>
            <li class="page-item <?= ($data['pagina'] >= $data['paginas']) ? 'disabled' : ''; ?>">
                <a class="page-link" href="<?= ($data['pagina'] >= $data['paginas']) ? '#' : URLROOT .
                                                '/materias/index/' . $data['limite'] . '/' . $data['pag_siguiente']; ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="visually-hidden">Siguiente</span>
                </a>
            </li>
        </ul>
    </nav>


<?php } else { ?>

    <div class="alert alert-info">Usted no esta autorizado</div>

<?php } ?>

<?php include_once APPROOT . '/views/includes/footer.inc.php'; ?>
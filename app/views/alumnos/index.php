<?php include_once APPROOT . '/views/includes/header.inc.php'; ?>

<!--tabla de alumnos-->
<?php if (estalogeado()) { ?>

    <div class="row">
        <div class="col-sm-7"></div>
        <div class="col-sm-4">
            Exportar a Json <a class="btn btn-default" href="<?= URLROOT; ?>/alumnos/json">
            <i class="fa fa-file-excel"></i></a> &nbsp; PDF <a class="btn btn-default" href="<?= URLROOT; ?>/alumnos/pdf">
            <i class="fa fa-file-pdf"></i></a>
        </div>
        
        <div class="col-sm-1">
            <a class="btn btn-primary" href="<?= URLROOT; ?>/alumnos/agregar"><i class="fa fa-plus"></i></a>
        </div>
    </div>

    <table class="table table-striped table-sm table-bordered table-hover table-responsive">
        <thead>
            <tr>
                <th>ID</th>
                <th>No de Control</th>
                <th>Nombre</th>
                <th>Fotografia</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody id="alumnos">
            <?php foreach ($data['alumnos'] as $registro) { ?>
                <tr>
                    <td><?= $registro->id; ?></td>
                    <td><?= $registro->alumno_no_control; ?></td>
                    <td><?= $registro->alumno_nombre; ?></td>
                    <td><img src="data:image/png;base64,<?= base64_encode($registro->alumno_fotografia); ?>" width="30" alt="Foto"></td>
                    
                    <td>
                        <a class="btn btn-warning" href="<?= URLROOT; ?>/alumnos/editar/<?= $registro->id; ?>"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-danger" href="<?= URLROOT; ?>/alumnos/borrar/<?= $registro->id; ?>"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>

            <?php } ?>
        </tbody>
    </table>

    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <li class="page-item <?= ($data['pagina'] <= 1) ? 'disabled' : ''; ?>">
                <a class="page-link" href="<?= ($data['pagina'] <= 1) ? '#' : URLROOT .
                                                '/alumnos/index/' . $data['limite'] . '/' . $data['pag_previa']; ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="visually-hidden">Anterior</span>
                </a>
            </li>
            <!-- desplegar numero de paginas -->
            <?php for ($i = 1; $i <= $data['paginas']; $i++) { ?>
                <li class="page-item <?= ($data['pagina'] == $i) ? 'active' : '' ?>"><a class="page-link" href="<?= URLROOT .
                                                                                                                    '/alumnos/index/' . $data['limite'] . '/' . $i; ?>"><?= $i ?></a></li>
            <?php } ?>
            <li class="page-item <?= ($data['pagina'] >= $data['paginas']) ? 'disabled' : ''; ?>">
                <a class="page-link" href="<?= ($data['pagina'] >= $data['paginas']) ? '#' : URLROOT .
                                                '/alumnos/index/' . $data['limite'] . '/' . $data['pag_siguiente']; ?>" aria-label="Next">
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
<?php include_once APPROOT . '/views/includes/header.inc.php'; ?>

<?php file_put_contents(APPROOT.'/file/alumnos_'.time().'.json', json_encode($data['alumnos'])); ?>
<div class="alert alert-info">
    Archivo generado
</div>
<?php include_once APPROOT . '/views/includes/footer.inc.php'; ?>
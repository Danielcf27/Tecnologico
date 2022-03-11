<?php

include_once 'config.inc.php';

include_once APPROOT . '/helpers/helpers.php';

spl_autoload_register(function ($className) {
    include_once APPROOT . '/libraries/' . $className . '.php';
});

<?php

require_once 'vendor/autoload.php';

spl_autoload_register(function($className) {
    if (stripos($className, 'GamersClub') !== 0) {
        return;
    }

    $classFilePath = str_replace(['GamersClub\ServerShellProxy\\', '\\'], ['', '/'], $className);

    require_once sprintf('%s/src/%s.php', $_SERVER['DOCUMENT_ROOT'], $classFilePath);
});
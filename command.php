<?php
error_reporting(E_ALL);

require_once "autoload.php";

use GamersClub\ServerShellProxy\Manager\Command\CommandManager;

try {
    echo json_encode([
        'success' => true,
        'data' => (new CommandManager())->manageRequest(),
    ]);
} catch (\Exception $exception) {
    echo json_encode([
        'success' => false,
        'message' => sprintf('An exception was thrown: %s', $exception->getMessage()),
    ]);
}

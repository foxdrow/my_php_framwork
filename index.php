<!-- <pre>
    <?php

    var_dump($_POST) ?>
    <br>
    <?php var_dump($_GET) ?>
    <br>
    <?php var_dump($_SERVER) ?>
    <br>
    <?= __DIR__ ?>
</pre> -->

<?php


define('BASE_URI', str_replace('\\', '/', substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT']))));

require_once(implode(DIRECTORY_SEPARATOR, ['Core', 'autoload.php']));

use Core\Autoload;
use Core\Core;

Autoload::register();

$app = new Core;
$app->run();

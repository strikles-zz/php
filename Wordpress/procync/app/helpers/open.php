<?php

include __DIR__ . '/../../vendor/autoload.php';

global $debugbar;

$debugbar = new DebugBar\StandardDebugBar();
$debugbar->setStorage(new DebugBar\Storage\FileStorage(__DIR__ . '/../storage/logs'));

$openHandler = new DebugBar\OpenHandler($debugbar);
$openHandler->handle();
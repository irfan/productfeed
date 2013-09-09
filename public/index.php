<?php

use \lib\simplemvc\ApplicationDispatcher;

include '../src/bootstrap.php';

$app = ApplicationDispatcher::getInstance();
$app->createRequest()->getRequest()->init()->getResponse();

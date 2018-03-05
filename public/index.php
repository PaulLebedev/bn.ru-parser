<?php

require('../app/App.php');

$config=json_decode(file_get_contents('../config.json'));
$app = new App($config);

$app->run();
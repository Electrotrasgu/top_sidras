<?php
require '../../config.php';
require '../../model/db.php';
include '../../model/cider.php';
include '../../controller/rate/rate_controller.php';
include '../../controller/cider/ciderController.php';
$link = connect_db();
//var_dump($link);

echo "<pre>";
print_r(delete_rate($link,1) );
echo "</pre>";

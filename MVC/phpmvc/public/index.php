<?php


// start $_Session
// jika tidak ada session maka jalankan session_ startnya 
if (!session_id()) {
    session_start();
}



// teknik bootstrapping
require_once '../app/init.php';

$app = new App;
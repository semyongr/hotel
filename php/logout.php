<?php
//  выход из админки
   require('./essentials.php');
    session_start();
    session_destroy();
    redirect('./home.php');
?>
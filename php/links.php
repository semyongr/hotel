<link rel="stylesheet" href="../css/common_styles.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Gloock&family=Poppins:wght@400;500;600&display=swap"rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

<?php

    session_start();
    require('./db_config.php'); 
    // require('./essentials.php');
    
    // подключение данных об отеле
    $settings = "SELECT * FROM `editing` WHERE `id_ed`=?";
    $values = [1];
    $settings_r = mysqli_fetch_assoc(select($settings,$values,'i'));  
?>
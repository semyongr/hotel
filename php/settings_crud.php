<?php
    require('./db_config.php');   
    require('./essentials.php');   
    adminLogin(); 

    // получение данных об отеле
    if(isset($_POST['get_general'])){
        $q = "SELECT * FROM `editing` WHERE `id_ed`=?";
        $values = [1];
        $res = select($q,$values,"i");
        $data = mysqli_fetch_assoc($res);
        $json_data = json_encode($data);
        echo $json_data;
    }

    // обновление данных об отеле
    if(isset($_POST['upd_general'])){
        $frm_data = filteration($_POST);

        $q = "UPDATE `editing` SET `site_title`=?,`site_phone`=?,`site_adres`=?,`site_sale`=?,`text_luxe_room`=?,`text_comfort_room`=?,`text_standart_room`=?, `site_about`=? WHERE `id_ed`=?";
        $values = [$frm_data['site_title'], $frm_data['site_phone'],$frm_data['site_adres'],$frm_data['site_sale'],$frm_data['text_luxe_room'],$frm_data['text_comfort_room'],$frm_data['text_standart_room'],$frm_data['site_about'],1];
        $res = update($q,$values,'sssssssss');
        echo $res;
    }
?>
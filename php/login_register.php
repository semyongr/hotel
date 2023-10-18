<?php
    require('./db_config.php');   
    require('./essentials.php');  

    // регистрация
    if(isset($_POST['register'])){
        $data = filteration($_POST);

        if($data['pass'] != $data['cpass']){
            echo 'pass_mismatch';
            exit;
        }

        $u_exist = select("SELECT * FROM `users` WHERE `email`=? OR `phonenum`=? LIMIT 1",
        [$data['email'],$data['phonenum']], "ss");

        if(mysqli_num_rows($u_exist)!=0){
            $u_exist_fetch = mysqli_fetch_assoc($u_exist);
            echo ($u_exist_fetch['email'] == $data['email']) ? 'email_already' : 'phone_already';
            exit;
        }

        $query = "INSERT INTO `users`(`name`, `surname`, `email`, `phonenum`, `pasport`, `dob`, `pass`) 
        VALUES (?,?,?,?,?,?,?)";

        $values = [$data['name'], $data['surname'], $data['email'], $data['phonenum'], 
        $data['pasport'], $data['dob'], $data['pass'],];

        if(insert($query,$values,'sssssss')){
            echo 1;
        } else {
            echo 'ins_failed';
        }
    }

    // вход
    if(isset($_POST['login'])){
        
        $data = filteration($_POST);
        $u_exist = select("SELECT * FROM `users` WHERE `email`=? LIMIT 1",
        [$data['email']], "s");

        if(mysqli_num_rows($u_exist)==0){
            echo 'inv_email_mob';
        } else {
            $u_fetch = mysqli_fetch_assoc($u_exist);
            if (($data['pass'] != $u_fetch['pass'])){
                echo 'invalid_pass';
            } else {
                echo 1;    
                session_start();
                $_SESSION['login'] = true;
                $_SESSION['uId'] = $u_fetch['id'];
                $_SESSION['uName'] = $u_fetch['name'];
                $_SESSION['uSurname'] = $u_fetch['surname'];
                $_SESSION['email'] = $u_fetch['email'];
                
            }
        }}
        
    

?>
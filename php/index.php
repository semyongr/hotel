<?php
    // require('./db_config.php'); 
    // require('./links.php'); 
    require('./essentials.php');

    session_start();
    session_regenerate_id(true);
    if((isset($_SESSION['adminLogin']) && $_SESSION['adminLogin']==true)){
        redirect('./dashboard.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Панель авторизации</title>
    <?php require('./links.php'); ?>
    <link rel="stylesheet" href="../css/admin_styles.css">
</head>

<!-- панель авторизации админа -->
    <body class="bg-light">
    <div class = "login_form text-center rounded bg-white shadow overflow-hidden">
        <form method="POST">
            <h4 class="bg-dark text-white py-3">Панель авторизации</h4>
            <div class="p-4">
            <div class="mb-3">
                <input name="admin_name" required type="text" class="form-control shadow-none text-center" placeholder = 'Администратор'>                    </div>
                    <div class="mb-4">
                <input name="admin_pass" required type="password" class="form-control shadow-none text-center" placeholder = 'Пароль'>
                    </div>
                <button name="login" type = "submit" class = "btn text-black shadow-none btn-outline-dark">ВОЙТИ</button>
            </div>
        </form>
    </div>



<?php
// вход в админку
if(isset($_POST['login'])){
    $frm_data = filteration($_POST);
    $query = "SELECT * FROM `admin` WHERE `admin_name`=? AND `admin_pass`=?";
    $values = [$frm_data['admin_name'],$frm_data['admin_pass']];

    $res = select($query,$values,"ss");
    if($res->num_rows==1){
        $row = mysqli_fetch_assoc($res);
        $_SESSION['adminLogin'] = true;
        $_SESSION['adminId'] = $row['id_admin'];
        redirect('dashboard.php');
    } else {
        alert('error', 'Неверный логин и/или пароль!') ;
    }
}

?>
<?php require('./scripts.php'); ?>
</body>
</html>
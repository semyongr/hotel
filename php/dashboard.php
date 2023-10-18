<?php
    require('./links.php'); 
    require('./essentials.php');
    adminLogin(); 

  if (isset($_GET['del_id'])) {
    $sql_id = mysqli_query($con, "DELETE FROM `booking` WHERE `id_b` = {$_GET['del_id']}");
  }

  if (isset($_POST['get_number'])) {
    
    $new_price = intval($_POST['price']);
    $sql_number = mysqli_query($con, "UPDATE `rooms` SET `price` = {$new_price} WHERE `number`={$_POST['number']}");
} 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Администрирование</title>
    <link rel="stylesheet" href="../css/dashboard_styles.css">
</head>

<body class="bg-light">
    <div class="container_fluid bg-dark text-light p-3 d-flex align-items-center justify-content-between sticky-top">
        <h3 class="mb-0">Администрирование</h3>
        <a href="logout.php" class="btn btn-light btn-sn">Выйти</a>
    </div>

    <div class="container_fluid" id="main-content">
        <div class="row">
            <div class="col-lg-12 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">НАСТРОЙКИ</h3>

                <!-- номера -->
                <div class="card mt-2">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <form action="" method="post">
                                <h5 class="card-title mb-4">НОМЕРА</h5>
                                <input placeholder="Номер" name="number" class="">
                                <input placeholder="Новая цена" type="" name="price" class="">
                                <input type="submit" name="get_number" value="Изменить">
                        </div>
                    </div>
                    <div class="table-responsive" style="height: 250px; overflow-y: scroll;">
                        <table class="table table-hover border text-center">
                            <tr class="bg-dark text-light">
                                <td scope="col">Номер</td>
                                <td scope="col">Тип</td>
                                <td scope="col">Вмещаемость</td>
                                <td scope="col">Цена</td>
                            </tr>
                            <?php
                                            $q_rooms = "SELECT * FROM `rooms`";
                                            $res_rooms = mysqli_query($con,$q_rooms);
                                            while($row = mysqli_fetch_assoc($res_rooms)){
                                                echo '<tr>'.
                                                "<td>{$row['number']}</td>" .
                                                "<td>{$row['type']}</td>" .
                                                "<td>{$row['people']}</td>" .
                                                "<td>{$row['price']}</td>" .
                                        '</tr>';
                                    }
                                    ?>
                        </table>
                        </form>
                    </div>

                </div>

                <!-- брони -->
                <div class="card mt-2">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">БРОНИ</h5>
                        </div>
                        <div class="table-responsive" style="height: 250px; overflow-y: scroll;">
                            <table class="table table-hover border text-center">
                                <tr class="bg-dark text-light">
                                    <td scope="col">Id</td>
                                    <td scope="col">Пользователь</td>
                                    <td scope="col">Номер</td>
                                    <td scope="col">Заезд</td>
                                    <td scope="col">Выезд</td>
                                    <td scope="col">Цена</td>
                                    <td scope="col">Отмена</td>
                                </tr>
                                <?php
                                            $q_booking = "SELECT * FROM `booking`";
                                            $res_booking = mysqli_query($con,$q_booking);
                                            while($row = mysqli_fetch_assoc($res_booking)){
                                        echo '<tr>'.
                                        "<td>{$row['id_b']}</td>" .
                                        "<td>{$row['user']}</td>" .
                                        "<td>{$row['room_id']}</td>" .
                                        "<td>{$row['checkin']}</td>" .
                                        "<td>{$row['checkout']}</td>" .
                                        "<td>{$row['price']}</td>" .
                                        "<td><a href='?del_id={$row['id_b']}'>Удалить</a></td>" .
                                        '</tr>';
                                    }
                                    ?>
                            </table>
                        </div>

                    </div>
                </div>

                <!-- общие настройки -->
                <div class="card mt-2">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Общие настройки</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal"
                                data-bs-target="#general-s">
                                Изменить
                            </button>
                        </div>
                        <h6 class="card-subtitle mb-1 fw-bold">Заголовок сайта</h6>
                        <p class="card-text" id="site_title"></p>
                        <h6 class="card-subtitle mb-1 fw-bold">Номер телефона</h6>
                        <p class="card-text" id="site_phone"></p>
                        <h6 class="card-subtitle mb-1 fw-bold">Адрес</h6>
                        <p class="card-text" id="site_adres"></p>
                        <h6 class="card-subtitle mb-1 fw-bold">Специальное предложение</h6>
                        <p class="card-text" id="site_sale"></p>
                        <h6 class="card-subtitle mb-1 fw-bold">Описание ЛЮКС</h6>
                        <p class="card-text" id="text_luxe_room"></p>
                        <h6 class="card-subtitle mb-1 fw-bold">Описание КОМФОРТ</h6>
                        <p class="card-text" id="text_comfort_room"></p>
                        <h6 class="card-subtitle mb-1 fw-bold">Описание СТАНДРАТ</h6>
                        <p class="card-text" id="text_standart_room"></p>
                        <h6 class="card-subtitle mb-1 fw-bold">Описание</h6>
                        <p class="card-text" id="site_about"></p>
                    </div>
                </div>

                <div class="modal fade" id="general-s" data-backdrop="static" data-keyboard="true" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form>
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title d-flex align-items-center">Общие настройки
                                    </h5>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">Заголовок сайта</label>
                                        <input type="text" id="site_title_inp" name="site_title"
                                            class="form-control shadow-none">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Номер телефона</label>
                                        <input type="text" id="site_phone_inp" name="site_phone"
                                            class="form-control shadow-none">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Адрес</label>
                                        <input type="text" id="site_adres_inp" name="site_adres"
                                            class="form-control shadow-none">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Специальное предложение</label>
                                        <textarea class="form-control shadow-none" rows="6" id="site_sale_inp"
                                            name="site_sale" class="form-control shadow-none"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Описание ЛЮКС</label>
                                        <textarea class="form-control shadow-none" rows="6" id="text_luxe_room_inp"
                                            name="text_luxe_room" class="form-control shadow-none"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Описание КОМФОРТ</label>
                                        <textarea class="form-control shadow-none" rows="6" id="text_comfort_room_inp"
                                            name="text_comfort_room" class="form-control shadow-none"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Описание СТАНДРАТ</label>
                                        <textarea class="form-control shadow-none" rows="6" id="text_standart_room_inp"
                                            name="text_standart_room" class="form-control shadow-none"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Описание</label>
                                        <textarea class="form-control shadow-none" rows="6" id="site_about_inp"
                                            name="site_about" class="form-control shadow-none"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button"
                                        onclick="upd_general(site_title.value,site_phone.value,site_adres.value,site_sale.value,
                                        text_luxe_room.value, text_comfort_room.value, text_standart_room.value, site_about.value)"
                                        class="btn btn-dark shadow-none">Сохранить</button>

                                    <button type="button" onclick="site_title.value = general_data.site_title,
                                    site_phone.value = general_data.site_phone,
                                    site_adres.value = general_data.site_adres,
                                    site_sale.value = general_data.site_sale,
                                    text_luxe_room.value = general_data.text_luxe_room,
                                    text_comfort_room.value, = general_data.text_comfort_room,
                                    text_luxe_standart.value, = general_data.text_standart_room,
                                    site_about.value = general_data.site_about"
                                        class="btn btn-light border-dark shadow-none" data-bs-dismiss="modal">
                                        Отменить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- пользователи -->
                <div class="card mt-2">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">ПОЛЬЗОВАТЕЛИ</h5>
                        </div>
                        <div class="table-responsive" style="height: 250px; overflow-y: scroll;">
                            <table class="table table-hover border text-center">
                                <tr class="bg-dark text-light">
                                    <td scope="col">Почта</td>
                                    <td scope="col">Имя</td>
                                    <td scope="col">Фамилия</td>
                                    <td scope="col">Телефон</td>
                                    <td scope="col">Паспорт</td>
                                    <td scope="col">Дата рождения</td>
                                    <td scope="col">Пароль</td>
                                    <td scope="col">Дата регистрации</td>
                                </tr>
                                <?php
                                            $q_users = "SELECT * FROM `users`";
                                            $res_users = mysqli_query($con,$q_users);
                                            while($row = mysqli_fetch_assoc($res_users)){
                                        echo '<tr>'.
                                        "<td>{$row['email']}</td>" .
                                        "<td>{$row['name']}</td>" .
                                        "<td>{$row['surname']}</td>" .
                                        "<td>{$row['phonenum']}</td>" .
                                        "<td>{$row['pasport']}</td>" .
                                        "<td>{$row['dob']}</td>" .
                                        "<td>{$row['pass']}</td>" .
                                        "<td>{$row['datentime']}</td>" .
                                        '</tr>';
                                    }
                                    ?>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require('./scripts.php'); ?>

    <script>
    let general_data;
    // вывод данных
    function get_general() {
        let site_title = document.getElementById('site_title');
        let site_phone = document.getElementById('site_phone');
        let site_adres = document.getElementById('site_adres');
        let site_sale = document.getElementById('site_sale');
        let text_luxe_room = document.getElementById('text_luxe_room');
        let text_comfort_room = document.getElementById('text_comfort_room');
        let text_standart_room = document.getElementById('text_standart_room');
        let site_about = document.getElementById('site_about');

        let site_title_inp = document.getElementById('site_title_inp');
        let site_phone_inp = document.getElementById('site_phone_inp');
        let site_adres_inp = document.getElementById('site_adres_inp');
        let site_sale_inp = document.getElementById('site_sale_inp');
        let text_luxe_room_inp = document.getElementById('text_luxe_room_inp');
        let text_comfort_room_inp = document.getElementById('text_comfort_room_inp');
        let text_standart_room_inp = document.getElementById('text_standart_room_inp');
        let site_about_inp = document.getElementById('site_about_inp');

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "./settings_crud.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {

            general_data = JSON.parse(this.responseText);

            site_title.innerText = general_data.site_title;
            site_phone.innerText = general_data.site_phone;
            site_adres.innerText = general_data.site_adres;
            site_sale.innerText = general_data.site_sale;
            text_luxe_room.innerText = general_data.text_luxe_room;
            text_comfort_room.innerText = general_data.text_comfort_room;
            text_standart_room.innerText = general_data.text_standart_room;
            site_about.innerText = general_data.site_about;

            site_title_inp.value = general_data.site_title;
            site_phone_inp.value = general_data.site_phone;
            site_adres_inp.value = general_data.site_adres;
            site_sale_inp.value = general_data.site_sale;
            text_luxe_room_inp.value = general_data.text_luxe_room;
            text_comfort_room_inp.value = general_data.text_comfort_room;
            text_standart_room_inp.value = general_data.text_standart_room;
            site_about_inp.value = general_data.site_about;
        }
        xhr.send('get_general');
    }

    // измение данных
    function upd_general(site_title_val, site_phone_val, site_adres_val, site_sale_val,
        text_luxe_room_val, text_comfort_room_val, text_standart_room_val,
        site_about_val) {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "./settings_crud.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            console.log(this.responseText)
            var myModal = document.getElementById('general-s');
            var modal = bootstrap.Modal.getInstance(myModal);
            modal.hide();

            get_general();
        }

        xhr.send('site_title=' + site_title_val +
            '&site_phone=' + site_phone_val +
            '&site_adres=' + site_adres_val +
            '&site_sale=' + site_sale_val +
            '&text_luxe_room=' + text_luxe_room_val +
            '&text_comfort_room=' + text_comfort_room_val +
            '&text_standart_room=' + text_standart_room_val +
            '&site_about=' + site_about_val +
            '&upd_general');
    }

    window.onload = function() {
        get_general();
    }
    </script>
</body>

</html>
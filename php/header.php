<?php
  if (isset($_GET['del_id'])) {
    $sql = mysqli_query($con, "DELETE FROM `booking` WHERE `id_b` = {$_GET['del_id']}");
  }
?>

    <!-- навигация -->
    <a name="home"></a>
    <nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="home.php">
                <?php
            echo $settings_r['site_title']
            ?>
            </a>
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link me-2" href="#home">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="#rooms">Номера</a>
                    </li>
                    <li class="nav-item">
                    <li class="nav-item">
                        <a class="nav-link" href="#contacts">Контакты</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <?php
                    if(isset($_SESSION['login'])==true){
                        $a = $_SESSION['email']; 
                        echo<<<data
                        <div class="btn-group">
                        <button type="button" class="btn me-lg-3 me-2 btn-outline-dark shadow-none dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="t">
                        $_SESSION[email]</button>
                        <div class="dropdown-menu dropdown-menu-lg-end">
                            <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#bookingModal">Ваши брони</button>
                            <a class="dropdown-item"  href="logout.php">Выйти</a>
                        </div>
                        </div>
                        data;
                    } else {
                        echo<<<data
                        <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#loginModal">
                        Вход
                        </button>
                        <button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal"data-bs-target="#registerModal">
                        Регистрация
                        </button>
                        data;
                    }
                ?>
                </div>
            </div>
        </div>
    </nav>

    <!-- вход -->
    <div class="modal fade" id="loginModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="login-form">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center">
                            <i class="bi bi-people fs-3 me-3"></i>Авторизация пользователей
                        </h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Эл. почта</label>
                            <input type="text" name="email" required class="form-control shadow-none">
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Пароль</label>
                            <input type="password" name="pass" required class="form-control shadow-none">
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <button type="submit" class="btn btn-dark shadow-none">Войти</button>
                            <a href="./index.php" class="text-secondary text-decoration-none">Администрирование</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- регистрация -->
    <div class="modal fade" id="registerModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="register-form">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center">
                            <i class="bi bi-people fs-3 me-3"></i>Регистрация пользователей
                        </h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                            Ваши данные должны совпадать с данными, используемыми для бронирования</span>
                        <div class="container_fluid">
                            <div class="row p-3">
                                <div class="col-md-6 mb-3 ps-0">
                                    <label class="form-label">Имя</label>
                                    <input name="name" type="text" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 mb-3 ps-0">
                                    <label class="form-label">Фамилия</label>
                                    <input name="surname" type="text" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Электронная почта</label>
                                    <input name="email" type="email" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 mb-3 ps-0">
                                    <label class="form-label">Номер телефона</label>
                                    <input name="phonenum" type="number" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 mb-3 ps-0">
                                    <label class="form-label">Серия и номер паспорта</label>
                                    <input name="pasport" type="number" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 mb-3 p-0">
                                    <label class="form-label">Дата рождения</label>
                                    <input name="dob" type="date" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 mb-3 ps-0">
                                    <label class="form-label">Пароль</label>
                                    <input name="pass" type="password" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 mb-3 p-0">
                                    <label class="form-label">Повторите пароль</label>
                                    <input name="cpass" type="password" class="form-control shadow-none" required>
                                </div>
                            </div>
                        </div>
                        <div class="text-center my-1">
                            <button type="submit" class="btn btn-dark shadow-none">Зарегистрироваться</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- брони -->
    <div class="modal fade" id="bookingModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="books-form">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center">Ваши брони</h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal"aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <div class="table-responsive" style="height: 450px; overflow-y: scroll;">
                            <table class="table table-hover border text-center">
                                    <tr class="bg-dark text-light">
                                        <td scope="col">Id</td>
                                        <td scope="col">Номер</td>
                                        <td scope="col">Заезд</td>
                                        <td scope="col">Выезд</td>
                                        <td scope="col">Цена</td>
                                        <td scope="col">Отмена</td>
                                    </tr>                 
                                    <?php
                                    session_start();
                                    $user_session = $_SESSION['email'];
                                    $qu = "SELECT * FROM `booking` WHERE `user` = '$user_session'";
                                    $res = mysqli_query($con,$qu);
                                    while($row = mysqli_fetch_assoc($res)){
                                echo '<tr>'.
                                "<td>{$row['id_b']}</td>" .
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
                </form>
            </div>

        </div>
    </div>

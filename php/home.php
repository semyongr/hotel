<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Class Hotel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
    <link rel="stylesheet" href="../css/common_styles.css">
    <link rel="stylesheet" href="../css/home_styles.css">
    <?php require('./links.php'); ?>
</head>

<body>

    <!-- заголовок -->
    <?php require('./header.php'); ?>

    <!-- спецпредложения -->
    <div class="col-lg-12 bg-white p-2 rounded">
        <div class="align-items-end justify-content-center">
            <h4 id="special_text">
                <?php echo $settings_r['site_sale'] ?>
            </h4>
        </div>
    </div>

    <!-- бронирование -->
    <div class="container">
        <form id="booking-form">
            <div class="row">
                <div class="col-lg-12 bg-white shadow p-4 rounded">
                    <div class="row align-items-end justify-content-center">
                        <div class="col-lg-2">
                            <label class="form-label" style="font-weight: 500; ">Заезд</label>
                            <input name="checkin" onchange="check_availability()" type="date"
                                class="form-control shadow-none mb-3">
                        </div>
                        <div class="col-lg-2">
                            <label class="form-label" style="font-weight: 500; ">Выезд</label>
                            <input name="checkout" onchange="check_availability()" type="date"
                                class="form-control shadow-non mb-3">
                        </div>
                        <div class="col-lg-3">
                            <label class="form-label" style="font-weight: 500;">Номер</label>
                            <select name="room" class="form-select shadow-none mb-3">
                                <option selected>Выберите</option>
                                <option value="101">Стандарт на 1 человека, номер 101</option>
                                <option value="102">Стандарт на 1 человека, номер 102</option>
                                <option value="103">Стандарт на 2 человека, номер 103</option>
                                <option value="104">Стандарт на 2 человека, номер 104</option>
                                <option value="105">Стандарт на 3 человека, номер 105</option>
                                <option value="106">Комфорт на 1 человека, номер 106</option>
                                <option value="107">Комфорт на 1 человека, номер 107</option>
                                <option value="108">Комфорт на 2 человека, номер 108</option>
                                <option value="109">Комфорт на 2 человека, номер 109</option>
                                <option value="110">Комфорт на 3 человека, номер 110</option>
                                <option value="201">Люкс на 1 человека, номер 201</option>
                                <option value="202">Люкс на 1 человека, номер 202</option>
                                <option value="203">Люкс на 2 человека, номер 203</option>
                                <option value="204">Люкс на 2 человека, номер 204</option>
                                <option value="205">Люкс на 3 человека, номер 205</option>
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <label class="form-label" style="font-weight: 500; ">Эл. почта</label>
                            <input type="email" name="email" required class="form-control mb-3 shadow-none">
                        </div>
                        <div class="col-lg-1">
                            <button type="submit" id="check"
                                class="btn text-black shadow-none btn-outline-dark mb-3">Забронировать</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- карусель изображений -->
    <div class="container-fluid">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="../images/4.jpg">
                </div>
                <div class="swiper-slide">
                    <img src="../images/11.jpg">
                </div>
                <div class="swiper-slide">
                    <img src="../images/main.jpg">
                </div>
                <div class="swiper-slide">
                    <img src="../images/2.jpg">
                </div>
                <div class="swiper-slide">
                    <img src="../images/33.jpg">
                </div>

            </div>
        </div>
    </div>

    <!-- номера -->
    <a name="rooms"></a>
    <div class="rooms_container">
        <!-- Люкс -->
        <div class="room_wrapper">
            <h2 class="room_name">
                <?php echo $settings_r['title_luxe_room'] ?>
            </h2>
            <p class="room_text">
                <?php echo $settings_r['text_luxe_room'] ?>
            </p>
            <div id="carousel_1" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../images/lx_11.png" class=" w-75" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../images/lx_1.png" class="w-75" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../images/lx_2.png" class="w-75" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carousel_1"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carousel_1"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon bg-dark" aria-hidden="false"></span>
                </button>
            </div>
            <!-- <img src="../images/luxe.jpg" alt="" class="room_img"> -->
        </div>
        <!-- Комфорт -->
        <div class="room_wrapper">
            <h2 class="room_name">
                <?php echo $settings_r['title_comfort_room'] ?>
            </h2>
            <p class="room_text">
                <?php echo $settings_r['text_comfort_room'] ?>
            </p>
            <div id="carousel_2" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../images/cm_1.png" class=" w-75" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../images/cm_2.png" class="w-75" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../images/cm_3.png" class="w-75" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carousel_2"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carousel_2"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon bg-dark" aria-hidden="false"></span>
                </button>
            </div>
            <!-- <img src="../images/comfort.jpg" alt="" class="room_img"> -->
        </div>     
        <!-- Стандарт -->
        <div class="room_wrapper">
            <h2 class="room_name">
                <?php echo $settings_r['title_standart_room'] ?>
            </h2>
            <p class="room_text">
                <?php echo $settings_r['text_standart_room'] ?>
            </p>
            <div id="carousel_3" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../images/st_1.png" class=" w-75" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../images/st_2.png" class="w-75" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../images/st_3.png" class="w-75" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carousel_3"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carousel_3"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon bg-dark" aria-hidden="false"></span>
                </button>
            </div>
            <!-- <img src="../images/standart.jpg" alt="" class="room_img"> -->

        </div>
    </div>


    <!-- подвал -->
    <?php require('./footer.php'); ?>
    <?php require('./scripts.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="../swiper_script.js"></script>

</body>

</html>
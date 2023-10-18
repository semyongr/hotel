<!-- подвал -->
<div class="footer_container">
    <a name="contacts"></a>
    <div class="footer_row">
        <div class="row_container">
            <h3 class="text-white">Контакты:</h3>
            <p class="text-white mt-3">+
                <?php
            echo $settings_r['site_phone']
            ?>
            </p>
            <p class="text-white">
                <?php
            echo $settings_r['site_adres']
            ?>
            </p>
            <p class="text-white">
                <?php
            echo $settings_r['site_about']
            ?>
            </p>
        </div>
        <div class="row_title">
            <h4 class="h-font fw-bold text-white">
                <?php
            echo $settings_r['site_title']
            ?>
            </h4>
        </div>
    </div>
</div>

<script>
//оповещения
function alert(type,msg){
    let bs_class = (type == 'success') ? 'alert-success' : 'alert-danger';
    let element = document.createElement('div');
    element.innerHTML = `
            <div class="custom-alert ${bs_class} alert-dismissible fade show " role="alert">
            <strong class = "me-3">${msg}</strong>
            <button type = "button" class = "btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>`;
    document.body.append(element);

}

// регистрация
let register_form = document.getElementById('register-form');

register_form.addEventListener('submit', (e) => {
    e.preventDefault();
    let data = new FormData();
    data.append('name', register_form.elements['name'].value);
    data.append('surname', register_form.elements['surname'].value);
    data.append('email', register_form.elements['email'].value);
    data.append('phonenum', register_form.elements['phonenum'].value);
    data.append('pasport', register_form.elements['pasport'].value);
    data.append('dob', register_form.elements['dob'].value);
    data.append('pass', register_form.elements['pass'].value);
    data.append('cpass', register_form.elements['cpass'].value);
    data.append('register', '');

    var myModal = document.getElementById('registerModal');
    var modal = bootstrap.Modal.getInstance(myModal);
    modal.hide();

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./login_register.php", true);

    xhr.onload = function() {
        if (this.responseText == 'pass_mismatch') {
            alert('error', "Неверный пароль");
        } else if (this.responseText == 'email_already') {
            alert('error', "Данная эл. почта уже зарегистрирована!");
        } else if (this.responseText == 'phone_already') {
            alert('error', "Данный номер уже зарегистрирован!");
        } else if (this.responseText == 'ins_failed') {
            alert('error', "Ошибка регистрации, повторите позже");
        } else {
            alert('success', "Регистрация выполнена");
            register_form.reset();
        }
    }

    xhr.send(data);
});

// вход на сайт
let login_form = document.getElementById('login-form');

login_form.addEventListener('submit', (e) => {
    e.preventDefault();
    let data = new FormData();
    data.append('email', login_form.elements['email'].value);
    data.append('pass', login_form.elements['pass'].value);
    data.append('login', '');

    var myModal = document.getElementById('loginModal');
    var modal = bootstrap.Modal.getInstance(myModal);
    modal.hide();

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./login_register.php", true);

    xhr.onload = function() {
        if (this.responseText == 'inv_email_mob') {
            alert('error', "Неверная эл. почта или номер телефона");
        } else if (this.responseText == 'invalid_pass') {
            alert('error', "Неверный пароль");
        } else {
            window.location = window.location.pathname;
        }
    }

    xhr.send(data);
});

// бронирование
let booking_form = document.getElementById('booking-form');

booking_form.addEventListener('submit', (e) => {
    e.preventDefault();
    let data = new FormData();
    data.append('checkin', booking_form.elements['checkin'].value);
    data.append('checkout', booking_form.elements['checkout'].value);
    data.append('room', booking_form.elements['room'].value);
    data.append('email', booking_form.elements['email'].value);
    data.append('check', '');

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./confirm_booking.php", true);

    xhr.onload = function() {
        if (this.responseText == 'booked_already') {
            alert('error', "Данный номер уже забронирован на данные даты");
        } else if (this.responseText == 'uncorrect_dates') {
            alert('error', "Выбраны некорректные даты");
        } else if (this.responseText == '1') {
            alert('success', "Бронь создана");
        } else {
            alert('error', "Вашей электронной почты нет в системе");
        }
    }

    xhr.send(data);
});
</script>



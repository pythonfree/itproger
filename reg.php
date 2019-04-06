<!doctype html>
<html lang="ru">
<head>
    <?php
    $website_title = 'Регистрация на сайте';
    require_once __DIR__ . '/blocks/head.php';
    ?>
</head>
<body>

<?php require_once __DIR__ . '/blocks/header.php'; ?>

<main class="container mt-5">
    <div class="row">
        <div class="col-md-8 mb-3">
            <h4>Форма регистрации</h4>
            <form action="" method="post">

                <label for="username">Ваше имя</label>
                <input type="text" name="username" id="username" class="form-control">

                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control">

                <label for="login">Login</label>
                <input type="text" name="login" id="login" class="form-control">

                <label for="pass">Password</label>
                <input type="password" name="pass" id="pass" class="form-control">

                <div class="alert alert-danger mt-2" id="errorBlock"></div>

                <button type="button" id="reg_user" class="btn btn-success mt-3">
                    Зарегистрироваться
                </button>

            </form>
        </div>
        <?php require_once __DIR__ . '/blocks/aside.php'; ?>
    </div>
</main>
<?php require_once __DIR__ . '/blocks/footer.php'; ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script>
    $('#reg_user').click(function () {
        var user  = $('#username').val();
        var email = $('#email').val();
        var login = $('#login').val();
        var pass  = $('#pass').val();

        $.ajax({
            method: "POST",
            url: "/ajax/reg.php",
            cache: false,
            dataType: 'html',
            data: {
                'username'  : user,
                'email'     : email,
                'login'     : login,
                'pass'      : pass,
            },
            success: function (data) {
                if ('Готово' === data){
                    $('#reg_user').text('Все готово');
                    $('#errorBlock').hide();
                } else {
                    $('#errorBlock').show();
                    $('#errorBlock').text(data);
                }
            }
        });
    });


</script>



</body>
</html>
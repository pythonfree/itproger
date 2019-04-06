<!doctype html>
<html lang="ru">
<head>
    <?php
    $website_title = 'Авторизация на сайте';
    require_once __DIR__ . '/blocks/head.php';
    ?>
</head>
<body>

<?php require_once __DIR__ . '/blocks/header.php'; ?>

<main class="container mt-5">
    <div class="row">
        <div class="col-md-8 mb-3">
            <?php if (!isset($_COOKIE['login']) && empty($_COOKIE['login'])): ?>
                <h4>Форма авторизации</h4>
                <form action="" method="post">

                    <label for="login">Login</label>
                    <input type="text" name="login" id="login" class="form-control">

                    <label for="pass">Password</label>
                    <input type="password" name="pass" id="pass" class="form-control">

                    <div class="alert alert-danger mt-2" id="errorBlock"></div>

                    <button type="button" id="auth_user" class="btn btn-success mt-3">
                        Войти
                    </button>
                </form>
            <?php else: ?>
                <h2><?= $_COOKIE['login']; ?></h2>
                <button class="btn btn-danger" id="exit_btn">Выход</button>
            <?php endif; ?>
        </div>
        <?php require_once __DIR__ . '/blocks/aside.php'; ?>
    </div>
</main>
<?php require_once __DIR__ . '/blocks/footer.php'; ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script>
    $('#exit_btn').click(function () {

        $.ajax({
            method: "POST",
            url: "/ajax/exit.php",
            cache: false,
            dataType: 'html',
            data: {},
            success: function (data) {
                    document.location.reload(true);
                    $('#exit_btn').hide();
            }
        });
    });
    $('#auth_user').click(function () {
        var login = $('#login').val();
        var pass  = $('#pass').val();

        $.ajax({
            method: "POST",
            url: "/ajax/auth.php",
            cache: false,
            dataType: 'html',
            data: {
                'login'     : login,
                'pass'      : pass,
            },
            success: function (data) {
                if ('Готово' === data){
                    $('#auth_user').text('Готово');
                    $('#errorBlock').hide();
                    document.location.reload(true);
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
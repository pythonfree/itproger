<!doctype html>
<html lang="ru">
<head>
    <?php
    $website_title = 'Контакты';
    require_once __DIR__ . '/blocks/head.php';
    ?>
</head>
<body>

<?php require_once __DIR__ . '/blocks/header.php'; ?>

<main class="container mt-5">
    <div class="row">
        <div class="col-md-8 mb-3">
            <h4>Форма отправки сообщения</h4>
            <form action="" method="post">

                <label for="username">Ваше имя</label>
                <input type="text" name="username" id="username" class="form-control">

                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control">

                <label for="mess">Сообщение</label>
                <textarea name="mess" id="mess" class="form-control"></textarea>


                <div class="alert alert-danger mt-2" id="errorBlock"></div>

                <button id="mess_usend" class="btn btn-success mt-3">
                    Отправить сообщение
                </button>

            </form>
        </div>
        <?php require_once __DIR__ . '/blocks/aside.php'; ?>
    </div>
</main>
<?php require_once __DIR__ . '/blocks/footer.php'; ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script>
    $('#mess_usend').click(function () {
        var user  = $('#username').val();
        var email = $('#email').val();
        var mess = $('#mess').val();

        $.ajax({
            method: "POST",
            url: "/ajax/mail.php",
            cache: false,
            dataType: 'html',
            data: {
                'username'  : user,
                'email'     : email,
                'mess'     : mess,
            },
            success: function (data) {
                if ('Готово' === data){
                    $('#mess_usend').text('Все готово');
                    $('#errorBlock').hide();

                    $('#username').val("");
                    $('#email').val("");
                    $('#mess').val("");
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
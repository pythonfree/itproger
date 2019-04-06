<?php
    if (!isset($_COOKIE['login']) || empty($_COOKIE['login'])){
        header('Location: /');
        exit;
    }
?>


<!doctype html>
<html lang="ru">
<head>
    <?php
    $website_title = 'Добавление статьи';
    require_once __DIR__ . '/blocks/head.php';
    ?>
</head>
<body>

<?php require_once __DIR__ . '/blocks/header.php'; ?>

<main class="container mt-5">
    <div class="row">
        <div class="col-md-8 mb-3">
            <h4>Добавление статьи</h4>
            <form action="" method="post">

                <label for="title">Заголовок статьи</label>
                <input type="text" name="title" id="title" class="form-control">

                <label for="intro">Интро статьи</label>
                <textarea name="intro" id="intro" class="form-control"></textarea>

                <label for="text">Текст статьи</label>
                <textarea name="text" id="text" class="form-control"></textarea>

                <button type="button" id="add_article" class="btn btn-success mt-3">
                    Добавить статью
                </button>

            </form>
        </div>
        <?php require_once __DIR__ . '/blocks/aside.php'; ?>
    </div>
</main>
<?php require_once __DIR__ . '/blocks/footer.php'; ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script>
    $('#add_article').click(function () {
        var title = $('#title').val();
        var intro = $('#intro').val();
        var text  = $('#text').val();

        $.ajax({
            method: "POST",
            url: "/ajax/add_article.php",
            cache: false,
            dataType: 'html',
            data: {
                'title'  : title,
                'intro'  : intro,
                'text'   : text,
            },
            success: function (data) {
                if ('Готово' === data){
                    $('#add_article').text('Все готово');
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
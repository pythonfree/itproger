<!doctype html>
<html lang='ru'>
<?php
if(isset($_GET['id']) && !empty($_GET['id'])){
    try {
        require_once __DIR__ . '/mysql_connect.php';
        $sql = 'SELECT id FROM articles ORDER BY id DESC LIMIT 1';
        $sth = $dbh->prepare($sql);
        $res = $sth->execute([':id' => $_GET['id']]);
        $id = $sth->fetch(PDO::FETCH_OBJ)->id;
//        var_dump($id);die;
    } catch (Exception $e) {
        die($e->getMessage());
    }
}


?>
<?php if(isset($_GET['id']) && $_GET['id'] <= $id): ?>
    <head>
        <?php

            try {
                require_once __DIR__ . '/mysql_connect.php';
                $sql = 'SELECT * FROM articles WHERE id=:id';
                $sth = $dbh->prepare($sql);
                $res = $sth->execute([':id' => $_GET['id']]);
                $article = $sth->fetch(PDO::FETCH_OBJ);
            } catch (Exception $e) {
                die($e->getMessage());
            }


        $website_title = $article->title;
        require_once __DIR__ . '/blocks/head.php';
        ?>
    </head>
    <body>

    <?php require_once __DIR__ . '/blocks/header.php'; ?>

    <main class='container mt-5'>
        <div class='row'>
            <div class='col-md-8 mb-3'>

                <div class='jumbotron'>
                    <h1><?= $article->title; ?></h1>
                    <p><b>Автор статьи:</b><mark><?= $article->avtor; ?></mark></p>
                    <p>
                        <?= $article->intro; ?>
                        <br>
                        <?= $article->atext; ?>
                    </p>
                    <u>
                        <?php
                        $date = date( 'd ', $article->adate);
                        $arrMounthes = ['января','февраля','марта','апреля','мая','июня','июля','августа','сентября','октября','ноября','декабря'];
                        $date .= $arrMounthes[date('n', $article->adate)-1] . ' ';
                        echo $date .= date( 'Y H:i:s', $article->adate);
                        //                    date( 'm/d/Y H:i:s', $article->adate);
                        ?>
                    </u>
                </div>



                <h3 class="mt-5">Комментарии</h3>
                <form action="/news.php?id=<?= $article->id; ?>" method="post">

                    <label for="kname">Ваше имя</label>
                    <input type="text" name="kname" id="kname" class="form-control" value="<?= $_COOKIE['login']; ?>">

                    <label for="mess">Сообщение</label>
                    <textarea name="mess" id="mess" class="form-control"></textarea>

                    <button type="submit" id="mess_send" class="btn btn-success mt-3 mb-5">
                        Добавить комментарий
                    </button>

                </form>
                <?php
                    if (isset($_POST['kname'], $_POST['mess'])
                    && !empty($_POST['kname'] && !empty($_POST['mess']))){
                        $kname = trim(filter_var($_POST['kname']), FILTER_SANITIZE_STRING);
                        $mess  = trim(filter_var($_POST['mess']), FILTER_SANITIZE_STRING);

                        try {
                            $data = [];
                            $data[':kname'] = $kname;
                            $data[':mess'] = $mess;
                            $data[':article_id'] = $article->id;
//                            var_dump($data);
                            require_once __DIR__ . '/mysql_connect.php';
                            $sql = 'INSERT INTO comments (kname, mess, article_id) VALUES ('
                                . implode(',', array_keys($data))
                                . ');';
//                            var_dump($sql);
                            $sth = $dbh->prepare($sql);
//                            var_dump($sth);
                            if (!$sth){
                                die('error prepare');
                            }
                            $res = $sth->execute($data);
                            if (!$res){
                                die('error execute');
                            }
                        } catch (Exception $e) {
                            die($e->getMessage());
                        }

                    }
                ?>

                <?php

                require_once __DIR__ . '/mysql_connect.php';

                try {
                    $sql = 'SELECT * FROM comments WHERE article_id=:id ORDER BY id DESC';
                    $sth = $dbh->prepare($sql);
                    $res = $sth->execute([':id' => $_GET['id']]);
                    $objComments = $sth->fetchAll(PDO::FETCH_OBJ);//                var_dump($objComments);die;
                } catch (Exception $e) {
                    die($e->getMessage());
                }
                ?>

                <?php foreach ($objComments as $comment): ?>
                    <div class="alert alert-info mb-2">
                        <h4><?= $comment->kname; ?></h4>
                        <p><?= $comment->mess; ?></p>
                    </div>
                <?php endforeach; ?>

            </div>
            <?php require_once __DIR__ . '/blocks/aside.php'; ?>
        </div>
    </main>

    <?php require_once __DIR__ . '/blocks/footer.php'; ?>
<?php else: ?>
    <head></head>
    <h2>Статья не найдена!</h2>
<?php endif; ?>
</body>
</html>
<!doctype html>
<html lang="ru">
<head>
    <?php
        $website_title = 'PHP блог';
        require_once __DIR__ . '/blocks/head.php';
    ?>
</head>
<body>

<?php require_once __DIR__ . '/blocks/header.php'; ?>

<main class="container mt-5">
    <div class="row">
        <div class="col-md-8 mb-3">
            <?php
            try {
                require_once __DIR__ . '/mysql_connect.php';
                $sql = 'SELECT * FROM articles ORDER BY adate DESC';
                $sth = $dbh->prepare($sql);
                $res = $sth->execute();
                $articles = $sth->fetchAll(PDO::FETCH_OBJ);
//                var_dump($articles);
            } catch (Exception $e) {
                die($e->getMessage());
            }
            ?>
            <?php foreach ($articles as $article): ?>
                <h2><?= $article->title; ?></h2>
                <p><b>Автор статьи:</b><mark><?= $article->avtor; ?></mark></p>
                <p><?= $article->atext; ?></p>
                <b>
                    <?php
                    $date = date( 'd ', $article->adate);
                    $arrMounthes = ['января','февраля','марта','апреля','мая','июня','июля','августа','сентября','октября','ноября','декабря'];
                    $date .= $arrMounthes[date('n', $article->adate)-1] . ' ';
                    echo $date .= date( 'Y H:i:s', $article->adate);
                    //                    date( 'm/d/Y H:i:s', $article->adate);
                    ?>
                </b>
                <a href="/news.php?id=<?= $article->id; ?>" title="<?= $article->title; ?>">
                    <button class="btn btn-warning">Читать полность...</button>
                </a>
<!--            echo date('m/d/Y', 1299446702);-->
                <hr>
            <?php endforeach; ?>
        </div>
        <?php require_once __DIR__ . '/blocks/aside.php'; ?>
    </div>
</main>

<?php require_once __DIR__ . '/blocks/footer.php'; ?>

</body>
</html>
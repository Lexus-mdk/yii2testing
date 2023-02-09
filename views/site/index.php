<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Привет!</h1>

        <p class="lead">Меня зовут Алексей. И это мое решение тестового задания.
        К сожалению не успел написать комментарии и документацию, но всё довольно просто - 1 и 2 задания в хэдере (шапке), а апи:
            запрос, который выдает общее количество загруженных картинок - <a href="/web/api/total-count">/web/api/total-count</a><br>
            запрос с параметром указывающим запрошенную страницу в списке, возвращает список картинок по 10 штук на страницу - <a href="/web/api/get-page?page=1">/web/api/get-page?page=<...></a><br>
            запрос c параметром id который вернет данные картинки по id - <a href="/web/api/find?id=1">/web/api/find?id=<...></a><br>
        </p>

        <p><a class="btn btn-lg btn-success" href="https://spb.hh.ru/resume/b673fa52ff09d40fc00039ed1f6d31717a4c75">Моё резюме</a></p>
    </div>

</div>

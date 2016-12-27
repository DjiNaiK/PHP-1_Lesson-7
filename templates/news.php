<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Новости</title>
</head>
<body>

<a href="/PHP-1/Lesson-7/index.php">на главную</a><br><br>

<ul>
    <?php

    //news.php - отображает список всех новостей.
    // Заголовок у каждой - ссылка на страницу этой новости,
    // под заголовком - краткий текст

    $i = 0;
    
        foreach ($this->data['records'] as $record){
            ?>
        <li>
            <h3>
                <a href="index.php?go=article&id=<?php echo $i; ?>">
                    Новость <?php
                    echo $i+1; //чтобы не было новости с "нулём"
                    ?>
                </a>
            </h3>
            <?php
            //делаем "краткий текст", обрезая их
            echo mb_substr($record->getText(), 0, 100, 'UTF-8' );
            ?>....
        </li>
    <?php
            ++$i;
        }
    ?>
</ul>

</body>
</html>

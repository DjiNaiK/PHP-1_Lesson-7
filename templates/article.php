<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Обзор новости</title>
</head>
<body>

<a href="/PHP-1/Lesson-7/index.php?go=news">к новостям</a><br><br>

<p>
<?php
echo $this->data['article']->getText();
?>
</p>

</body>
</html>

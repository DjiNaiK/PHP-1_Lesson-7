<html>
<body>

<a href="/PHP-1/Lesson-7/index.php">на главную</a><br><br>

<b>Записи наших гостей:</b><br>
<ul>
<?php
foreach ($this->data['records'] as $record){  ?>
    <li>
        <?php echo $record->getText(); ?>
    </li>
<?php } ?>
</ul>

<br>
Добавь свой отзыв:<br>
<form method="post" action="/PHP-1/Lesson-7/index.php?go=guestBookNewLine" enctype="multipart/form-data">
    <input type="text" name="NewRecord"><br>

    <input type="submit">
</form>

</body>
</html>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Load File</title>
</head>
<body>

<a href="/PHP-1/Lesson-7/index.php">на главную</a><br><br>

<?php
//уведомляем об успешной загрузке файла
if(isset($this->data['statusUpload'])){
    echo $this->data['statusUpload'];
}
?>

<form method="post" action="/PHP-1/Lesson-7/index.php?go=uploadFile" enctype="multipart/form-data">
    <input type="file" name="NewFile"><br>
    <input type="submit">
</form>

</body>
</html>
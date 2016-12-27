<?php

//запускаем универсальный класс (урок 6) для работы с данными их текстовых файлов
//require_once исключит случайный повторный вызов этого класса
require_once __DIR__ . '/workWithRecordsInFile.php';

class article extends TextFile {
    public function getArticle($id) {
        return $this->records[$id];
    }
}

class news extends TextFile {
    //Создайте класс News - модель хранилища новостей
    //(аналогично гостевой книге в предыдущем ДЗ и на уроке)
}
?>
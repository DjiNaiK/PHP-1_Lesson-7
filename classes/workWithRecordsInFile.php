<?php

//универсальный класс для работы с текстовыми файлами из задания 6 с изменениями из урока 7
//как для гостевой, так и для новостей

//каждая запись будет теперь объектом (урок 7)
class records {

    protected $text;

    function __construct($text)
    {
        $this->text = $text;
    }

    function getText()
    {
        return $this->text;
    }
}

//конструктор для работы с текст. файлом
class TextFile {

    protected $path;
    protected $records = [];

    public function __construct($path) {
        $this->path = $path;
        $records = file($this->path, FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);

        foreach ($records as $record){
            $this->records[] = new records($record);
        }
    }

    //fix: добавлен тайп хинтинг
    public function append(records $text) {
        $this->records[] = $text;
        return $this;
    }

    public function getAllRecords() {
        return $this->records;
    }
    
    public function saveRecords() {

        //конвертируем объекты в массив для записи в файл
        foreach ($this->records as $record) {
            $recordsForFile[] = $record->getText();
        }

        //fix: исправил ошибку, которая была у меня в 6 задании
       $dataRes = implode("\n", $recordsForFile);
        file_put_contents($this->path, $dataRes);

    }
}


?>
<?php
//работа с загружаемыми файлами (задание 6)

class Uploader {
    
    protected $new_file;
    
    public function __construct($fname) {
        $this->new_file = $fname;
    }

    public function isUploaded() {

        //fix: надеюсь исправил ошибку 6 др
        if (0 == $_FILES[$this->new_file]['error']) {
            return true;
        } else {
            return false;
        }

    }
    public function upload() {
        if($this->isUploaded()) {
            $res = move_uploaded_file(
                $_FILES[$this->new_file]['tmp_name'],
                __DIR__.'/../uploads/'.$_FILES[$this->new_file]['name']
            );
            //загрузка прошла успешно, возвращаем имя
            return $_FILES[$this->new_file]['name'];
        } else {
            return false;
        }
        
    }
}

?>
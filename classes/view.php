<?php

class view
{
    protected $data = [];

    public function assign($name, $value){
        // 1.2. Есть метод assign($name, $value), чья задача - сохранить данные,
        // передаваемые в шаблон по заданному имени (используйте защищенное свойство - массив для хранения этих данных)

        $this->data[$name] = $value;

    }


    public function display($template){
        //1.3. Есть метод display($template), который отображает указанный шаблон с заранее сохраненными данными

        include $template;

    }

    public function render($template){
        //1.4 * Метод render($template), который аналогичен методу display(), но не выводит шаблон с данными в браузер, а возвращает его

        ob_start();
            include $template;
            $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
}
?>
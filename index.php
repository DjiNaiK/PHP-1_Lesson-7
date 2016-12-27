<?php
//Урок 7, на основе переделанного урока 6 + гостевая книга

$go = $_GET['go'] ?? Null; //запрос пользователя: гостевая, загрузка файла или новости

require __DIR__ . '/classes/view.php';
$view = new view;

//готовим страницу из определенных шаблонов, собранных данных и нужных классов
// под конкретный запрос пользователя
switch ($go){
    case 'guestBook':
        
        //Просмотр гостевой
        require __DIR__ . '/classes/workWithRecordsInFile.php';
        $guestBook = new TextFile(__DIR__ . '/data/guestBook.txt');
            $view->assign('records', $guestBook->getAllRecords());

        $template = 'guestBook.php';
        
        break;

    case 'guestBookNewLine':
        
        //Гостевая -> добавляем запись
        require __DIR__ . '/classes/workWithRecordsInFile.php';
        $guestBook = new TextFile(__DIR__ . '/data/guestBook.txt');

        $newRecord = new records($_POST['NewRecord']);
            $guestBook->append($newRecord)->saveRecords();

        $template = 'guestBookNewLine.php';

        break;

    case 'uploadFile':

        //загрузка файла
        require __DIR__ . '/classes/uploaderFiles.php';

        //если обнаружен файл, начинаем процедуру по его загрузке
        if (isset($_FILES['NewFile'])){

            $Uploader = new Uploader('NewFile');

            //если файл удачно загружен, то нам вернется его название иначе вернет false
             if ( false != ($newFileName = $Uploader->upload()) ) {
                 $view->assign('statusUpload', $newFileName . ' файл был загружен');
             }
        }

        $template = 'uploadFile.php';

        break;

    case 'news':
        //новости
        //3.1....модель хранилища новостей (аналогично гостевой книге в предыдущем ДЗ и на уроке)
        require __DIR__ . '/classes/news.php';
        $news = new news(__DIR__.'/data/news.txt');
            $view->assign('records', $news->getAllRecords());

        $template = 'news.php';

        break;

    case 'article':
        //новость
        //3.2....отображает новость номер NNN с полным текстом
        require __DIR__ . '/classes/news.php';
        $article = new article(__DIR__.'/data/news.txt');
        $idArticle = $_GET['id'] ?? 0;
            $view->assign('article', $article->getArticle($idArticle));

        $template = 'article.php';

        break;

    default:
        $template = 'index.php';
        break;

}

//генерируем страницу
$view->display(__DIR__ . '/templates/' . $template);

?>
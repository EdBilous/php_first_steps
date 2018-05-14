<?php

use Classes\Article;
use Classes\ConnectDb;

session_start();

spl_autoload_register(function ($class) {

    // project-specific namespace prefix
    $prefix = 'Classes\\';

    // base directory for the namespace prefix
    $base_dir = __DIR__ . '/Classes/';

    // does the class use the namespace prefix?
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        // no, move to the next registered autoloader
        return;
    }

    // get the relative class name
    $relative_class = substr($class, $len);

    // replace the namespace prefix with the base directory, replace namespace
    // separators with directory separators in the relative class name, append
    // with .php
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    // if the file exists, require it
    if (file_exists($file)) {
        require $file;
    }
});


$connect = new ConnectDb(
    'localhost',
    'custom_blog',
    'root',
    '111111'
);


$articleManager = new Article($connect->getConnect());

//соединение с базой Mysql
function connectDb()
{
    try {
        $dbh = new PDO('mysql:host=localhost;dbname=custom_blog;charset=utf8' , 'root', '111111');
        return $dbh;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return false;
    }
}

// Авторизация (homework)4.05 

function Login($post)
{
    $login= $post['login'];
    $pass= md5($post['password']);

    $check = null;
    $db = connectDb();
    if ($db) {
        $sql = "SELECT id FROM users
        WHERE login='$login' and password='$pass'"; 
        $rezult= $db->query($sql)->fetch(PDO::FETCH_ASSOC);
        
        if (!$rezult) {
            $check = false;
        } else {
            $check = true;
        }
    }
        if ($check) {
        $_SESSION['id'] = $rezult['id'];
        $_SESSION['access'] = true;
        $_SESSION['login'] = $post['login'];
        header('Location: /admin/main.php');
        exit;
    } else {
        $_SESSION['access'] = false;
        header('Location: /enter.php');
        exit;
    }
}

//получаем статьи пользователя для админки. (homework)
//вызываем в admin.php
function getAdminArticle()
{
   if ($_SESSION['id']) {
       $idauthor= $_SESSION['id'];
   } else {
    return;
   }

    $idauthor= $_SESSION['id'];
    $db = connectDb();
    if ($db) {
        $sql = "SELECT *
                FROM articles
                where author = '$idauthor'
                ";
        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    return false;
}

//Добавить новую статью (homework)

function insertAdminArticle($insertAdminArt)
{
    $d= date('Y-m-d H:i:s');
    $idauthor= $_SESSION['id'];
    $url= getUrl($insertAdminArt['title']);
    $db = connectDb();
    if ($db) {
        $sql = "INSERT INTO articles(title, sub_title, content, created_at, author, url)
        VALUES ( :title,  :sub_title, :content,  :created_at,  :author, :url)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':title', $insertAdminArt['title'], PDO::PARAM_STR);
        $stmt->bindParam(':sub_title', $insertAdminArt['sub_title'], PDO::PARAM_STR);
        $stmt->bindParam(':content', $insertAdminArt['content'], PDO::PARAM_STR);
        $stmt->bindParam(':created_at', $d, PDO::PARAM_STR);
        $stmt->bindParam(':author', $idauthor, PDO::PARAM_STR);
        $stmt->bindParam(':url', $url, PDO::PARAM_STR);
        
        return $stmt->execute();
    }
}

//удаление статьии (homework)

function deleteArticle($idart)
{
    $db = connectDb();
    if ($db) {
        $sql = "DELETE FROM articles
WHERE id=$idart;";
        return $db->prepare($sql)->execute();
    }    
    
    return false;
}

//Редактирование статьи (homework)

function getSingleArticle($id)
{
    $db = connectDb();
    if ($db) {
        $sql = "SELECT *
                FROM articles
                WHERE id=$id
                ";
        return $db->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    return false;
}

//(homework)

function updateArticle($post, $idarticle)
{
    $edit_title =$post['edit_title'];
    $edit_subtitle = $post['edit_subtitle'];
    $edit_text = $post['edit_text'];
    $id= $idarticle;
    $edit_date = date('Y-m-d H:i:s');
    
    $db = connectDb();
    if ($db) {
        $sql = "UPDATE articles SET title = :title, sub_title = :sub_title, content = :content, created_at = :created_at WHERE articles . id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':title', $edit_title, PDO::PARAM_STR);
        $stmt->bindParam(':sub_title', $edit_subtitle, PDO::PARAM_STR);
        $stmt->bindParam(':content', $edit_text, PDO::PARAM_STR);
        $stmt->bindParam(':created_at', $edit_date, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        return $stmt->execute();
    }
    return false;
}
//search
function search($query) 
{ 
    $query = trim($query); 
    $query = htmlspecialchars($query);


    if (!empty($query)) {
        if (strlen($query) < 3) {
            echo '<p>Слишком короткий поисковый запрос.</p>';
            exit;
        } else if (strlen($query) > 128) {
            echo '<p>Слишком длинный поисковый запрос.</p>';
            exit;
        } else { 
            $result = getSearchArticle($query);
        }
        return $result;
    }
    
} 

function getSearchArticle($query)
{
    $db = connectDb();
    if ($db) {
        $sql = "SELECT *
                  FROM `articles`
                  WHERE `title` LIKE '%$query%'
                  OR `sub_title` LIKE '%$query%'
                  OR `content` LIKE '%$query%'";
        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    return false;
}

//функция title

function viewTitle()
{

   if ($_SERVER['REQUEST_URI'] === '/') {
       echo 'Custom Blog';
   } elseif (strpos($_SERVER['REQUEST_URI'], 'about')) {
       echo 'Custom Blog - About';
   } elseif (strpos($_SERVER['REQUEST_URI'], 'post')) {
       echo 'Custom Blog - Post';
   } elseif (strpos($_SERVER['REQUEST_URI'], 'contact')) {
       echo 'Custom Blog - Contact';
   } else {
       echo 'Custom Blog';
   }
}

function viewSearchForm()
{
    if($_SERVER['REQUEST_URI'])
    {
        if (strpos($_SERVER['REQUEST_URI'], 'index')) {
           echo '<form action="/search.php" method="POST" class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="text" name="query" placeholder="Введите текст" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
            </form>';
       } else {
           return null;
       }
    } else {
        return null;
    }
}

//получение статьи из базы

function getArticles()
{
    $db = connectDb();
    if ($db) {
        $sql = "SELECT *
                FROM articles
                ";
        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    return false;
}

//получение автора статьи из базы

function getAuthor($id)
{
    $db = connectDb();
    if ($db) {
        $sql = "SELECT *
                FROM users
                WHERE id=$id
                ";
        return $db->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    return false;
}

//добавление в БД и регистрация пользователя

function registerUser($userData){

        if ($userData['pass'] !== $userData['passconf']) {
            $_SESSION['eror_message'] = 'Пароли не совпадают!';
            return;
        }
        if (!isset($userData['log']) || empty($userData['log'])) {
            $_SESSION['eror_message'] = 'Ошибка в логине!';
            return;
        }
        if (!isset($userData['email']) || empty($userData['email'])) {
            $_SESSION['eror_message'] = 'Введите почту!';
            return;
        }
        if (insertUser($userData)) {
            $_SESSION['eror_message'] = false;
        }
        else{
            $_SESSION['eror_message'] = 'Ошибка регистрации';
        }
    }

function insertUser($userData)
{
    $password = md5($userData['pass']);
    $db = connectDb();
    if ($db) {
        $sql = "INSERT INTO users(name, last_name, login, email, password) VALUES ( :name,  :last_name,  :login,  :email,  :password)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':name', $userData['name'], PDO::PARAM_STR);
        $stmt->bindParam(':last_name', $userData['last_name'], PDO::PARAM_STR);
        $stmt->bindParam(':login', $userData['log'], PDO::PARAM_STR);
        $stmt->bindParam(':email', $userData['email'], PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);

       return $stmt->execute();
    }
}


    function getErorMesage(){
        return isset($_SESSION['eror_message'])? $_SESSION['eror_message'] : false;
    }

function insertArticle($userData)
{
    $db = connectDb();
    if ($db) {
        $authorId = null;
        if ($_SESSION['user_login']) {
            $authorId = getAuthor($_SESSION['user_login']);
        } else {
            return;
        }
        $sql = "INSERT INTO articles(title, sub_title, content, created_at, author, url)
                  VALUES ( :title, :subTitle,  :content, :createdAt, :authorId, :url)";
        $stmt = $db->prepare($sql);
        $datetime = new DateTime();
        $createdAt = $datetime->format('Y-m-d H:i:s');
        $url = getUrl($userData['title']);
        $stmt->bindParam(':title', $userData['title'], PDO::PARAM_STR);
        $stmt->bindParam(':subTitle', $userData['sub_title'], PDO::PARAM_STR);
        $stmt->bindParam(':content', $userData['content'], PDO::PARAM_STR);
        $stmt->bindParam(':createdAt', $createdAt, PDO::PARAM_STR);
        $stmt->bindParam(':authorId', $authorId, PDO::PARAM_STR);
        $stmt->bindParam(':url', $url, PDO::PARAM_STR);
        if ($stmt->execute()) {
            header('Location: /admin/articles.php');
        }
    }
}

function getUrl($str)
{
    $articleUrl = str_replace(' ', '-', $str);
    $articleUrl = transliteration($articleUrl);
    $articleIsset = getArticleByUrl($articleUrl);
    if (!$articleIsset) {
        return $articleUrl;
    } else {
        $url = $articleIsset['url'];
        $exUrl = explode('-', $url);
        if ($exUrl){
            $temp = (int)end($exUrl);
            $newUrl = $exUrl[0] . '-'. ++$temp;
        } else {
            $temp = 0;
            $newUrl = $articleUrl . '-'. ++$temp;
        }
        return getUrl($newUrl);
    }
}
function transliteration($str)
{
    $st = strtr($str,
        array(
            'а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d',
            'е'=>'e','ё'=>'e','ж'=>'zh','з'=>'z','и'=>'i',
            'к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o',
            'п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u',
            'ф'=>'ph','х'=>'h','ы'=>'y','э'=>'e','ь'=>'',
            'ъ'=>'','й'=>'y','ц'=>'c','ч'=>'ch', 'ш'=>'sh',
            'щ'=>'sh','ю'=>'yu','я'=>'ya',' '=>'_', '<'=>'_',
            '>'=>'_', '?'=>'_', '"'=>'_', '='=>'_', '/'=>'_',
            '|'=>'_'
        )
    );
    $st2 = strtr($st,
        array(
            'А'=>'a','Б'=>'b','В'=>'v','Г'=>'g','Д'=>'d',
            'Е'=>'e','Ё'=>'e','Ж'=>'zh','З'=>'z','И'=>'i',
            'К'=>'k','Л'=>'l','М'=>'m','Н'=>'n','О'=>'o',
            'П'=>'p','Р'=>'r','С'=>'s','Т'=>'t','У'=>'u',
            'Ф'=>'ph','Х'=>'h','Ы'=>'y','Э'=>'e','Ь'=>'',
            'Ъ'=>'','Й'=>'y','Ц'=>'c','Ч'=>'ch', 'Ш'=>'sh',
            'Щ'=>'sh','Ю'=>'yu','Я'=>'ya'
        )
    );
    $translit = $st2;
    return $translit;
}

function getArticleByUrl($str)
{
    $db = connectDb();
    if ($db) {
        $sql = "SELECT *
                FROM articles
                WHERE url='$str'
                ";
        return $db->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    return false;
}

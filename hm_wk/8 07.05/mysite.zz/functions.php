<?php
session_start();

//константы для работы с базой данных
// $database_host = 'localhost';
// $database_name = 'custom_blog';
// $username = 'root';
// $pass = '111111';

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
        header('Location: /admin.php');
        exit;
    } else {
        $_SESSION['access'] = false;
        header('Location: /enter.php');
        exit;
    }
}

//получаем статьи пользователя для админки. (homework)

function getAdminArticle()
{
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

function insertAdminArticle($inserAdminArt)
{
    $d= date('Y-m-d H:i:s');
    $idauthor= $_SESSION['id'];
    $db = connectDb();
    if ($db) {
        $sql = "INSERT INTO articles(title, sub_title, content, created_at, author)
        VALUES ( :title,  :sub_title, :content,  :created_at,  :author)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':title', $inserAdminArt['my_title'], PDO::PARAM_STR);
        $stmt->bindParam(':sub_title', $inserAdminArt['my_subtitle'], PDO::PARAM_STR);
        $stmt->bindParam(':content', $inserAdminArt['my_text'], PDO::PARAM_STR);
        $stmt->bindParam(':created_at', $d, PDO::PARAM_STR);
        $stmt->bindParam(':author', $idauthor, PDO::PARAM_STR);
        
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

function updateArticle($post, $idtext)
{
    $edit_title =$post['edit_title'];
    $edit_subtitle = $post['edit_subtitle'];
    $edit_text = $post['edit_text'];
    $edit_date = date('Y-m-d H:i:s');
    $db = connectDb();
    if ($db) {
        $sql = "UPDATE articles SET title = :title, sub_title = :sub_title, content = :content, created_at = :created_at WHERE articles . id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':title', $edit_title, PDO::PARAM_STR);
        $stmt->bindParam(':sub_title', $edit_subtitle, PDO::PARAM_STR);
        $stmt->bindParam(':content', $edit_text, PDO::PARAM_STR);
        $stmt->bindParam(':created_at', $edit_date, PDO::PARAM_STR);
        $stmt->bindParam(':id', $idtext, PDO::PARAM_STR);
        return $stmt->execute();
    }
    return false;
}

//функция title

function viewTitle()
{
    // $arr = explode('.', $_SERVER['REQUEST_URI']);
    // $str = substr($arr[0], 1);
    // if ($str) {
    //     echo 'Custom Blog - '. ucfirst($str);
    // } else {
    //     echo 'Custom Blog';
    // }
//    $arr = [
//        '/' => 'Custom Blog',
//        '/about.php' => 'Custom Blog - About',
//        '/post.php' => 'Custom Blog - Post',
//        '/contact.php' => 'Custom Blog - Contact',
//    ];
//
//    if (isset($arr[$_SERVER['REQUEST_URI']])) {
//        echo $arr[$_SERVER['REQUEST_URI']];
//    } else {
//        echo 'Custom Blog';
//    }
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

//отправка статьи в базу

function insertArticle($title, $text)
{
    $db = connectDb();
    if ($db) {
        $sql = "INSERT INTO article(title, content) VALUES ( :title,  :content)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':content', $text, PDO::PARAM_STR);
        $stmt->execute();
    }
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
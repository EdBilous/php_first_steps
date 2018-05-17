<?php

namespace Classes;

use PDO;

/**
 * будет родительским классом для классов: "User" и "Article".
 */
class TablesDb
{
    /**
     * @var \PDO $connect
     */
    private $connect;
    
    /**
     * User
     */
    // private $name;
    // private $last_name;
    // private $login;
    // private $email;
    // private $password;
    
    /**
     * Article
     */
    // private $title;
    // private $sub_title;
    // private $content;
    // private $created_at;
    // private $url;
    // private $author;
    
    /**
     * Users constructor.
     *
     * @param $connect
     */
    public function __construct($connect)
    {
        $this->connect = $connect;
    }
    
    /**
     * Set User
     *
     */
    // public function setUser($post)
    // {
    //     $this->name      = $post['name'];
    //     $this->last_name = $post['last_name'];
    //     $this->login     = $post['login'];
    //     $this->email     = $post['email'];
    //     $this->password  = $post['password'];
    // }
    /**
     * Set Article
     *
     */
    // public function setArticle($post)
    // {
    //     $this->title      = $post['title'];
    //     $this->sub_title  = $post['sub_title'];
    //     $this->content    = $post['content'];
    //     $this->created_at = $post['created_at'];
    //     $this->url        = $post['url'];
    //     $this->author     = $post['author'];
    // }
    
    /**
     * Количество пользователей и статей в БД
     * @param string
     */
    public function getCountTab($tab)
    {
        if ($this->connect) {
            $sql = "SELECT COUNT(*) as count FROM $tab";
            return $this->connect->query($sql)->fetchColumn();
        }
    }
}
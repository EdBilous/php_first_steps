<?php
namespace Classes;

use PDO;

class Login
{
    /**
     * @var \PDO $connect
     */
    private $connect;
        /**
     * @var string $user
     */

    /**
     * Article constructor.
     *
     * @param $connect
     */
    public function getConnect($connect)
    {
        $this->connect = $connect;
    }

    /**
     * Get Articles
     *
     * @return array|bool
     */
    public function getLogin($login, $pass)
    {

        if ($this->connect) {
            $sql = "SELECT id FROM users
        WHERE login='$login' and password='$pass'"; 

            return $this->connect->query($sql)->fetch(PDO::FETCH_ASSOC);        }

        return false;
    }
}
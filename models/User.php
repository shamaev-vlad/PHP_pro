<?php
namespace app\models;
class User extends Model
{
    public $id;
    public $login;
    public $password;
    public $email;

    public function getTableName(): string
    {
        return "users";
    }

    public function __construct($id = null, $login = null, $password = null, $email = null)
    {
        parent::__construct();
        $this->id = $id;
        $this->login = $login;
        $this->password = $password;
        $this->email = $email;
    }

    private function login($db, $username, $password)
    {
        if($this->ifAuth()) {
            echo "Вы уже вошли под именем" . $_SESSION['user'];
            return false;
        }
        $query = "SELECT * FROM shop.users
                           WHERE name='$username' AND password='$password'";
        $result = $db->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_array(MYSQLI_ASSOC);
            session_start();
            $_SESSION= [
                'id' => $row['id'],
                'user' => $username,
                'password' => $row['password']
            ];
            return true;
        }
        return false;
    }

    public function ifAuth()
{
    if (isset($_SESSION['user'])) {
        return true;
    }
    return false;
}

public function logout()
  {
      unset($_SESSION);
      session_destroy();
      header('Location: index.php');
  }

    public function getUserByRole()
    {

    }

   public function getUserCart()
    {

    }

   public function getUserOrders()
    {

    }
}

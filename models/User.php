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

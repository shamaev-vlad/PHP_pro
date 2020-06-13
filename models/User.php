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

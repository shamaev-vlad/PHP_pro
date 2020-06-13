<?php
namespace app\models;


class Cart extends Model
{
    public $id;
    public $goodsInCart;
    public $status;

    public function getTableName(): string
    {
        return 'cart';
    }

 ?>

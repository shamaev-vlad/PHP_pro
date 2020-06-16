<?php
namespace app\models;


class Product extends Model
{
    protected $id;
    protected $name;
    protected $description;
    protected $price;
    protected $category_id;

    public function __construct($id = null, $name = null,  $description = null, $price = null, $category_id = null)
{
    parent::__construct();
    $this->id = $id;
    $this->name = $name;
    $this->description = $description;
    $this->price = $price;
    $this->category_id = $category_id;
}

    public function getTableName(): string
    {
        return "products";
    }
}

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

    public function getId()
   {
       return $this->id;
   }

   public function getName()
   {
       return $this->name;
   }

   public function setName($name)
   {
       $this->setPropsIsUpdated('name');
       $this->name = $name;
   }

   public function getDescription()
   {
       return $this->description;
   }

   public function setDescription($description)
   {
       $this->setPropsIsUpdated('description');
       $this->description = $description;
   }

   public function getPrice()
   {
       return $this->price;
   }

   public function setPrice($price)
   {
       $this->setPropsIsUpdated('price');
       $this->price = $price;
   }
}

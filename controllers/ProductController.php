<?php

namespace app\controllers;

use app\models\Product;

class ProductController extends Controller
{

  public function actionIndex()
  {
    $modelCollection = (new Product())->getAll();
      echo $this->render('catalog', ['modelCollection' => $modelCollection]);
  }


  public function actionCard()
  {

      $this->useLayout = false;

      $id = $_GET['id'];

      if ($id) {
          $product = Product::getOne($id);
          echo $this->render("card", ['product' => $product]);
      } else {
          $products = Product::getAll();
          foreach ($products as $product ) {
              echo $this->render("card", ['product' => $product]);
          }
      }

  }

}

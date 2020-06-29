<?php

namespace app\controllers;

use app\models\Cart;
use app\models\Comment;
use app\models\Product;
use app\models\repositories\CommentRepository;
use app\models\repositories\ProductRepository;
use app\services\LoadImageFile;
use app\services\Request;

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

  public function actionBuy()
      {
          $request = new Request();
          $id = (int)$request->cleanGet('id');
          if ($request->isPost()) {
              $quantity = $request->cleanPost('quantity');
              if ($quantity > 0) {
                  $cart = new Cart();
                  $cart->add(['id' => $id, 'quantity' => $quantity]);
              } else {
                  $this->redirect("/product/card?id=$id");
              }
          }
          $this->redirect("/product");
      }

      public function actionComment()
      {
          $minCommentLength = 3;
          $request = new Request();
          $id = (int)$request->cleanGet('id');
          if ($request->isPost()) {
              $comment = $request->cleanPost('comment');
              if (strlen($comment) > $minCommentLength) {
                  $model = new Comment($id, $comment);
                  (new CommentRepository())->save($model);
              }
          }
          $this->redirect("/product/card?id=$id");
      }

      public function actionAdd()
      {
          $request = new Request();
          if ($request->isPost()) {
              $file = new LoadImageFile('my_file');
              if ($file->isReady) {
                  $product = new Product();
                  $product->setName($request->cleanPost('name'));
                  $product->setDescription($request->cleanPost('description'));
                  $product->setPrice($request->dirtyPost('price'));
                  $product->setImageData($file->getImageData());
                  $product->setImageType($file->getImageType());
                  (new ProductRepository())->save($product);
              }
              $this->redirect('/product/add');
          }

          if ($this->currentUser && $this->currentUser->getIsAdm()) {
              echo $this->render('view_add_product');
          } else {
              $this->redirect('/auth/login');
          }

      }
  }

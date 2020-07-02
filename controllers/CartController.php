<?php

namespace app\controllers;

use app\models\Cart;
use app\models\Product;
use app\services\Request;

class CartController extends Controller
{
    public function actionIndex()
    {
        $cart = (new Cart())->getCartContent();
        foreach ($cart as $prod => $itm) {
            $product = (new ProductRepository())->getById($itm['id']);
            $cart[$prod]['imageType'] = $product->imageType;
            $cart[$prod]['imageData'] = $product->imageData;
        }
        echo $this->render('view_cart', ['cart' => $cart, 'user' => $this->currentUser]);
    }

    public function actionRemove()
    {
        if ($this->request->isPost()) {
            if ($this->request->isSet('remove')) { 
                $cart = new Cart();
                $cart->remove($this->request->dirtyPost('product_item'));
            }
        }
        $this->redirect('/cart');
    }

    public function actionRemoveAll()
    {
        $cart = new Cart();
        $cart->clear();
        $this->redirect('/cart');
    }
}

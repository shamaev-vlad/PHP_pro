<?php

namespace app\controllers;

use app\models\Cart;
use app\models\Product;
use app\services\Request;

class CartController extends Controller
{

    public function actionIndex()
    {

        if ($this->session->isSet('user_name')) {
            $userName = $this->session->get('user_name');
        } else {
            $userName = "Посетитель";
        }

        $cart = (new Cart())->getCartContent();
        if (empty($cart)) {
            $cartInfo = $userName . ", Ваша корзина пуста";
        } else {
            $cartInfo = $userName . ", оформите заказ";
        }
        foreach ($cart as $prod => $itm) {
            $product = (new Product())->getById($itm['id']);
            $cart[$prod]['imageType'] = $product->imageType;
            $cart[$prod]['imageData'] = $product->imageData;
        }
        echo $this->render('cart', ['cart' => $cart, 'cartInfo' => $cartInfo]);
    }

    public function actionRemove()
    {
        if (Request::isPost()) {
            $cart = new Cart();
            if (Request::isSet('remove')) {
                $cart->remove(Request::dirtyPost('product_item'));
            }
            if (Request::isSet('removeAll')) {
                $cart->clear();
            }
        }
        $this->redirect('?c=cart');
    }
}

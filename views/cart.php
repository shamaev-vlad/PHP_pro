<h1><?= $cartInfo ?></h1>
<div class="cart">
  <form action="?c=cart&a=remove" method="post" class="form">
      <?php foreach ($cart as $products => $items): ?>
          <?php
          echo '<img class="cart_img" src="data:' . $items['imageType'] . ';base64,' . base64_encode($items['imageData']) . '"/>';
          ?>
          <input type="checkbox" name="product_item[]" value="<?= $products ?>" id="<?= $products ?>">
          <label for="<?= $products ?>">ID: <?= $items['id'] ?> , копий: <?= $items['quantity'] ?> экз.</label>
          <br>
      <?php endforeach; ?>
      <div class="btns">
      <input class="btn-cart_invert" type=submit name="remove" value="Удалить">
      <input class="btn-cart_invert" type=submit name="removeAll" value="Удалить все">
      </div>
  </form>
</div>
<div >
  <a href="?c=order&a=add">
      <button class="btn-cart_invert" type="button">Оформить заказ</button>
  </a>
  <a href="?c=order">
      <button class="btn-cart_invert" type="button">Просмотр заказов</button>
  </a>
</div>

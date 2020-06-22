<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>

<div class="header">
  <div class="logo">Интернет-магазин</div>
  <div class="header_left">
      <a href="/?c=product">
          <button class="btn-cart" type="button">Галерея</button>
      </a>
      <a href="/?c=cart">
          <button class="btn-cart" type="button">Корзина</button>
      </a>
      <a href="?c=auth&a=login">
          <button class="btn-cart" type="button">Вход</button>
      </a>
  </div>
</div>
<div class="content">

    <?=$content?>
</div>
<div class="footer"></div>
</body>
</html>

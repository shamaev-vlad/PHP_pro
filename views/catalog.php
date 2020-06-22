<h1>Каталог</h1>
<div class="catalog">
    <?php foreach ($modelCollection as $model): ?>
        <div class="catalog_block">
            <p class="catalog_text"><?= $model->getName() ?></p>
            <?php
            echo '<a href="?c=product&a=card&id=' . $model->id . '" target="_blank">
      <img width=300 src="data:' . $model->imageType . ';base64,' . base64_encode($model->imageData) . '"/></a>';
            ?>
            <p class="catalog_text"><?= "viewers: " . $model->viewers ?> </p>
        </div>
    <?php endforeach; ?>
</div>

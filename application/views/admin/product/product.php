<h2></h2>
<table class="table table-border">
<tbody>
<tr>
        <td>اسم المنتج</td>
        <td><?= $product->name ?></td>
    </tr>  <tr>
        <td>الكميه الحاليه</td>
        <td><?= $product->qyt ?></td>
    </tr>
</tbody>
</table>

<h2><?= $product->name ?></h2>
<table class="table">
<thead>
    <tr>
        <th>#</th>
        <th>الكميه</th>
        <th>التاريخ</th>
    </tr>
</thead>
<tbody>
<?php $i =1 ; foreach($products_in_stock as $product_in_stock) : ?>
    <tr>
        <td><?= $i++ ?></td>
        <td><?= $product_in_stock->qyt ?></td>
        <td><?= $product_in_stock->created_at ?></td>
    </tr>
<?php endforeach; ?>
</tbody>
</table>
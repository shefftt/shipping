<div class="col-m-12">

<a class="btn btn btn-labeled btn-info" href="<?= base_url()?>admin/product_add"><i class="btn-label fa fa-arrows"></i>اضافة منتج</a>

</br>
</br>
</div>
<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>اسم المنتج</th>
            <th>التصنيف</th>
            <th>السعر</th>
             <th>المخزن</th>
            <th>الرف</th>
            <th>اعدادت</th>
        </tr>
    </thead>
    <tbody>
    <?php $i= 1; foreach ($products as $product) :?> 
        <tr>
            <td scope="row"><?= $i++ ?></td>
            <td><?= $product->name ?> </td>
            <td>
                <a href="<?= base_url() ?>admin/category/<?= $product->id ?>">

                    <?= get_categorys($product->category)->name ?> </td>
            </a>
            <td><?= $product->price ?> </td>
            <td>
              

                    <?= get_stock($product->stock_id)->name ?> </td>
            </a>
            <td>
               

                    <?= get_shelve($product->shelve_id)->name ?> </td>
            </a>
            <td>
                <a href="<?= base_url() ?>admin/product_edit/<?=$product->id ?>" class="btn btn-sm btn-success">تعديل</a>
            </td>
            
        </tr></td>
        </tr>
<?php endforeach;?>
    </tbody>
</table>
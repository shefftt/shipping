<div class="col-m-12">
<a class="btn btn btn-labeled btn-info" href="<?= base_url()?>admin/stock_add"><i class="btn-label fa fa-arrows"></i>اضافة مخزن</a>
</div>
<br>
<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>اسم المخزن</th>
            
            <th>اعدادات</th>
        </tr>
    </thead>
    <tbody>
    <?php $i= 1; foreach ($stocks as $stock) :?> 
        <tr>
            <td scope="row"><?= $i++ ?></td>
            <td><?= $stock->name ?> </td>
           
            <td><a href="<?= base_url() ?>admin/stock/<?= $stock->id ?>">عرض</a></td>
        </tr></td>
        </tr>
<?php endforeach;?>
    </tbody>
</table>
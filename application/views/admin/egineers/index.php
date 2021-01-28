<div class="col-m-12">
<a class="btn btn btn-labeled btn-info" href="<?= base_url()?>admin/egineer_add"><i class="btn-label fa fa-arrows"></i>اضافة فني</a>
</div>
<br>
<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>اسم الفني</th>
            <th>تاريخ الانشاء</th>
        </tr>
    </thead>
    <tbody>
    <?php $i= 1; foreach ($egineers as $egineer) :?> 
        <tr>
            <td scope="row"><?= $i++ ?></td>
            <td><?= $egineer->name ?> </td>
            <td><?= $egineer->created_at ?> </td>
            
        </tr></td>
        </tr>
<?php endforeach;?>
    </tbody>
</table>


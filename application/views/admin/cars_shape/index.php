<div class="col-m-12">
<a class="btn btn btn-labeled btn-info" href="<?= base_url()?>admin/add_shape"><i class="btn-label fa fa-plus"></i>اضافة  ماركه</a>
</div>
<br>
<table id="myTable" class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>الاسم</th>
            <th>اعدادات</th>
        </tr>
    </thead>
    <tbody>
    <?php $i= 1; foreach ($cars_shape as $shape) :?> 
        <tr>
            <td scope="row"><?= $i++ ?></td>
            <td><?= $shape->name ?> </td>
            <td>
            	<a class="btn btn-sm btn-info" href="<?= base_url() ?>admin/shape/<?= $shape->id ?>">عرض</a>
            </td>
      
        </tr>
<?php endforeach;?>
    </tbody>
</table>

	<script>
	    $(document).ready( function () {
    $('#myTable').DataTable();
} );
	</script>
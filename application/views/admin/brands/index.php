<div class="col-m-12">
<a class="btn btn btn-labeled btn-info" href="<?= base_url()?>admin/add_brand"><i class="btn-label fa fa-plus"></i>اضافة  شكل</a>
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
    <?php $i= 1; foreach ($brands as $brand) :?> 
        <tr>
            <td scope="row"><?= $i++ ?></td>
            <td><?= $brand->name ?> </td>
            <td>
            	<a class="btn btn-sm btn-info" href="<?= base_url() ?>admin/brand/<?= $brand->id ?>">عرض</a>
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
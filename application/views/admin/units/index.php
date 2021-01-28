<div class="col-m-12">
<a class="btn btn btn-labeled btn-info" href="<?= base_url()?>admin/add_unit"><i class="btn-label fa fa-plus"></i>اضافة  تصنيف</a>
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
    <?php $i= 1; foreach ($units as $unit) :?> 
        <tr>
            <td scope="row"><?= $i++ ?></td>
            <td><?= $unit->name ?> </td>
            <td>
            	<a class="btn btn-sm btn-info" href="<?= base_url() ?>admin/edit_unit/<?= $unit->id ?>">تعديل</a>
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